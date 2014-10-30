<?php
include("structure/haut_design.php");
//include("modeles/modele_git.php");
include("controleurs/controleur_depot.php");

?>
<?php
echo $_POST['NewURL'];
$controleur->_modifyGitLink($_POST['NewURL']);
?>
<?php include("structure/bas_design.php"); ?>					


