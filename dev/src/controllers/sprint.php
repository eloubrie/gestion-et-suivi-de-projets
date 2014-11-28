<?php
include("models/sprint.php");

class ControllerSprint
{
	private $modelSprint;

	public function __construct()
	{
		$this->modelSprint = new ModelSprint();
	}
	
	public function _getSprintList()
	{
		return $this->modelSprint->_getSprintList();
	}
        
        public function _getSprint($id)
	{
		return $this->modelSprint->_getSprint($id)->fetch(PDO::FETCH_ASSOC);
	}
        
        public function _getGitLink($id)
        {
                $sprint = $this->modelSprint->_getSprint($id)->fetch(PDO::FETCH_ASSOC);
                return $sprint['lien_git'];
        }
        
        public function _buildSprintList()
	{
		foreach($this->modelSprint->_getSprintList() as $sprint)
		{
			$this->_buildSprintListLine($sprint);
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
        
        private function _buildSprintListLine($line)
	{
		?>
		<tr>
			<td><?php echo $line['numero_du_sprint']; ?></td>
			<td><a href="sprint.php?ID=<?php echo $line['ID']; ?>"><?php echo $line['titre']; ?></a></td>
			<td><?php echo $line['cout']; ?></td>
			<td><?php echo $line['duree']; ?></td>
			<td><?php echo $line['date_creation']; ?></td>
			<td><?php echo $line['date_debut']; ?></td>
			<td><?php echo $line['date_fin']; ?></td>
			<td><?php echo $line['cout_valide']; ?></td>
			<td>
				<a href="manage_sprint.php?modif_sprint=<?php echo $line['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="manage_sprint.php?action=suppr&sprint_suppr=<?php echo $line['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                <?php if ($this->_isGitLink($line['lien_git']))
                                {?> <a href="<?php echo $line['lien_git']; ?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-download-alt"></span></a> <?php } ?>
			</td>
		</tr>
		<?php
	}
        
        public function _buildSprintInfo($id)
	{
		$sprint = $this->modelSprint->_getSprint($id)->fetch(PDO::FETCH_ASSOC);
		
		?>
		<h3><?php echo $sprint['titre']; ?> (Sprint numéro <?php echo $sprint['numero_du_sprint']; ?>)</h3><br />
		<p><b>Description :</b> <?php echo $sprint['description']; ?></p>
		<p><b>Coût :</b> <?php echo $sprint['cout']; ?></p>
		<p><b>Durée :</b> <?php echo $sprint['duree']; ?></p>
		<p><b>Date de création :</b> <?php echo $sprint['date_creation']; ?></p>
		<p><b>Date de début :</b> <?php echo $sprint['date_debut']; ?></p>
		<p><b>Date de fin :</b> <?php echo $sprint['date_fin']; ?></p>
		<p><b>Coût validé :</b> <?php echo $sprint['cout_valide']; ?></p>
		<?php
	}
        
        public function _insertSprint($number, $cost, $startDate, $duration, $endDate, $title, $description)
	{
		$this->modelSprint->_insertSprint($number, $cost, $startDate, $duration, $endDate, $title, $description);
	}
        
        public function _modifSprint($ID, $number, $cost, $creationDate, $startDate, $duration, $endDate, $title, $description, $validatedCost, $gitLink)
	{
		$this->modelSprint->_modifSprint($ID, $number, $cost, $creationDate, $startDate, $duration, $endDate, $title, $description, $validatedCost, $gitLink);
	}
        
        public function _supprSprint($ID)
	{
		$this->modelSprint->_supprSprint($ID);
	}
}