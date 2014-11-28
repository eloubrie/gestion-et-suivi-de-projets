<?php
include("bdd/bdd.php");
include("controllers/documentation.php");

$controllerDocumentation = new ControllerDocumentation();

if($_GET['action']=="editer") 
{ 
    $controllerDocumentation->_editDocumentation($_POST['projectDescription'], $_POST['operatingSystems'], $_POST['navigators'], $_POST['languages'], $_POST['frameworks'], $_POST['otherTools']);
    header('Location: documentation.php');
}
else 
{
    include("structure/top_page.php");
    $doc = $controllerDocumentation->_getDocumentation(1); //1 car un seul projet
    
    ?>
    <h2>Editer la documentation</h2>
    <br />
    
    <div class="bloc_formulaire">
        <form class="form-horizontal" action="manage_documentation.php?action=editer" method="post">
            <fieldset>

                <!-- Fieldset Name -->
                <legend>Informations Générales</legend>

                <!-- Documentation Description Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="projectDescription">Description projet</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="projectDescription" name="projectDescription" placeholder="Donner une description pour le projet en cours"><?php echo $doc['description']?></textarea>
                    </div>
                </div>
                
            </fieldset>
            
            <fieldset>

                <!-- Fieldset Name -->
                <legend>Informations Techniques</legend>

                <!-- Operating Systems Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="operatingSystems">Systèmes d'exploitations</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="operatingSystems" name="operatingSystems" placeholder="Donner une liste de systèmes d'exploitations que supportera votre projet"><?php echo $doc['systemes_exploitation']?></textarea>
                    </div>
                </div>
                
                <!-- Navigators Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="navigators">Navigateurs web</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="navigators" name="navigators" placeholder="Donner une liste de navigateurs web que supportera votre projet (Si votre projet est un projet Web)"><?php echo $doc['navigateurs']?></textarea>
                    </div>
                </div>
                
                <!-- Languages Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="languages">Langages de programmation</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="languages" name="languages" placeholder="Donner une liste des langages de programmation utilisés pour déveloper votre projet"><?php echo $doc['langages']?></textarea>
                    </div>
                </div>
                
                <!-- Frameworks Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="frameworks">Frameworks</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="frameworks" name="frameworks" placeholder="Donner une liste de frameworks utilisés pour déveloper votre projet"><?php echo $doc['frameworks']?></textarea>
                    </div>
                </div>
                
                <!-- Other tools Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="otherTools">Autres outils</label>
                    <div class="col-md-8">                     
                        <textarea class="otherTools" id="navigators" name="otherTools" placeholder="Donner une liste des autres outils utilisés pour déveloper votre projet"><?php echo $doc['autres_outils']?></textarea>
                    </div>
                </div>
                
                <!-- Validation Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Editer la Documentation</button>
                    </div>
                </div>
                
            </fieldset>
        </form>

    </div>

    <?php
    include("structure/bottom_page.php");
}