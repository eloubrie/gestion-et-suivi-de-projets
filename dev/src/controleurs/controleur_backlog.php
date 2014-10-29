<?php
include("modeles/modele_us.php");

class Controleur
{
	private $modeleUS;

	public function __construct()
	{
		$this->modeleUS = new ModeleUS();
	}
	
	public function build_table()
	{
		foreach($this->modeleUS->get_backlog() as $ligne_backlog)
		{
			$this->build_line($ligne_backlog);
		}
	}
	
	private function build_line($ligne)
	{
		if($ligne['statut'] == 0)
		{ $ligne['statut'] = '<span class="afaire">A faire</span>'; }
		else if($ligne['statut'] == 1)
		{ $ligne['statut'] = '<span class="encours">En cours</span>'; }
		else
		{ $ligne['statut'] = '<span class="termine">Terminé</span>'; }
	
		?>
		<tr>
			<td><?php echo $ligne['ID']; ?></td>
			<td><a href="us.php?ID=<?php echo $ligne['ID']; ?>"><?php echo $ligne['titre']; ?></a></td>
			<td><?php echo $ligne['sprint']; ?></td>
			<td><?php echo $ligne['dependances']; ?></td>
			<td><?php echo $ligne['cout']; ?></td>
			<td><?php echo $ligne['date_debut']; ?></td>
			<td><?php echo $ligne['date_fin']; ?></td>
			<td><?php echo $ligne['statut']; ?></td>
			<td><?php echo $ligne['date_test']; ?></td>
			<td>
				<a href="modifier_us.php?us=<?php echo $ligne['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="supprimer_us.php?us=<?php echo $ligne['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}		
}

$controleur = new Controleur(); 