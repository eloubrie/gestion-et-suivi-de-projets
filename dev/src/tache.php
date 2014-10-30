<?php
include("structure/haut_design.php"); 

include("controleurs/controleur_tache.php");
$controleurTache = new controleurTache(); 

$controleurTache->build_infos_tache($_GET['ID'])
?>

<a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-save"></span>  Télécharger le code</a>
<a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-log-out"></span>  Version du projet</a>

<?php include("structure/bas_design.php"); ?>					
						