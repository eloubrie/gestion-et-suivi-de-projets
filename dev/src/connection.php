<?php
include("bdd/bdd.php");

include("controllers/developer.php");
$controllerDeveloper = new ControllerDeveloper();

if ($_GET['connection'] == "true")
{
    $controllerDeveloper->_connection($_POST['inputPseudo'], $_POST['inputPassword']);
}

include("structure/top_page.php");
?>


<div class="bloc_formulaire">
    <form class="form-horizontal" method="post" action="connection.php?connection=true">
        <fieldset>

        <!-- Form Name -->
        <legend>Connexion</legend>

        <!-- Pseudo input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputPseudo">pseudo</label>
            <div class="col-md-6">
                <input id="inputPseudo" name="inputPseudo" class="form-control input-md" required="" type="text" 
                       placeholder="<?php if ($_GET['connection'] == "error") { echo "mauvais pseudo"; } else { echo "Entrez votre pseudo"; }?>" 
                       <?php if ($_GET['connection'] == "error") { echo 'style="background-color: #A0192F; color: white;"'; }?> />
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputPassword">mot de passe</label>
            <div class="col-md-6">
                <input id="inputPassword" name="inputPassword" class="form-control input-md" required="" type="password" 
                       placeholder="<?php if ($_GET['connection'] == "error") { echo "mauvais mot de passe"; } else { echo "Entrez votre mot de passe"; }?>" 
                       <?php if ($_GET['connection'] == "error") { echo 'style="background-color: #A0192F; color: white;"'; }?> />
            </div>
        </div>

        <!-- Validation button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="validateConnexion"></label>
            <div class="col-md-8">
                <input class="btn btn-primary col-md-5" type="submit" value="Se connecter" />
            </div>
        </div>
        
        </fieldset>
    </form>
</div>

<?php
include("structure/bottom_page.php");
?>