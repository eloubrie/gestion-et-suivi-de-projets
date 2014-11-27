<?php
include("bdd/bdd.php");
include("controllers/git.php");
include("structure/top_page.php");

$controllerGit = new ControllerGit(); 

if($_GET['modify']==1)
{
	$controllerGit = new ControllerGit();
	$controllerGit->_modifyGitLink($_POST['NewURL']);
}
?>

<legend>Gestion du dépôt Git</legend>
<p>Lien du dépôt Git : <a href="<?php echo $controllerGit->_printGitLink() ?>"><?php echo $controllerGit->_printGitLink() ?></a></p><br />

<div class="bloc_formulaire">
	<form class="form-horizontal" action="git.php?modify=1" method="post">
		<fieldset>
		
			<!-- Title Input-->
			<b>Nouveau lien git :</b>
			<div class="form-group">
				<div class="col-md-8">
					<input id="NewURL" name="NewURL" type="text" placeholder="Lien" class="form-control input-md" required="">
				</div>
			</div>

			<!-- Validation Button -->
			<div class="form-group">
				<div class="col-md-4">
					<button id="submit" name="submit" class="btn btn-primary">Modifier le lien</button>
				</div>
			</div>

		</fieldset>
	</form>
</div>


<?php include("structure/bottom_page.php"); ?>					
						