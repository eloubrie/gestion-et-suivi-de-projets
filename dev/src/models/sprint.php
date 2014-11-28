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
                addslashes ($number)."','".
		addslashes ($cost)."','".
		addslashes (date("y-m-d"))."','".
		addslashes ($startDate)."','".
		addslashes ($duration)."','".
		addslashes ($endDate)."','".
		addslashes ($title)."','".
		addslashes ($description)."','".
		addslashes (0)."','NULL')");
        }
        
        public function _modifSprint($ID, $number, $cost, $creationDate, $startDate, $duration, $endDate, $title, $description, $validatedCost, $gitLink)
        {
                BDD::getConnection()->query("UPDATE sprints SET 
                `numero_du_sprint`='".addslashes ($number)."',
		`cout`='".addslashes ($cost)."',
		`date_creation`='".addslashes ($creationDate)."',
		`date_debut`='".addslashes ($startDate)."',
		`duree`='".addslashes ($duration)."',
		`date_fin`='".addslashes ($endDate)."',
		`titre`='".addslashes ($title)."',
		`description`='".addslashes ($description)."',
		`cout_valide`='".addslashes ($validatedCost)."',
                `lien_git`='".addslashes ($gitLink)."'
		WHERE ID = ".$ID);
        }
        
        public function _supprSprint($ID)
	{
		BDD::getConnection()->query("DELETE FROM sprints WHERE ID=".$ID);
	}
        
        public function _getSprintNumberByID($sprintID){
            return BDD::getConnection()->query("SELECT `numero_du_sprint` FROM `sprints` WHERE `ID`=$sprintID");
        }
        
        public function _clearSprintCost($sprintID){
            return BDD::getConnection()->query("UPDATE `sprints` SET `cout`=0,`cout_valide`=0 WHERE `ID`=$sprintID");
        }
        
        public function _updateSprintTotalCost($sprintID, $cost){
            return BDD::getConnection()->query("UPDATE `sprints` SET `cout`=$cost WHERE `ID`=$sprintID");
        }
        
        public function _updateSprintValidateCost($sprintID, $cost){
            return BDD::getConnection()->query("UPDATE `sprints` SET `cout_valide`=$cost WHERE `ID`=$sprintID");            
        }
}