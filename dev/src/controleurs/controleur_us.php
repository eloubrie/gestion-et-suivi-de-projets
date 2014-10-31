<?php
include("modeles/modele_us.php");

class ControleurUS
{
	private $modeleUS;

	public function __construct()
	{
		$this->modeleUS = new ModeleUS();
	}
	
	private function statut_us($s)
	{
		if($s == 0)
		{ $statut = '<span class="afaire">A faire</span>'; }
		else if($s == 1)
		{ $statut = '<span class="encours">En cours</span>'; }
		else
		{ $statut = '<span class="termine">Terminé</span>'; }
		
		return $statut;
	}
	
	public function build_backlog()
	{
		foreach($this->modeleUS->get_backlog() as $ligne_backlog)
		{
			$this->build_line_backlog($ligne_backlog);
		}
	}
	
	private function build_line_backlog($ligne)
	{	
		?>
		<tr>
			<td><?php echo $ligne['ID']; ?></td>
			<td><a href="us.php?ID=<?php echo $ligne['ID']; ?>"><?php echo $ligne['titre']; ?></a></td>
			<td><?php echo $ligne['sprint']; ?></td>
			<td><?php echo $ligne['dependances']; ?></td>
			<td><?php echo $ligne['cout']; ?></td>
			<td><?php echo $ligne['date_debut']; ?></td>
			<td><?php echo $ligne['date_fin']; ?></td>
			<td><?php echo $this->statut_us($ligne['statut']); ?></td>
			<td><?php echo $ligne['date_test']; ?></td>
			<td>
				<a href="modifier_us.php?us=<?php echo $ligne['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="supprimer_us.php?us=<?php echo $ligne['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}		
	
	public function build_infos_us($id)
	{
		$us = $this->modeleUS->get_US($id)->fetch(PDO::FETCH_ASSOC);
		
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