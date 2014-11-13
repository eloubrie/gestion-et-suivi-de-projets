<?php
include("bdd/bdd.php");

include("controllers/developer.php");
$controllerDeveloper = new ControllerDeveloper();

if ($_GET['inscription'] == "true")
{
    if ($_POST['inputPassword'] != $_POST['inputConfirmationPassword'])
        { header("location: inscription.php?inscription=errorPassword"); }
    else
        { $controllerDeveloper->_inscription($_POST['inputPseudo'], $_POST['inputPassword'], $_POST['inputEmail']); }
}

include("structure/top_page.php");
?>


<div class="bloc_formulaire">
    <form class="form-horizontal" method="post" action="inscription.php?inscription=true">
        <fieldset>

        <!-- Form Name -->
        <legend>Inscription</legend>

        <!-- Pseudo input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputPseudo">pseudo</label>
            <div class="col-md-5">
                <input id="inputPseudo" name="inputPseudo" class="form-control input-md" required="" type="text" 
                       placeholder="<?php if ($_GET['inscription'] == "errorPseudo") { echo "Ce pseudo existe déjà"; } else { echo "Entrez votre pseudo"; }?>" 
                       <?php if ($_GET['inscription'] == "errorPseudo") { echo 'style="background-color: #A0192F; color: white;"'; }?> />
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputPassword">mot de passe</label>
            <div class="col-md-6">
                <input id="inputPassword" name="inputPassword" class="form-control input-md" required="" type="password" 
                       placeholder="<?php if ($_GET['inscription'] == "errorPassword") { echo "mauvais mot de passe"; } else { echo "Entrez votre mot de passe"; }?>" 
                       <?php if ($_GET['inscription'] == "errorPassword") { echo 'style="background-color: #A0192F; color: white;"'; }?> />
            </div>
        </div>
        
        <!-- Confirmation Password input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputConfirmationPassword">confirmation</label>
            <div class="col-md-6">
                <input id="inputConfirmationPassword" name="inputConfirmationPassword" class="form-control input-md" required="" type="password" 
                       placeholder="<?php if ($_GET['inscription'] == "errorPassword") { echo "mauvais mot de passe"; } else { echo "Confirmez votre mot de passe"; }?>" 
                       <?php if ($_GET['inscription'] == "errorPassword") { echo 'style="background-color: #A0192F; color: white;"'; }?> />
            </div>
        </div>

        <!-- Email input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="inputEmail">email</label>
            <div class="col-md-5">
                <input id="inputEmail" name="inputEmail" class="form-control input-md" required="" type="text" placeholder="Entrez votre email" />
            </div>
        </div>
        
        <!-- Validation button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="validateInscription"></label>
            <div class="col-md-8">
                <input class="btn btn-primary col-md-5" type="submit" value="S'inscire" />
            </div>
        </div>
        
        </fieldset>
    </form>
</div>

<?php
include("structure/bottom_page.php");
?>