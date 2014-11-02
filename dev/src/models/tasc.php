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
}