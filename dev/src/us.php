<?php
include("structure/haut_design.php"); 

include("modeles/modele_us.php");
include("controleurs/controleur_us.php");

$us = $controleur->getDonneesUS($_GET['ID'])
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
					<?php $controleur->build_liste_taches_us($_GET['ID']); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<a href="associer_tache?us=<?php echo $us['ID']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-list-alt"></span>  Associer une nouvelle tâche</a>

<?php include("structure/bas_design.php"); ?>					
						