<?php
//include ("models/sprint.php");

class ModelUs
{
        //private $sprintModel;
        
        public function __construct(){
            //$this->sprintModel = new ModelSprint();
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
        
	public function _insertUs($title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest)
	{
		BDD::getConnection()->query("INSERT INTO us VALUES (0,'".
		addslashes ($title)."','".
		addslashes ($description)."','".
		addslashes ($sprint)."','".
		addslashes ($cout)."','".
		addslashes ($statut)."','".
		addslashes ($datebegin)."','".
		addslashes ($dateend)."','0000-00-00','".
		addslashes ($codetest)."','".
		addslashes ($descriptiontest)."','NULL')");
	}
	
	public function _modifUs($ID, $title, $description, $sprint, $cout, $datebegin, $dateend, $statut, $descriptiontest, $codetest, $linkgit)
	{
		BDD::getConnection()->query("UPDATE us SET 
		`titre`='".addslashes ($title)."',
		`description`='".addslashes ($description)."',
		`cout`='".addslashes ($cout)."',
		`statut`='".addslashes ($statut)."',
		`date_debut`='".addslashes ($datebegin)."',
		`date_fin`='".addslashes ($dateend)."',
		`code_test`='".addslashes ($codetest)."',
		`description_test`='".addslashes ($descriptiontest)."',
		`lien_git`='".addslashes ($linkgit)."' 
		WHERE ID = ".$ID);
		
		BDD::getConnection()->query("UPDATE us SET 
		`ID_sprint`='".addslashes ($sprint)."'
		WHERE ID = ".$ID);
	}
	
	public function _supprUs($ID)
	{
		BDD::getConnection()->query("DELETE FROM us WHERE ID=".$ID);
	}
        
        public function _clearSprintCost($sprintID){
            return BDD::getConnection()->query("UPDATE `sprints` INNER JOIN `us` ON `sprints`.`ID`=`us`.`ID_sprint` SET `sprints`.`cout`=100,`sprints`.`cout_valide`=0 WHERE `us`.`ID_sprint`=$sprintID");
        }
        
        public function _getSprintNumberByID($sprintID){
            return BDD::getConnection()->query("SELECT `numero_du_sprint` FROM `sprints` INNER JOIN `us` on `sprints`.`ID`=`us`.`ID_sprint` WHERE `us`.`ID_sprint`=$sprintID");
        }
        
        public function _updateSprintTotalCost($sprintID, $cost){
            return BDD::getConnection()->query("UPDATE `sprints` INNER JOIN `us` ON `sprints`.`ID`=`us`.`ID_sprint` SET `sprints`.`cout`=$cost WHERE `us`.`ID_sprint`=$sprintID");
        }
        
        public function _updateSprintValidateCost($sprintID, $cost){
            return BDD::getConnection()->query("UPDATE `sprints` INNER JOIN `us` ON `sprints`.`ID`=`us`.`ID_sprint` SET `sprints`.`cout_valide`=$cost WHERE `us`.`ID_sprint`=$sprintID");
        }
        
        public function _getSprintList(){
            return BDD::getConnection()->query('SELECT * FROM `sprints`');
        }
}