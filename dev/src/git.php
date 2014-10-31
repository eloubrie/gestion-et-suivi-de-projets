<?php
include("structure/haut_design.php"); 

include("controleurs/controleur_git.php");
$ControleurGit = new ControleurGit();
?>

<p> <a href="<?php echo $ControleurGit->_printGitLink() ?>">Adresse du dépot Git</a></p>
<?php include("structure/bas_design.php"); ?>					
						