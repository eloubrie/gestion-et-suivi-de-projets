<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/gantt.php");
$controllerGantt = new ControllerGantt(); 
?>

<h1>TODO : Gestion du Gantt</h1>

<p>Attention : Un modèle et un contrôleur (vides) existent déjà pour cette page.</p>

<p>Sélection du Sprint : <select name = sprintNumber> <?php $controllerGantt->_buildSprintList()?> </select></p>

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Gantt</h3>
				</div>
				<thead>
                                    <?php /*$controllerGantt->_buildHeader();*/?>
				</thead>
				<tbody>
                                    <?php /*$controllerGantt->_buildTable();*/?>
				</tbody>
			</table>
		</div>
	</section>
</div>
<?php include("structure/bottom_page.php"); ?>					
						