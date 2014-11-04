<?php
class ModelUs
{
	public function _getBacklog()
	{
		return BDD::getConnection()->query('SELECT * FROM us');
	}

	public function _getUs($id)
	{
		return BDD::getConnection()->query('SELECT * FROM us WHERE ID = '.$id);
	}
	
	public function _insertUs($title, $description, $sprint, $cout, $dependances, $datebegin, $dateend, $statut, $descriptiontest, $codetest, $linkgit)
	{
		BDD::getConnection()->query("INSERT INTO us VALUES (0,'".
		mysql_real_escape_string ($title)."','".
		mysql_real_escape_string ($description)."',0,'".
		mysql_real_escape_string ($sprint)."','".
		mysql_real_escape_string ($cout)."','".
		mysql_real_escape_string ($dependances)."','".
		mysql_real_escape_string ($statut)."','".
		mysql_real_escape_string ($datebegin)."','".
		mysql_real_escape_string ($dateend)."','0000-00-00','".
		mysql_real_escape_string ($codetest)."','".
		mysql_real_escape_string ($descriptiontest)."','".
		mysql_real_escape_string ($linkgit)."')");
	}
}