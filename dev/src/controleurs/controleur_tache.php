<?php
include("modeles/modele_taches.php");

class ControleurTache
{
	private $modeleTaches;

	public function __construct()
	{
		$this->modeleTaches = new ModeleTaches();
	}
	
	private function type_tache($t)
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
	
	public function build_liste_taches()
	{
		foreach($this->modeleTaches->get_taches() as $tache)
		{
			$this->build_line_liste_taches($tache);
		}
	}
	
	public function build_liste_taches_us($id)
	{
		foreach($this->modeleTaches->get_taches_US($id) as $tache)
		{
			$this->build_line_liste_taches($tache);
		}
	}
	
	private function build_line_liste_taches($ligne)
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
			<td><a href="tache.php?ID=<?php echo $ligne['ID']; ?>"><?php echo $ligne['titre']; ?></a></td>
			<td><?php echo $this->type_tache($ligne['type']); ?></td>
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
	
	public function build_infos_tache($id)
	{
		$tache = $this->modeleTaches->get_tache($id)->fetch(PDO::FETCH_ASSOC);
		
		?>
		<h3><?php echo $tache['titre']; ?> (tâche numéro <?php echo $tache['ID']; ?>)</h3><br />
		<p><b>Description :</b> <?php echo $tache['description']; ?></p>
		<p><b>US :</b> <?php echo $tache['us']; ?></p>
		<p><b>Type :</b> <?php echo $this->type_tache($tache['type']); ?></p>
		<p><b>Coût :</b> <?php echo $tache['cout']; ?></p>
		<p><b>Dépendances :</b> <?php echo $tache['dependances']; ?></p>
		<p><b>Développeur :</b> <?php echo $tache['developpeur']; ?></p>
		<p><b>Statut :</b> <?php echo $tache['statut']; ?></p>
		<p><b>Date de réalisation :</b> <?php echo $tache['date_realisation']; ?></p>
		<p><b>Date du dernier test :</b> <?php echo $tache['date_test']; ?></p>
		<br />
		<?php
	}
}