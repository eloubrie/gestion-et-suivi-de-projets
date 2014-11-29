<?php
class ModelTasc
{
	public function _getAllTascs()
	{
		return BDD::getConnection()->query('SELECT * FROM taches');
	}
	
	public function _getTasc($id)
	{
		return BDD::getConnection()->query('SELECT * FROM taches WHERE ID = '.$id);
	}
	
	public function _getTascsFromUs($id)
	{
		return BDD::getConnection()->query('SELECT * FROM taches WHERE ID_US = '.$id);
	}
        
	public function _insertTasc($associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate)
	{
		BDD::getConnection()->query("INSERT INTO taches VALUES (0,'".
		addslashes ($associatedUS)."','".
		addslashes ($title)."','".
		addslashes ($tascDescription)."','".
		addslashes ($tascType)."','".
		addslashes ($cost)."','".
		addslashes ($otherTascsDependencies)."','".
		addslashes ($developer)."','".
		addslashes ($status)."','".
		addslashes ($realisationDate)."','".
		addslashes ($testDate)."')");
	}
        
	public function _modifTasc($ID, $associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate)
	{
		BDD::getConnection()->query("UPDATE taches SET 
		`titre`='".addslashes ($title)."',
		`description`='".addslashes ($tascDescription)."',
		`type`='".addslashes ($tascType)."',
		`cout`='".addslashes ($cost)."',
		`dependances`='".addslashes ($otherTascsDependencies)."',
		`developpeur`='".addslashes ($developer)."',
		`statut`='".addslashes ($status)."',
		`date_realisation`='".addslashes ($realisationDate)."',
		`date_test`='".addslashes ($testDate)."' 
		WHERE ID = ".$ID);
	
		BDD::getConnection()->query("UPDATE taches SET 
		`ID_US`='".addslashes ($associatedUS)."'
		WHERE ID = ".$ID);
	}
        
	public function _supprTasc($ID)
	{
		BDD::getConnection()->query("DELETE FROM taches WHERE ID=".$ID);
	}
        
	public function _updateDeveloperTasc($ID, $develop){
		return BDD::getConnection()->query("UPDATE taches SET `developpeur`=$develop WHERE ID=$ID");
	}
	
	public function _getSprintTasc($ID){
		return BDD::getConnection()->query("SELECT `numero_du_sprint` FROM `sprints` INNER JOIN `us` on `sprints`.`ID`=`us`.`ID_sprint` INNER JOIN `taches` on `us`.`ID`=`taches`.`ID_US` WHERE `taches`.`ID`=$ID");
	}
	
	public function _getSprintIDTasc($ID){
		return BDD::getConnection()->query("SELECT `sprints`.`ID` FROM `sprints` INNER JOIN `us` on `sprints`.`ID`=`us`.`ID_sprint` INNER JOIN `taches` on `us`.`ID`=`taches`.`ID_US` WHERE `taches`.`ID`=$ID");         
	}
}