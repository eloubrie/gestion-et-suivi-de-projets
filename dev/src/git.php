<?php
include("structure/haut_design.php"); 
include("controleurs/controleur_git.php");
?>

<?php
$controleur = new ControleurGit();
?>
<p> <a href="<?php echo $controleur->_printGitLink() ?>">Adresse du dépot Git </a>
    <a href="VueModifierGit.php?URL=<?php /*echo $controleur->_printGitLink()*/?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a></p>
<?php include("structure/bas_design.php"); ?>					
						