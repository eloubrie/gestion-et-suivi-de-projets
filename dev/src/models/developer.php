<?php

class ModelDeveloper
{
	public function _getDevelopers()
	{
		return BDD::getConnection()->query('SELECT * FROM developpeurs');
	}
        
        public function _insertDeveloper($pseudo, $password, $email)
        {
                BDD::getConnection()->query("INSERT INTO `developpeurs` VALUES (0,'".
                addslashes ($pseudo)."','".
		addslashes ($password)."','".
		addslashes (0)."','".
		addslashes ($email)."')");
        }
        
        public function _getDevelopersName(){
            return BDD::getConnection()->query("SELECT `pseudo` FROM `developpeurs`");
        }
        
	public function _getDeveloper($id) 
	{
		return BDD::getConnection()->query('SELECT * FROM developpeurs WHERE ID = '.$id);
	}
        
        public function _getDeveloperByPseudoAndPassword($pseudo, $password) 
	{
		return BDD::getConnection()->query("SELECT * FROM `developpeurs` WHERE pseudo = ".'"'.$pseudo.'" AND pass ="'.$password.'"');
	}
        
        public function _countDeveloperWithPseudo($pseudo) 
	{
		return BDD::getConnection()->query("SELECT count(*) FROM `developpeurs` WHERE pseudo = ".'"'.$pseudo.'"');
	}
}
