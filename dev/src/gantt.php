<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/gantt.php");
$controllerGantt = new ControllerGantt(); 
?>

<form method="post" id="formSprintChoice" name="formSprintChoice" action='gantt.php'>
     <fieldset>
        Sélection du sprint : <select name = sprintNumber> <?php $controllerGantt->_buildSprintList()?> </select>
        <input type="submit" id="in" value="Valider"/>
     </fieldset>
 </form>
<br/>
<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Gantt</h3>
				</div>
				<thead>
                                    <?php if(ISSET($_POST)) {/*$controllerGantt->_buildHeader();*/}?>
				</thead>
				<tbody>
                                    <?php if(ISSET($_POST)) {/*$controllerGantt->_buildTable();*/}?>
				</tbody>
			</table>
		</div>
	</section>
</div>
<?php include("structure/bottom_page.php"); ?>					
						