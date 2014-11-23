<?php
class ModelSprint
{
	public function _getSprintList()
	{
		return BDD::getConnection()->query('SELECT * FROM sprints');
	}
        
        public function _getSprint($id)
	{
		return BDD::getConnection()->query('SELECT * FROM sprints WHERE ID = '.$id);
	}
        
        public function _getDays($sprintID){
            return BDD::getConnection()->query("SELECT `duree` FROM `sprints` WHERE ID = ".'"'.$sprintID.'"');
        }
        
        public function _insertSprint($number, $cost, $startDate, $duration, $endDate, $title, $description)
        {
                date_default_timezone_set('America/New_York');
                BDD::getConnection()->query("INSERT INTO sprints VALUES (0,'".
                mysql_real_escape_string ($number)."','".
		mysql_real_escape_string ($cost)."','".
		mysql_real_escape_string (date("y-m-d"))."','".
		mysql_real_escape_string ($startDate)."','".
		mysql_real_escape_string ($duration)."','".
		mysql_real_escape_string ($endDate)."','".
		mysql_real_escape_string ($title)."','".
		mysql_real_escape_string ($description)."','".
		mysql_real_escape_string (0)."','NULL')");
        }
        
        public function _modifSprint($ID, $number, $cost, $creationDate, $startDate, $duration, $endDate, $title, $description, $validatedCost, $gitLink)
        {
                BDD::getConnection()->query("UPDATE sprints SET 
                `numero_du_sprint`='".mysql_real_escape_string ($number)."',
		`cout`='".mysql_real_escape_string ($cost)."',
		`date_creation`='".mysql_real_escape_string ($creationDate)."',
		`date_debut`='".mysql_real_escape_string ($startDate)."',
		`duree`='".mysql_real_escape_string ($duration)."',
		`date_fin`='".mysql_real_escape_string ($endDate)."',
		`titre`='".mysql_real_escape_string ($title)."',
		`description`='".mysql_real_escape_string ($description)."',
		`cout_valide`='".mysql_real_escape_string ($validatedCost)."',
                `lien_git`='".mysql_real_escape_string ($gitLink)."'
		WHERE ID = ".$ID);
        }
        
        public function _supprSprint($ID)
	{
		BDD::getConnection()->query("DELETE FROM sprints WHERE ID=".$ID);
	}
}