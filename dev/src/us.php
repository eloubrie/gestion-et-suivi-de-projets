<?php
include("structure/haut_design.php"); 

include("controleurs/controleur_us.php");
include("controleurs/controleur_tache.php");
$controleurUS = new ControleurUS(); 
$controleurTache = new ControleurTache(); 

$controleurUS->build_infos_us($_GET['ID']);
?>

<a href="lancer_test?us=<?php echo $us['ID']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-refresh"></span>  Lancer le test</a>
<a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-save"></span>  Télécharger le code</a>
<a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-log-out"></span>  Version du projet</a>
<br /><br /><br />

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Liste des tâches associées</h3>
				</div>
				<thead>
					<tr>
						<th>Numéro</th>
						<th>Titre</th>
						<th>Type</th>
						<th>Dépendances</th>
						<th>Coût</th>
						<th>Développeur</th>
						<th>Statut</th>
						<th>Date réalisation</th>
						<th>Date test</th>
					</tr>
				</thead>
				<tbody>
					<?php $controleurTache->build_liste_taches_us($_GET['ID']); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<a href="associer_tache?us=<?php echo $us['ID']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-list-alt"></span>  Associer une nouvelle tâche</a>

<?php include("structure/bas_design.php"); ?>					
						