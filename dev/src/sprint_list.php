<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/sprint.php");
include("controllers/us.php");
$controllerSprint = new ControllerSprint(); 
$controllerUs = new ControllerUs(); 

$controllerUs->_updateSprints();
?>

<a href="manage_sprint.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Créer un nouveau sprint</a>
<br /><br />

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Liste des sprints</h3>
				</div>
				<thead>
					<tr>
						<th>Numéro</th>
						<th>Titre</th>
						<th>Coût</th>
                                                <th>Durée</th>
                                                <th>Date création</th>
                                                <th>Date du début</th>
                                                <th>Date de fin</th>
                                                <th>Coût validé</th>
                                                <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $controllerSprint->_buildSprintList(); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<?php include("structure/bottom_page.php"); ?>					
						