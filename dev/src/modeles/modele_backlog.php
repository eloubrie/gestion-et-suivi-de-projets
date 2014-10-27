<?php
include('bdd/bdd.php'); 

class Modele
{
	public function get_backlog()
	{
		return BDD::getConnection()->query('SELECT * FROM us');
	}
}