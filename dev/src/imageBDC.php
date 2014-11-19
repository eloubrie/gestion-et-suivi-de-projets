<?php 
include("bdd/bdd.php");
include("controllers/results.php");

$controllerResults = new ControllerResults(); 

if($_GET['sprint']>0)
{ $controllerResults->_drawASprintBDC($_GET['sprint']); }
else
{ $controllerResults->_drawGlobalBDC(); }
?>