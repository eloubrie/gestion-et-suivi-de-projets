<?php
include("structure/haut_design.php"); 

include("modeles/modele_us.php");
include("controleurs/controleur_us.php");
?>

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
						<th>Description</th>
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
						