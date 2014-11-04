<?php
class ModelSprint
{
	public function _getSprintList()
	{
		return BDD::getConnection()->query('SELECT * FROM sprints');
	}
}