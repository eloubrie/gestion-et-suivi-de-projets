<?php

include("modeles/modele_git.php");

class fre{
    public function __construct()
    {
	$this->$modele = new ModeleGit();
    }
    
    public function toto($url){
        $this->modele->_setGitURL($url);
    }
}

$fre = new fre();
$fre->toto(/*$_POST['NewURL']*/"");

header("location: ../depot.php");

