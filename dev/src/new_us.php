<?php
include("bdd/bdd.php");
include("controllers/us.php");
$controllerUs = new ControllerUs(); 

if(!empty($_GET['title']))
{
	$controllerUs->_insertUs($_GET['title'],$_GET['description'],$_GET['sprint'],$_GET['cost'],$_GET['dependances'],$_GET['datebegin'],$_GET['dateend'],$_GET['status'],$_GET['descriptiontest'],$_GET['codetest'],$_GET['linkgit']);
	header('Location: backlog.php');
}
else
{
	include("structure/top_page.php"); 
	?>
	
	<div class="bloc_formulaire">

		<form class="form-horizontal">
			<fieldset>

				<!-- Form Name -->
				<legend>Créer un nouvelle US</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="title">Titre</label>  
					<div class="col-md-8">
						<input id="title" name="title" type="text" placeholder="Titre" class="form-control input-md" required="">
					</div>
				</div>
				
				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="codetest">Description US</label>
					<div class="col-md-4">                     
						<textarea class="form-control" id="description" name="description" required=""></textarea>
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="sprint">Sprint</label>
					<div class="col-md-8">
						<select id="sprint" name="sprint" class="form-control">
							<option value="0">Aucun</option>
							<option value="1">Sprint 1</option>
							<option value="2">Sprint 2</option>
							<option value="3">Sprint 3</option>
							<option value="4">Sprint 4</option>
						</select>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="dependances">Dépendances</label>  
					<div class="col-md-8">
						<input id="dependances" name="dependances" type="text" placeholder="Dépendances" class="form-control input-md">
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="cost">Coût</label>
					<div class="col-md-8">
						<select id="cost" name="cost" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="5">5</option>
							<option value="8">8</option>
							<option value="13">13</option>
							<option value="21">21</option>
							<option value="34">34</option>
							<option value="55">55</option>
							<option value="89">89</option>
							<option value="144">144</option>
							<option value="233">233</option>
							<option value="377">377</option>
							<option value="610">610</option>
							<option value="987">987</option>
						</select>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="datebegin">Date début</label>  
					<div class="col-md-8">
						<input id="datebegin" name="datebegin" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="dateend">Date fin</label>  
					<div class="col-md-8">
						<input id="dateend" name="dateend" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
					</div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="status">Statut</label>
					<div class="col-md-8">
					<select id="status" name="status" class="form-control">
						<option value="0">A faire</option>
						<option value="1">En cours</option>
						<option value="2">Terminé</option>
					</select>
					</div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="descriptiontest">Description test</label>
					<div class="col-md-4">                     
						<textarea class="form-control" id="descriptiontest" name="descriptiontest"></textarea>
					</div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="codetest">Code test</label>
					<div class="col-md-4">                     
						<textarea class="form-control" id="codetest" name="codetest"></textarea>
					</div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-3 control-label" for="linkgit">Lien Git</label>  
					<div class="col-md-8">
						<input id="linkgit" name="linkgit" type="text" placeholder="Lien Git" class="form-control input-md">
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="submit"></label>
					<div class="col-md-4">
						<button id="submit" name="submit" class="btn btn-primary">Créer cette US</button>
					</div>
				</div>

			</fieldset>
		</form>

	</div>
	
	<?php
	include("structure/bottom_page.php"); 	
}					