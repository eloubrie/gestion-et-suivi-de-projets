<?php
include("bdd/bdd.php");
include("controllers/tasc.php");
include("controllers/us.php");
include("controllers/developer.php");
$controllerTasc = new ControllerTasc();
$controllerUs = new ControllerUs();
$controllerDeveloper = new ControllerDeveloper();

if ($_GET['action'] == "add") 
    { $controllerTasc->_insertTasc($_POST['associatedUS'], $_POST['title'], $_POST['tascDescription'], $_POST['tascType'], $_POST['cost'], $_POST['otherTascsDependencies'], $_POST['developer'], $_POST['status'], $_POST['realisationDate'], $_POST['testDate']); }
else if($_GET['action']=="modif") 
    { $controllerTasc->_modifTasc($_GET['modif_tasc'], $_POST['associatedUS'], $_POST['title'], $_POST['tascDescription'], $_POST['tascType'], $_POST['cost'], $_POST['otherTascsDependencies'], $_POST['developer'], $_POST['status'], $_POST['realisationDate'], $_POST['testDate']); }
else if ($_GET['action'] == "suppr") 
    { $controllerTasc->_supprTasc($_GET['tasc_suppr']); }
else 
{
    include("structure/top_page.php");
    
    if(!empty($_GET['modif_tasc']))
    { 
	$action = "?action=modif&modif_tasc=".$_GET['modif_tasc'];
	$tasc = $controllerTasc->_getTasc($_GET['modif_tasc']); 
    }
    else
    {
        $action = "?action=add";
    }

    $developers = $controllerDeveloper->_getDevelopers();
    $usList = $controllerUs->_getBacklog();
    ?>

    <div class="bloc_formulaire">
        <form class="form-horizontal" action="manage_tasc.php<?php echo $action ?>" method="post">
            <fieldset>

                <!-- Form Name -->
                <?php
                if (!empty($_GET['modif_tasc'])) {
                    ?><legend>Modifier une tâche</legend><?php
                } else {
                    ?><legend>Créer une nouvelle tâche</legend><?php }
                ?>

                <!-- Title Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="title">Titre</label>  
                    <div class="col-md-8">
                        <input id="title" name="title" value="<?php echo $tasc['titre']?>" type="text" placeholder="Titre" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Tasc Description Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="tascDescription">Description tâche</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="tascDescription" name="tascDescription" placeholder="Donner une description de la tâche que vous voulez créer"><?php echo $tasc['description']?></textarea>
                    </div>
                </div>

                <!-- Tasc Type Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="tascType">Type</label>
                    <div class="col-md-8">
                        <select id="tascType" name="tascType" class="form-control">
                            <option value="1" <?php if($tasc['type']==1) { echo "selected"; } ?>>Dev</option>
                            <option value="2" <?php if($tasc['type']==2) { echo "selected"; } ?>>Test</option>
                            <option value="3" <?php if($tasc['type']==3) { echo "selected"; } ?>>Spec</option>
                            <option value="4" <?php if($tasc['type']==4) { echo "selected"; } ?>>Doc</option>
                        </select>
                    </div>
                </div>

                <!-- Cost Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="cost">Coût</label>
                    <div class="col-md-8">
                        <select id="cost" name="cost" class="form-control">
                            <option value="1" <?php if($tasc['cout']==1) { echo "selected"; } ?>>1</option>
                            <option value="2" <?php if($tasc['cout']==2) { echo "selected"; } ?>>2</option>
                            <option value="3" <?php if($tasc['cout']==3) { echo "selected"; } ?>>3</option>
                            <option value="5" <?php if($tasc['cout']==5) { echo "selected"; } ?>>5</option>
                            <option value="8" <?php if($tasc['cout']==8) { echo "selected"; } ?>>8</option>
                            <option value="13" <?php if($tasc['cout']==13) { echo "selected"; } ?>>13</option>
                            <option value="21" <?php if($tasc['cout']==21) { echo "selected"; } ?>>21</option>
                            <option value="34" <?php if($tasc['cout']==34) { echo "selected"; } ?>>34</option>
                            <option value="55" <?php if($tasc['cout']==55) { echo "selected"; } ?>>55</option>
                            <option value="89" <?php if($tasc['cout']==89) { echo "selected"; } ?>>89</option>
                            <option value="144" <?php if($tasc['cout']==144) { echo "selected"; } ?>>144</option>
                            <option value="233" <?php if($tasc['cout']==233) { echo "selected"; } ?>>233</option>
                            <option value="377" <?php if($tasc['cout']==377) { echo "selected"; } ?>>377</option>
                            <option value="610" <?php if($tasc['cout']==610) { echo "selected"; } ?>>610</option>
                            <option value="987" <?php if($tasc['cout']==987) { echo "selected"; } ?>>987</option>
                        </select>
                    </div>
                </div>

                <!-- Associated US Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="associatedUS">US associée(s)</label>
                    <div class="col-md-8">
                        <select id="associatedUS" name="associatedUS" class="form-control">
                            <option value="0">Aucune</option>
                            <?php
                            foreach ($usList as $us) {
                                ?><option value="<?php echo $us['ID']; ?>" <?php if($tasc['ID_US']==$us['ID']) { echo "selected"; } ?>><?php echo '#' . $us['ID'] . ': ' . $us['titre']; ?></option><?php }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Other Tascs Dependencies input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="otherTascsDependencies">Dépendances</label>  
                    <div class="col-md-8">
                        <input id="otherTascsDependencies" name="otherTascsDependencies" value="<?php echo $tasc['dependances']?>" type="text" placeholder="Dépendances inter-tâches (exemple: 2,4,5)" class="form-control input-md">
                    </div>
                </div>

                <!-- Developer Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="developer">Développeur</label>
                    <div class="col-md-8">
                        <select id="developer" name="developer" class="form-control">
                            <option value="0">Aucun</option>
                            <?php
                            foreach ($developers as $developer) {
                                ?><option value="<?php echo $developer['ID']; ?>" <?php if($tasc['developpeur']==$developer['ID']) { echo "selected"; } ?>><?php echo $developer['pseudo']; ?></option><?php }
                            ?>
                        </select>
                    </div>
                </div>


                <!-- Begin Date Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="realisationDate">Date réalisation</label>  
                    <div class="col-md-8">
                        <input id="realisationDate" name="realisationDate" value="<?php echo $tasc['date_realisation']?>" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
                    </div>
                </div>

                <!-- Test Date input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="testDate">Date test</label>  
                    <div class="col-md-8">
                        <input id="testDate" name="testDate" value="<?php echo $tasc['date_test']?>" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
                    </div>
                </div>

                <!-- Status Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="status">Statut</label>
                    <div class="col-md-8">
                        <select id="status" name="status" class="form-control">
                            <option class="afaire" value="0" <?php if($tasc['statut']==0) { echo "selected"; } ?>><strong>A faire</strong></option>
                            <option class="encours" value="1" <?php if($tasc['statut']==1) { echo "selected"; } ?>><strong>En cours</strong></option>
                            <option class="termine" value="2" <?php if($tasc['statut']==2) { echo "selected"; } ?>><strong>Terminé</strong></option>
                        </select>
                    </div>
                </div>

                <!-- Validation Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">
                            <?php
                            if (!empty($_GET['modif_tasc'])) {
                                ?>Modifier cette tâche<?php
                            } else {
                                ?>Créer cette tâche<?php }
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

if (!empty($_GET['action'])) 
{
    header('Location: tasc_list.php');
}
