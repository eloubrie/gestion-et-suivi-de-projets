<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/results.php");
$controllerResults = new ControllerResults(); 
?>
<h3>Burn down Chart du projet</h3>
<img src="imageBDC.php?sprint=0" /> 
<?php include("structure/bottom_page.php"); ?>					
						