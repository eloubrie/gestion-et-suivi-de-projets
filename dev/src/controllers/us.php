<?php
include("models/us.php");

class ControllerUs
{
	private $modelUs;

	public function __construct()
	{
		$this->modelUs = new ModelUs();
	}
	
	private function _UsStatus($s)
	{
		if($s == 0)
		{ $status = '<span class="afaire">A faire</span>'; }
		else if($s == 1)
		{ $status = '<span class="encours">En cours</span>'; }
		else
		{ $status = '<span class="termine">Terminé</span>'; }
		
		return $status;
	}
	
	public function _getBacklog()
	{
			return $this->modelUs->_getBacklog();
	}
		
	public function _getUs($id)
	{
		return $this->modelUs->_getUs($id)->fetch(PDO::FETCH_ASSOC);
	}
        
        public function _getGitLink($id)
        {
                $us = $this->modelUs->_getUs($id)->fetch(PDO::FETCH_ASSOC);
                return $us['lien_git'];
        }
        
        public function _buildUSListFromSprint($id)
	{
		foreach($this->modelUs->_getUsFromSprint($id) as $us)
		{
			$this->_buildBaclogLine($us);
		}
	}
        
	public function _buildBacklog()
	{
		foreach($this->modelUs->_getBacklog() as $line)
		{
			$this->_buildBaclogLine($line);
		}
	}
        
        public function _isGitLink($gitLink)
        {
            $gitLingRegex = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            if (preg_match($gitLingRegex, $gitLink))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
	
	private function _buildBaclogLine($line)
	{
                if(!empty($line['ID_sprint'])){
                    $req = $this->modelUs->_getSprintNumberByID($line['ID_sprint'])->fetch(PDO::FETCH_ASSOC);
                    $numSprint = $req['numero_du_sprint'];
                }
                else{
                    $numSprint = NULL;
                }
		?>
		<tr>
			<td><?php echo $line['ID']; ?></td>
			<td><a href="us.php?ID=<?php echo $line['ID']; ?>"><?php echo $line['titre']; ?></a></td>
                        <td><?php echo $numSprint; ?></td>
			<td><?php echo $line['cout']; ?></td>
			<td><?php echo $line['date_debut']; ?></td>
			<td><?php echo $line['date_fin']; ?></td>
			<td><?php echo $this->_UsStatus($line['statut']); ?></td>
			<td><?php echo $line['date_test']; ?></td>
			<td>
				<a href="manage_us.php?modif_US=<?php echo $line['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="manage_us.php?action=suppr&US_suppr=<?php echo $line['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                <?php if ($this->_isGitLink($line['lien_git']))
                                {?> <a href="<?php echo $line['lien_git']; ?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-download-alt"></span></a> <?php } ?>
			</td>
		</tr>
		<?php
                
                $this->_cleanSprintCost();
                $this->_updateSprints();
	}		
	
	public function _buildUsInfo($id)
	{
		$us = $this->modelUs->_getUs($id)->fetch(PDO::FETCH_ASSOC);
		$numSprint= $this->modelUs->_getSprintNumberByID($us['ID_sprint'])->fetch(PDO::FETCH_ASSOC);

		?>
		<h3><?php echo $us['titre']; ?> (US numéro <?php echo $us['ID']; ?>)</h3><br />
		<p><b>Description :</b> <?php echo $us['description']; ?></p>
		<p><b>Sprint :</b> <?php echo $numSprint['numero_du_sprint']; ?></p>
		<p><b>Coût :</b> <?php echo $us['cout']; ?></p>
		<p><b>Statut :</b> <?php echo $this->_UsStatus($us['statut']); ?></p>
		<p><b>Date début :</b> <?php echo $us['date_debut']; ?></p>
		<p><b>Date fin :</b> <?php echo $us['date_fin']; ?></p>
		<p><b>Description du test :</b> <?php echo $us['description_test']; ?></p>
		<p><b>Date du dernier test :</b> <?php echo $us['date_test']; ?></p>
		<br />
		<?php
                
                $this->_cleanSprintCost();
                $this->_updateSprints();
	}
	
	public function _insertUs($title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest)
	{
		$this->modelUs->_insertUs($title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest);
	}
	
	public function _modifUs($ID, $title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest, $linkgit)
	{
		$this->modelUs->_modifUs($ID, $title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest, $linkgit);
	}
	
	public function _supprUs($ID)
	{
		$this->modelUs->_supprUs($ID);
	}
        
        protected function _cleanSprintCost(){
            $backLog = $this->modelUs->_getBacklog();
            foreach($backLog as $us){
                $this->modelUs->_clearSprintCost[$us['ID_sprint']];
            }
        }
        
        protected function _updateSprints(){
            $sprintList = $this->modelUs->_getSprintList();
            foreach($sprintList as $sprint){
                $cost = 0;
                $validate = 0;
                $backLog = $this->modelUs->_getBacklog();
                foreach($backLog as $us){
                    if($us['ID_sprint'] == $sprint['ID']){
                        $cost+=$us['cout'];
                        if($us['statut'] >= 2){
                            $validate+=$us['cout'];
                        }
                    }
                }
                $this->modelUs->_updateSprintTotalCost($sprint['ID'], $cost);
                $this->modelUs->_updateSprintValidateCost($sprint['ID'], $validate);
            }
        }
}