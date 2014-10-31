<?php
include("structure/haut_design.php");
//include("modeles/modele_git.php");
include("controleurs/controleur_git.php");

?>
<?php
$controleur->_modifyGitLink($_POST['NewURL']);
?>
<?php include("structure/bas_design.php"); ?>					


