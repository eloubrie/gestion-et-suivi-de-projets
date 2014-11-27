<?php
include("models/git.php");

class ControllerGit
{
	private $modelGit;

	public function __construct()
	{
            $this->modelGit = new ModelGit();
	}
        
	public function _printGitLink(){
		$req = $this->modelGit->_getGitURL();
		$data = $req->fetch();
		return $data['lien'];
	} 
	
	public function _modifyGitLink($url){
		$this->modelGit->_setGitURL($url);
	}
}

