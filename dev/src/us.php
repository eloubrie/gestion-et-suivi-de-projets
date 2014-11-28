<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/us.php");
include("controllers/tasc.php");
$controllerUs = new ControllerUs(); 
$controllerTasc = new ControllerTasc(); 

$controllerUs->_buildUsInfo($_GET['ID']);
$gitLink = $controllerUs->_getGitLink($_GET['ID']);

if($controllerUs->_isGitLink($gitLink))
{ ?><br /><a href="<?php echo $gitLink; ?>" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-save"></span>  Télécharger le code</a><div style="clear : both;"><?php }
?>
<br /><br />

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
						