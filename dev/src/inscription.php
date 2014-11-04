<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/inscription.php");
$controllerInscription = new ControllerInscription(); 
?>

<h1>TODO : Gestion de l'inscription</h1>

<p>Attention : Un modèle et un contrôleur (vides) existent déjà pour cette page.</p>

<?php include("structure/bottom_page.php"); ?>					
						