<?php
class ModelDeveloper
{
	public function _getDevelopers()
	{
		return BDD::getConnection()->query('SELECT * FROM developpeurs');
	}
        
        public function _getDevelopersName(){
            return BDD::getConnection()->query("SELECT `pseudo` FROM `developpeurs`");
        }
        
	public function _getDeveloper($id) 
	{
		return BDD::getConnection()->query('SELECT * FROM developpeurs WHERE ID = '.$id);
	}
}
