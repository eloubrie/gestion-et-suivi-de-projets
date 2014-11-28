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
                `description`='".mysql_real_escape_string ($description)."',
		`systemes_exploitation`='".mysql_real_escape_string ($operatingSystems)."',
		`navigateurs`='".mysql_real_escape_string ($navigators)."',
		`langages`='".mysql_real_escape_string ($languages)."',
		`frameworks`='".mysql_real_escape_string ($frameworks)."',
                `autres_outils`='".mysql_real_escape_string ($otherTools)."'
		WHERE ID = 1"); //1 car un seul projet pour le moment
        }
}