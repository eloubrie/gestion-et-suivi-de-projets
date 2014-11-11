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
}