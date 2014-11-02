<?php
include("structure/top_page.php"); 

include("controllers/tasc.php");
$controllerTasc = new ControllerTasc(); 
?>

<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Créer une nouvelle tâche</a>
<br /><br />

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Liste des tâches</h3>
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
					<?php $controllerTasc->_buildTascList(); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<?php include("structure/bottom_page.php"); ?>					
						