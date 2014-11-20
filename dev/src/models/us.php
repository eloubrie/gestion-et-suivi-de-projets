<?php
include ("models/sprint.php");

class ModelUs
{
        private $sprintModel;
        
        public function __construct(){
            $this->sprintModel = new ModelSprint();
        }

        public function _getBacklog()
	{
		return BDD::getConnection()->query('SELECT * FROM us');
	}

	public function _getUs($id)
	{
		return BDD::getConnection()->query('SELECT * FROM us WHERE ID = '.$id);
	}
	
        public function _getUsFromSprint($id)
	{
		return BDD::getConnection()->query('SELECT * FROM us WHERE ID_Sprint = '.$id);
	}
        
	public function _insertUs($title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest, $linkgit)
	{
		BDD::getConnection()->query("INSERT INTO us VALUES (0,'".
		mysql_real_escape_string ($title)."','".
		mysql_real_escape_string ($description)."','".
		mysql_real_escape_string ($sprint)."','".
		mysql_real_escape_string ($cout)."','".
		mysql_real_escape_string ($statut)."','".
		mysql_real_escape_string ($datebegin)."','".
		mysql_real_escape_string ($dateend)."','0000-00-00','".
		mysql_real_escape_string ($codetest)."','".
		mysql_real_escape_string ($descriptiontest)."','".
		mysql_real_escape_string ($linkgit)."')");
	}
	
	public function _modifUs($ID, $title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest, $linkgit)
	{
		BDD::getConnection()->query("UPDATE us SET 
		`titre`='".mysql_real_escape_string ($title)."',
		`description`='".mysql_real_escape_string ($description)."',
		`ID_sprint`='".mysql_real_escape_string ($sprint)."',
		`cout`='".mysql_real_escape_string ($cout)."',
		`statut`='".mysql_real_escape_string ($statut)."',
		`date_debut`='".mysql_real_escape_string ($datebegin)."',
		`date_fin`='".mysql_real_escape_string ($dateend)."',
		`code_test`='".mysql_real_escape_string ($codetest)."',
		`description_test`='".mysql_real_escape_string ($descriptiontest)."',
		`lien_git`='".mysql_real_escape_string ($linkgit)."' 
		WHERE ID = ".$ID);
	}
	
	public function _supprUs($ID)
	{
		BDD::getConnection()->query("DELETE FROM us WHERE ID=".$ID);
	}
        
        public function _clearSprintCost($sprintID){
            
        }
}