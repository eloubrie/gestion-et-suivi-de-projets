<?php
include("models/tasc.php");

class ControllerTasc
{
	private $modelTasc;

	public function __construct()
	{
		$this->modelTasc = new ModelTasc();
	}
        
        public function _getTasc($id)
	{
		return $this->modelTasc->_getTasc($id)->fetch(PDO::FETCH_ASSOC);
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
		if($line['statut'] == 0)
		{ $line['statut'] = '<span class="afaire">A faire</span>'; }
		else if($line['statut'] == 1)
		{ $line['statut'] = '<span class="encours">En cours</span>'; }
		else
		{ $line['statut'] = '<span class="termine">Terminé</span>'; }
                
                if($line['developpeur'] == 0)
                { $line['developpeur'] = ''; }
	
		?>
		<tr>
			<td><?php echo $line['ID']; ?></td>
			<td><a href="tasc.php?ID=<?php echo $line['ID']; ?>"><?php echo $line['titre']; ?></a></td>
			<td><?php echo $this->_tascType($line['type']); ?></td>
			<td><?php echo $line['dependances']; ?></td>
			<td><?php echo $line['cout']; ?></td>
			<td><?php echo $line['developpeur']; ?></td>
			<td><?php echo $line['statut']; ?></td>
			<td><?php echo $line['date_realisation']; ?></td>
			<td><?php echo $line['date_test']; ?></td>
			<td>
				<a href="gestion_tasc.php?modif_tasc=<?php echo $line['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="gestion_tasc.php?action=suppr&tasc_suppr=<?php echo $line['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}
	
	public function _buildTascInfo($id)
	{
		$tasc = $this->modelTasc->_getTasc($id)->fetch(PDO::FETCH_ASSOC);
		
		?>
		<h3><?php echo $tasc['titre']; ?> (tâche numéro <?php echo $tasc['ID']; ?>)</h3><br />
		<p><b>Description :</b> <?php echo $tasc['description']; ?></p>
		<p><b>US :</b> <?php echo $tasc['us']; ?></p>
		<p><b>Type :</b> <?php echo $this->_tascType($tache['type']); ?></p>
		<p><b>Coût :</b> <?php echo $tasc['cout']; ?></p>
		<p><b>Dépendances :</b> <?php echo $tasc['dependances']; ?></p>
		<p><b>Développeur :</b> <?php echo $tasc['developpeur']; ?></p>
		<p><b>Statut :</b> <?php echo $tasc['statut']; ?></p>
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