<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/tasc.php");
$controllerTasc = new ControllerTasc(); 

$controllerTasc->_buildTascInfo($_GET['ID']);

include("structure/bottom_page.php");
?>					
						