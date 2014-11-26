<?php
include("models/tasc.php");
include("models/developer.php");

class ControllerTasc
{
	private $modelTasc;

	public function __construct()
	{
		$this->modelTasc = new ModelTasc();
		$this->modelDev = new ModelDeveloper();
	}
        
    public function _getTasc($id)
	{
		return $this->modelTasc->_getTasc($id)->fetch(PDO::FETCH_ASSOC);
	}
	
	private function _TascStatus($s)
	{
		if($s == 0)
		{ $status = '<span class="afaire">A faire</span>'; }
		else if($s == 1)
		{ $status = '<span class="encours">En cours</span>'; }
		else
		{ $status = '<span class="termine">Terminé</span>'; }
		
		return $status;
	}
	
	private function _tascType($t)
	{
		if($t==1)
		{ $type = "Dev"; }
		else if($t==2)
		{ $type = "Test"; }
		else if($t==3)
		{ $type = "Spec"; }
		else
		{ $type = "Doc"; }
		
		return $type;
	}
	
	private function _DeveloperName($id)
	{
		$dev = $this->modelDev->_getDeveloper($id)->fetch(PDO::FETCH_ASSOC);
		
		return $dev['pseudo'];
	}
	
	public function _buildTascList()
	{
		foreach($this->modelTasc->_getAllTascs() as $tasc)
		{
			$this->_buildTascListLine($tasc);
		}
	}
	
	public function _buildTascListFromUs($id)
	{
		foreach($this->modelTasc->_getTascsFromUs($id) as $tasc)
		{
			$this->_buildTascListLine($tasc);
		}
	}
	
	private function _buildTascListLine($line)
	{
                if(!empty($line['ID_US'])){
                    $US = $line['ID_US'];
                    $req = $this->modelTasc->_getSprintTasc($line['ID'])->fetch(PDO::FETCH_ASSOC);
                    if(!empty($req['numero_du_sprint'])){
                       $sprint = $req['numero_du_sprint'];
                    }
                     else {                    
                         $sprint = NULL;
                     }
                }
                else{
                    $US = NULL;
                }
                
		?>
		<tr>
			<td><?php echo $line['ID']; ?></td>
			<td><a href="tasc.php?ID=<?php echo $line['ID']; ?>"><?php echo $line['titre']; ?></a></td>
			<td><?php echo $this->_tascType($line['type']); ?></td>
			<td><?php echo $line['dependances']; ?></td>
			<td><?php echo $line['cout']; ?></td>
                        <td><?php echo $US; ?></td>
                        <td><?php echo $sprint; ?></td>
			<td><?php echo $this->_DeveloperName($line['developpeur']); ?></td>
			<td><?php echo $this->_TascStatus($line['statut']); ?></td>
			<td><?php echo $line['date_realisation']; ?></td>
			<td><?php echo $line['date_test']; ?></td>
			<td>
				<a href="manage_tasc.php?modif_tasc=<?php echo $line['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="manage_tasc.php?action=suppr&tasc_suppr=<?php echo $line['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}
	
	public function _buildTascInfo($id)
	{
		$tasc = $this->modelTasc->_getTasc($id)->fetch(PDO::FETCH_ASSOC);
		if(!empty($tasc['ID_US'])){
                    $US = $tasc['ID_US'];
                    $req = $this->modelTasc->_getSprintTasc($tasc['ID'])->fetch(PDO::FETCH_ASSOC);
                    if(!empty($req['numero_du_sprint'])){
                       $sprint = $req['numero_du_sprint'];
                    }
                     else {                    
                         $sprint = NULL;
                     }
                }
                else{
                    $US = NULL;
                }
		?>
		<h3><?php echo $tasc['titre']; ?> (tâche numéro <?php echo $tasc['ID']; ?>)</h3><br />
		<p><b>Description :</b> <?php echo $tasc['description']; ?></p>
		<p><b>Type :</b> <?php echo $this->_tascType($tache['type']); ?></p>
		<p><b>Coût :</b> <?php echo $tasc['cout']; ?></p>
		<p><b>Dépendances :</b> <?php echo $tasc['dependances']; ?></p>
                <p><b>US :</b> <?php echo $US; ?></p>
                <p><b>Sprint :</b> <?php echo $sprint; ?></p>
		<p><b>Développeur :</b> <?php echo $this->_DeveloperName($tasc['developpeur']); ?></p>
		<p><b>Statut :</b> <?php echo $this->_TascStatus($tasc['statut']); ?></p>
		<p><b>Date de réalisation :</b> <?php echo $tasc['date_realisation']; ?></p>
		<p><b>Date du dernier test :</b> <?php echo $tasc['date_test']; ?></p>
		<br />
		<?php
	}
        
        
        public function _insertTasc($associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate)
	{
		$this->modelTasc->_insertTasc($associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate);
	}
        
        public function _modifTasc($ID, $associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate)
	{
		$this->modelTasc->_modifTasc($ID, $associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate);
	}
        
        public function _supprTasc($ID)
	{
		$this->modelTasc->_supprTasc($ID);
	}
}