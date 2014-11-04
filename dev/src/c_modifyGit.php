<?php
include("bdd/bdd.php");
include("structure/top_page.php");
include("controllers/git.php");

$controllerGit = new ControllerGit();
$controllerGit->_modifyGitLink($_POST['NewURL']);

include("structure/bottom_page.php"); 
?>					


