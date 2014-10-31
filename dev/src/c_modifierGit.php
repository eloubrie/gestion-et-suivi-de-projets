<?php
include("structure/haut_design.php");
include("controleurs/controleur_git.php");

?>
<?php
$controleur = new ControleurGit();
$controleur->_modifyGitLink($_POST['NewURL']);
?>
<?php include("structure/bas_design.php"); ?>					


