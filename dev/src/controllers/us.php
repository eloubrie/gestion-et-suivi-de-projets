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
	
	public function _buildBacklog()
	{
		foreach($this->modelUs->_getBacklog() as $line)
		{
			$this->_buildBaclogLine($line);
		}
	}
	
	private function _buildBaclogLine($line)
	{	
		?>
		<tr>
			<td><?php echo $line['ID']; ?></td>
			<td><a href="us.php?ID=<?php echo $line['ID']; ?>"><?php echo $line['titre']; ?></a></td>
			<td><?php echo $line['sprint']; ?></td>
			<td><?php echo $line['dependances']; ?></td>
			<td><?php echo $line['cout']; ?></td>
			<td><?php echo $line['date_debut']; ?></td>
			<td><?php echo $line['date_fin']; ?></td>
			<td><?php echo $this->_UsStatus($line['statut']); ?></td>
			<td><?php echo $line['date_test']; ?></td>
			<td>
				<a href="modify_us.php?us=<?php echo $line['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="delete_us.php?us=<?php echo $line['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}		
	
	public function _buildUsInfo($id)
	{
		$us = $this->modelUs->_getUs($id)->fetch(PDO::FETCH_ASSOC);
		
		?>
		<h3><?php echo $us['titre']; ?> (US numéro <?php echo $us['ID']; ?>)</h3><br />
		<p><b>Description :</b> <?php echo $us['description']; ?></p>
		<p><b>Sprint :</b> <?php echo $us['sprint']; ?></p>
		<p><b>Coût :</b> <?php echo $us['cout']; ?></p>
		<p><b>Dépendances :</b> <?php echo $us['dependances']; ?></p>
		<p><b>Statut :</b> <?php echo $us['statut']; ?></p>
		<p><b>Date début :</b> <?php echo $us['date_debut']; ?></p>
		<p><b>Date fin :</b> <?php echo $us['date_fin']; ?></p>
		<p><b>Description du test :</b> <?php echo $us['description_test']; ?></p>
		<p><b>Date du dernier test :</b> <?php echo $us['date_test']; ?></p>
		<br />
		<?php
	}
}