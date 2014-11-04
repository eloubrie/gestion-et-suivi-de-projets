<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/tasc.php");
$controllerTasc = new ControllerTasc(); 

$controllerTasc->_buildTascInfo($_GET['ID'])
?>

<a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-save"></span>  Télécharger le code</a>
<a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-log-out"></span>  Version du projet</a>

<?php include("structure/bottom_page.php"); ?>					
						