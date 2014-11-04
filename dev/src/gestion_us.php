<?php
include("bdd/bdd.php");
include("controllers/us.php");
include("controllers/sprint.php");
$controllerUs = new ControllerUs();
$controllerSprint = new ControllerSprint(); 

if($_GET['action']=="add")
{ $controllerUs->_insertUs($_POST['title'],$_POST['description'],$_POST['sprint'],$_POST['cost'],$_POST['dependances'],$_POST['datebegin'],$_POST['dateend'],$_POST['status'],$_POST['descriptiontest'],$_POST['codetest'],$_POST['linkgit']); }
else if($_GET['action']=="modif")
{ $controllerUs->_modifUs($_GET['modif_US'], $_POST['title'],$_POST['description'],$_POST['sprint'],$_POST['cost'],$_POST['dependances'],$_POST['datebegin'],$_POST['dateend'],$_POST['status'],$_POST['descriptiontest'],$_POST['codetest'],$_POST['linkgit']); }
else if($_GET['action']=="suppr")
{ $controllerUs->_supprUs($_GET['US_suppr']); }
else
{
	include("structure/top_page.php"); 
	
	if(!empty($_GET['modif_US']))
	{ 
		$action = "?action=modif&modif_US=".$_GET['modif_US'];
		$us = $controllerUs->_getUs($_GET['modif_US']); 
	}
	else
	{
		$action = "?action=add";
	}
	
	$sprints = $controllerSprint->_getSprintList();
	?>
	
	<div class="bloc_formulaire">

		<form class="form-horizontal" action="gestion_us.php<?php echo $action ?>" method="post">
			<fieldset>

				<!-- Form Name -->
				<?php 
				if(!empty($_GET['modif_US'])) 
				{ ?><legend>Modifier une US</legend><?php }
				else
				{ ?><legend>Créer une nouvelle US</legend><?php }
				?>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="title">Titre</label>  
					<div class="col-md-8">
						<input id="title" name="title" value="<?php echo $us['titre']; ?>" type="text" placeholder="Titre" class="form-control input-md" required="">
					</div>
				</div>
				
				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="codetest">Description US</label>
					<div class="col-md-4">                     
						<textarea class="form-control" id="description" name="description" required=""><?php echo $us['description']; ?></textarea>
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="sprint">Sprint</label>
					<div class="col-md-8">
						<select id="sprint" name="sprint" class="form-control">
							<option value="0">Aucun</option>
							<?php
							foreach($sprints as $s)
							{ ?><option value="<?php echo $s['Numéro du Sprint']; ?>" <?php if($us['sprint']==$s['Numéro du Sprint']) { echo "selected"; } ?>><?php echo $s['Numéro du Sprint']; ?></option><?php }
							?>
						</select>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="dependances">Dépendances</label>  
					<div class="col-md-8">
						<input id="dependances" name="dependances" value="<?php echo $us['dependances']; ?>" type="text" placeholder="Dépendances" class="form-control input-md">
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="cost">Coût</label>
					<div class="col-md-8">
						<select id="cost" name="cost" class="form-control">
							<option value="1" <?php if($us['cout']==1) { echo "selected"; } ?>>1</option>
							<option value="2" <?php if($us['cout']==2) { echo "selected"; } ?>>2</option>
							<option value="3" <?php if($us['cout']==3) { echo "selected"; } ?>>3</option>
							<option value="5" <?php if($us['cout']==5) { echo "selected"; } ?>>5</option>
							<option value="8" <?php if($us['cout']==8) { echo "selected"; } ?>>8</option>
							<option value="13" <?php if($us['cout']==13) { echo "selected"; } ?>>13</option>
							<option value="21" <?php if($us['cout']==21) { echo "selected"; } ?>>21</option>
							<option value="34" <?php if($us['cout']==34) { echo "selected"; } ?>>34</option>
							<option value="55" <?php if($us['cout']==55) { echo "selected"; } ?>>55</option>
							<option value="89" <?php if($us['cout']==89) { echo "selected"; } ?>>89</option>
							<option value="144" <?php if($us['cout']==144) { echo "selected"; } ?>>144</option>
							<option value="233" <?php if($us['cout']==233) { echo "selected"; } ?>>233</option>
							<option value="377" <?php if($us['cout']==377) { echo "selected"; } ?>>377</option>
							<option value="610" <?php if($us['cout']==610) { echo "selected"; } ?>>610</option>
							<option value="987" <?php if($us['cout']==987) { echo "selected"; } ?>>987</option>
						</select>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="datebegin">Date début</label>  
					<div class="col-md-8">
						<input id="datebegin" name="datebegin" value="<?php echo $us['date_debut']; ?>" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="dateend">Date fin</label>  
					<div class="col-md-8">
						<input id="dateend" name="dateend" value="<?php echo $us['date_fin']; ?>" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="status">Statut</label>
					<div class="col-md-8">
					<select id="status" name="status" class="form-control">
						<option value="0" <?php if($us['statut']==0) { echo "selected"; } ?>>A faire</option>
						<option value="1" <?php if($us['statut']==1) { echo "selected"; } ?>>En cours</option>
						<option value="2" <?php if($us['statut']==2) { echo "selected"; } ?>>Terminé</option>
					</select>
					</div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="descriptiontest">Description test</label>
					<div class="col-md-4">                     
						<textarea class="form-control" id="descriptiontest" name="descriptiontest"><?php echo $us['description_test']; ?></textarea>
					</div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="codetest">Code test</label>
					<div class="col-md-4">                     
						<textarea class="form-control" id="codetest" name="codetest"><?php echo $us['code_test']; ?></textarea>
					</div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="linkgit">Lien Git</label>  
					<div class="col-md-8">
						<input id="linkgit" name="linkgit" value="<?php echo $us['lien_git']; ?>"  type="text" placeholder="Lien Git" class="form-control input-md">
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="submit"></label>
					<div class="col-md-4">
						<button id="submit" name="submit" class="btn btn-primary">
						<?php 
						if(!empty($_GET['modif_US'])) 
						{ ?>Modifier cette US<?php }
						else
						{ ?>Créer cette US<?php }
						?>
						</button>
					</div>
				</div>

			</fieldset>
		</form>

	</div>
	
	<?php
	include("structure/bottom_page.php"); 	
}

if(!empty($_GET['action']))
{ header('Location: backlog.php'); }