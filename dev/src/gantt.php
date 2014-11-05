<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/gantt.php");
$controllerGantt = new ControllerGantt(); 
?>

<h1>TODO : Gestion du Gantt</h1>

<p>Attention : Un modèle et un contrôleur (vides) existent déjà pour cette page.</p>

<?php include("structure/bottom_page.php"); ?>					
						