<?php
include("structure/haut_design.php"); 

include("controleurs/controleur_depot.php");
?>

<p> <a href="<?php echo $controleur->_printGitLink() ?>">Adresse du dépot Git</a></p>

<?php include("structure/bas_design.php"); ?>					
						