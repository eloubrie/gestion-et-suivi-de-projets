<?php
include("bdd/bdd.php");
include("structure/top_page.php");
?>

<form method="post" id="formModifGitURL" name="formModifGitURL" action='c_modifyGit.php'>
     <fieldset>
        <legend>Modification du dépôt Git</legend>
        <label for='NewURL'>URL du dépôt</label>
        <input type='text' id='NewURL' name='NewURL'/>
        <br />
        <input type="submit" id="in" value="Valider"/>
     </fieldset>
 </form>


<?php include("structure/bottom_page.php"); ?>					
