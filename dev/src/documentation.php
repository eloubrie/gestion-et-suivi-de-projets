<?php
include("bdd/bdd.php");
include("structure/top_page.php"); 

include("controllers/documentation.php");
$controllerDocumentation = new ControllerDocumentation(); 

$controllerDocumentation->_buildDocumentationInfo(1); //1 car un seul projet pour le moment
?>

<br /><br />
<a href="manage_documentation.php" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-edit"></span>  Editer la documentation</a>
<?php 
include("structure/bottom_page.php"); 
?>					
						