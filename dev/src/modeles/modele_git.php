<?php
class ModeleGit
{
    public function _getGitURL(){
        return BDD::getConnection()->query("SELECT lien FROM git");
    }
    
    public function _setGitURL($url){
        BDD::getConnection()->query("UPDATE git SET lien = ".$url);
    }
    
    // for later implementation
    public function _getMasterVersion($version){
        
    }
}