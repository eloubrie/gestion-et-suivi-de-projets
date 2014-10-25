<?php
include('bdd/bdd.php'); 

class Modele
{
	public function get_US()
	{
		return BDD::getConnection()->query('SELECT * FROM us');
	}
}