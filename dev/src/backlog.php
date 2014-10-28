<?php
include("structure/haut_design.php"); 

include("controleurs/controleur_backlog.php");
?>

<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Créer une nouvelle US</a>
<br /><br />

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Liste des US</h3>
				</div>
				<thead>
					<tr>
						<th>Numéro</th>
						<th>Titre</th>
						<th>Sprint</th>
						<th>Dépendances</th>
						<th>Coût</th>
						<th>Date début</th>
						<th>Date fin</th>
						<th>Statut</th>
						<th>Date test</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $controleur->build_table(); ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<?php include("structure/bas_design.php"); ?>					
						