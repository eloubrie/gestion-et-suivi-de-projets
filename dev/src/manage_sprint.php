<?php
include("bdd/bdd.php");
include("controllers/sprint.php");

$controllerSprint = new ControllerSprint();

if ($_GET['action'] == "add") 
    { $controllerSprint->_insertSprint($_POST['number'], $_POST['cost'], $_POST['startDate'], $_POST['duration'], $_POST['endDate'], $_POST['title'], $_POST['sprintDescription']); }
else if($_GET['action']=="modif") 
    { $controllerSprint->_modifSprint($_GET['modif_sprint'], $_POST['number'], $_POST['cost'], $_POST['creationDate'], $_POST['startDate'], $_POST['duration'], $_POST['endDate'], $_POST['title'], $_POST['sprintDescription'], $_POST['validatedCost'], $_POST['linkgit']); }
else if ($_GET['action'] == "suppr") 
    { $controllerSprint->_supprSprint($_GET['sprint_suppr']); }
else 
{
    include("structure/top_page.php");
    
    if(!empty($_GET['modif_sprint']))
    { 
	$action = "?action=modif&modif_sprint=".$_GET['modif_sprint'];
	$sprint = $controllerSprint->_getSprint($_GET['modif_sprint']); 
    }
    else
    {
        $action = "?action=add";
    }

    ?>

    <div class="bloc_formulaire">
        <form class="form-horizontal" action="manage_sprint.php<?php echo $action ?>" method="post">
            <fieldset>

                <!-- Form Name -->
                <?php
                if (!empty($_GET['modif_sprint'])) {
                    ?><legend>Modifier un sprint</legend><?php
                } else {
                    ?><legend>Créer un nouveau sprint</legend><?php }
                ?>

                <!-- Sprint Number Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="number">Numéro</label>  
                    <div class="col-md-8">
                        <input id="number" name="number" value="<?php echo $sprint['numero_du_sprint']?>" type="text" placeholder="Numéro du Sprint" class="form-control input-md" required="">
                    </div>
                </div>    
                    
                <!-- Sprint Title Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="title">Titre</label>  
                    <div class="col-md-8">
                        <input id="title" name="title" value="<?php echo $sprint['titre']?>" type="text" placeholder="Titre" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Sprint Description Input -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="sprintDescription">Description sprint</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="sprintDescription" name="sprintDescription" placeholder="Donner une description au sprint que vous voulez créer"><?php echo $sprint['description']?></textarea>
                    </div>
                </div>

                <!-- Sprint Cost Input -->

                <!-- Sprint Duration Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="duration">Durée</label>  
                    <div class="col-md-8">
                        <input id="duration" name="duration" value="<?php echo $sprint['duree']?>" type="text" placeholder="Donner une durée (nombre de jours)" class="form-control input-md">
                    </div>
                </div>

                <!-- Hidden Creation Date Input -->
                <input type="hidden" name="creationDate" value="<?php echo $sprint['date_creation']?>">
                
                <!-- Begin Date Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="startDate">Date de début</label>  
                    <div class="col-md-8">
                        <input id="startDate" name="startDate" value="<?php echo $sprint['date_debut']?>" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
                    </div>
                </div>

                <!-- End Date Input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="endDate">Date de fin</label>  
                    <div class="col-md-8">
                        <input id="endDate" name="endDate" value="<?php echo $sprint['date_fin']?>" type="text" placeholder="AAAA-MM-JJ" class="form-control input-md">
                    </div>
                </div>
                
                <!-- Hidden Validated Cost Input -->
                <input type="hidden" name="validatedCost" value="<?php echo $sprint['cout_valide']?>">

                <?php
                if(!empty($_GET['modif_sprint']))
                { ?>
                <!-- Git Link input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="linkgit">Lien Git</label>  
                    <div class="col-md-8">
                        <input id="linkgit" name="linkgit" value="<?php echo $sprint['lien_git']; ?>"  type="text" placeholder="Lien Git" class="form-control input-md">
                    </div>
                </div>
                <?php
                }
                ?>
                
                <!-- Validation Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">
                            <?php
                            if (!empty($_GET['modif_sprint'])) {
                                ?>Modifier ce sprint<?php
                            } else {
                                ?>Créer ce sprint<?php }
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
    header('Location: sprint_list.php');
}