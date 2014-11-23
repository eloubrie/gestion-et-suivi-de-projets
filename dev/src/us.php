<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/us.php");
include("controllers/tasc.php");
$controllerUs = new ControllerUs(); 
$controllerTasc = new ControllerTasc(); 

$controllerUs->_buildUsInfo($_GET['ID']);
$gitLink = $controllerUs->_getGitLink($_GET['ID']);
?>

<a href="launch_test?us=<?php echo $_GET['ID']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-refresh"></span>  Lancer le test</a>
<?php if ($controllerUs->_isGitLink($gitLink))
{?>
    <a href="<?php echo $gitLink; ?>" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-save"></span>  Télécharger le code</a>
<?php 
}
?>
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
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $controllerTasc->_buildTascListFromUs($_GET['ID']); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<?php include("structure/bottom_page.php"); ?>					
						