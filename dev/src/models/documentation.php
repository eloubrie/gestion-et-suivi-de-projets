<?php
class ModelDocumentation
{   
	public function _getDocumentation($id)
	{
		return BDD::getConnection()->query('SELECT * FROM `documentation` WHERE ID = '.$id);
	}
	
	public function _editDocumentation($description, $operatingSystems, $navigators, $languages, $frameworks, $otherTools)
	{
		BDD::getConnection()->query("UPDATE documentation SET 
		`description`='".addslashes ($description)."',
		`systemes_exploitation`='".addslashes ($operatingSystems)."',
		`navigateurs`='".addslashes ($navigators)."',
		`langages`='".addslashes ($languages)."',
		`frameworks`='".addslashes ($frameworks)."',
		`autres_outils`='".addslashes ($otherTools)."'
		WHERE ID = 1"); //1 car un seul projet pour le moment
	}
}