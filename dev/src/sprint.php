<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/sprint.php");
include("controllers/us.php");
$controllerSprint = new ControllerSprint(); 
$controllerUs = new ControllerUs(); 

$controllerSprint->_buildSprintInfo($_GET['ID']);
$gitLink = $controllerSprint->_getGitLink($_GET['ID']);
?>

<?php 
if($controllerSprint->_isGitLink($gitLink))
{?><br /><a href="<?php echo $gitLink; ?>" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-save"></span>  Télécharger le code</a><div style="clear : both;"><?php }
?>
<br /><br />

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Liste des US associées</h3>
				</div>
				<thead>
					<tr>
						<th>Numéro</th>
						<th>Titre</th>
						<th>Sprint</th>
						<th>Coût</th>
						<th>Date début</th>
						<th>Date fin</th>
						<th>Statut</th>
						<th>Date test</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $controllerUs->_buildUsListFromSprint($_GET['ID']); ?>
				</tbody>
			</table>
		</div>
	</section>
</div><br />

<h3>Burn Down Chart</h3>
<img src="imageBDC.php?sprint=<?php echo $_GET['ID']; ?>" /> 

<?php include("structure/bottom_page.php"); ?>					
						