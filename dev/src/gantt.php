<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/gantt.php");
$controllerGantt = new ControllerGantt(); 
?>

<?php
if(ISSET($_POST['sprintID'])){
    $controllerGantt->_setSprint($_POST['sprintID']);
}

if(ISSET($_GET['refreshSprint'])){
    $controllerGantt->_setSprint($_GET['refreshSprint']);
    $controllerGantt->_initGanttModel();
}
?>

<form method="post" id="formSprintChoice" name="formSprintChoice" action='gantt.php'>
     <fieldset>
        Sélection du sprint : <select name = sprintID> 
            <?php $controllerGantt->_buildSprintList() ?></select>
        <input type="submit" id="in" value="Valider"/>
     </fieldset>
</form> 
<br/>
<a href="gantt.php?refreshSprint=<?php echo $controllerGantt->_getSprint() ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Refresh Gantt du Sprint</a>
<br/>
<br/>

<div class="row">
	<section class="col-sm-12">
		<div class="panel panel-primary">
			<table class="table table-striped table-condensed">
				<div class="panel-heading"> 
					<h3 class="panel-title">Gantt</h3>
				</div>
                                    <?php $controllerGantt->_buildHeader();?>
                                    <?php $controllerGantt->_buildTable();?>
			</table>
		</div>
	</section>
</div>

<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> TODO : Validation</a>

<?php include("structure/bottom_page.php"); ?>					
						