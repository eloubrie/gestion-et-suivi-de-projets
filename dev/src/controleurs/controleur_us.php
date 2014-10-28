<?php
include("modeles/modele_us.php");

class Controleur
{
	private $modeleUS;

	public function __construct()
	{
		$this->modeleUS = new ModeleUS();
	}
	
	public function getDonneesUS($id)
	{
		$donnees = $this->modeleUS->get_US($id)->fetch(PDO::FETCH_ASSOC);
		
		if($donnees['statut'] == 0)
		{ $donnees['statut'] = '<span class="afaire">A faire</span>'; }
		else if($donnees['statut'] == 1)
		{ $donnees['statut'] = '<span class="encours">En cours</span>'; }
		else
		{ $donnees['statut'] = '<span class="termine">Terminé</span>'; }
		
		return $donnees;
	}
	
	public function build_liste_taches_us($id)
	{
		foreach($this->modeleUS->get_taches_US($id) as $tache)
		{
			$this->build_line($tache);
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
			<td><a href="taches.php?ID=<?php echo $ligne['ID']; ?>"><?php echo $ligne['titre']; ?></a></td>
			<td><?php echo $ligne['type']; ?></td>
			<td><?php echo $ligne['dependances']; ?></td>
			<td><?php echo $ligne['cout']; ?></td>
			<td><?php echo $ligne['developpeur']; ?></td>
			<td><?php echo $ligne['statut']; ?></td>
			<td><?php echo $ligne['date_realisation']; ?></td>
			<td><?php echo $ligne['date_test']; ?></td>
			<td>
				<a href="modifier_tache.php?ID=<?php echo $ligne['ID']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="supprimer_tache.php?ID=<?php echo $ligne['ID']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}	
}

$controleur = new Controleur(); 