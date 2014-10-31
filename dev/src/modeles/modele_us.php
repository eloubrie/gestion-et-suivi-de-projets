<?php
class ModeleUS
{
	public function get_backlog()
	{
		return BDD::getConnection()->query('SELECT * FROM us');
	}

	public function get_US($id)
	{
		return BDD::getConnection()->query('SELECT * FROM us WHERE ID = '.$id);
	}
}