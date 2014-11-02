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
}