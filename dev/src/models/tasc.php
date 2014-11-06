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
		return BDD::getConnection()->query('SELECT * FROM taches WHERE us = '.$id);
	}
        
        public function _insertTasc($associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate)
        {
                BDD::getConnection()->query("INSERT INTO taches VALUES (0,'".
                mysql_real_escape_string ($associatedUS)."','".
		mysql_real_escape_string ($title)."','".
		mysql_real_escape_string ($tascDescription)."','".
		mysql_real_escape_string ($tascType)."','".
		mysql_real_escape_string ($cost)."','".
		mysql_real_escape_string ($otherTascsDependencies)."','".
		mysql_real_escape_string ($developer)."','".
		mysql_real_escape_string ($status)."','".
		mysql_real_escape_string ($realisationDate)."','".
		mysql_real_escape_string ($testDate)."')");
        }
        
        public function _modifTasc($ID, $associatedUS, $title, $tascDescription, $tascType, $cost, $otherTascsDependencies, $developer, $status, $realisationDate, $testDate)
        {
                BDD::getConnection()->query("UPDATE taches SET 
                `ID_US`='".mysql_real_escape_string ($associatedUS)."',
		`titre`='".mysql_real_escape_string ($title)."',
		`description`='".mysql_real_escape_string ($tascDescription)."',
		`type`='".mysql_real_escape_string ($tascType)."',
		`cout`='".mysql_real_escape_string ($cost)."',
		`dependances`='".mysql_real_escape_string ($otherTascsDependencies)."',
		`developpeur`='".mysql_real_escape_string ($developer)."',
		`statut`='".mysql_real_escape_string ($status)."',
		`date_realisation`='".mysql_real_escape_string ($realisationDate)."',
		`date_test`='".mysql_real_escape_string ($testDate)."' 
		WHERE ID = ".$ID);
        }
        
        public function _supprTasc($ID)
	{
		BDD::getConnection()->query("DELETE FROM taches WHERE ID=".$ID);
	}
}