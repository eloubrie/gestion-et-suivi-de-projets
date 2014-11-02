<?php
include("structure/top_page.php"); 

include("controllers/us.php");
include("controllers/tasc.php");
$controllerUs = new ControllerUs(); 
$controllerTasc = new ControllerTasc(); 

$controllerUs->_buildUsInfo($_GET['ID']);
?>

<a href="launch_test?us=<?php echo $_GET['ID']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-refresh"></span>  Lancer le test</a>
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
					<?php $controllerTasc->_buildTascListFromUs($_GET['ID']); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<a href="associate_tasc?us=<?php echo $_GET['ID']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-list-alt"></span>  Associer une nouvelle tâche</a>

<?php include("structure/bottom_page.php"); ?>					
						