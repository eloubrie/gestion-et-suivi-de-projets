<?php
include("structure/haut_design.php");
?>

<form method="post"  id="formModifGitURL" name="formModifGitURL" action='controleurs/modifierGit.php'/>
     <fieldset>
        <legend>Modification du dépôt Git</legend>
        <label for='NewURL'>URL du dépôt</label>
        <input type='text' id='NewURL' name='NewURL' value="<?php echo $_GET['URL']?>"/>
        <br />
        <input type="submit" id="in" value="Valider"/>
     </fieldset>
 </form>


<?php include("structure/bas_design.php"); ?>					
