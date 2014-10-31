<?php
class ModeleTaches
{
	public function get_taches()
	{
		return BDD::getConnection()->query('SELECT * FROM taches');
	}
	
	public function get_tache($id)
	{
		return BDD::getConnection()->query('SELECT * FROM taches WHERE ID = '.$id);
	}
	
	public function get_taches_US($id)
	{
		return BDD::getConnection()->query('SELECT * FROM taches WHERE us = '.$id);
	}
}