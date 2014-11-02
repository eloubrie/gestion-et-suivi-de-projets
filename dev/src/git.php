<?php
include("structure/top_page.php");

include("controllers/git.php");
$controllerGit = new ControllerGit(); 
?>

<p>
<a href="<?php echo $controllerGit->_printGitLink() ?>">Adresse du dépot Git </a>
<a href="v_ModifyGit.php?URL=<?php /*echo $controleur->_printGitLink()*/?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</p>

<?php include("structure/bottom_page.php"); ?>					
						