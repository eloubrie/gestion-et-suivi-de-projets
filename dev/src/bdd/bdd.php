<?php
class BDD
{
	private $PDOInstance = null;
	private static $instance = null;

	const DEFAULT_SQL_USER = 'root';
	const DEFAULT_SQL_HOST = 'localhost';
	const DEFAULT_SQL_PASS = '';
	const DEFAULT_SQL_DTB = 'cdp';

	private function __construct()
	{
		$this->PDOInstance = new PDO('mysql:charset=utf8;dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
	}

	public static function getConnection()
	{  
		if(is_null(self::$instance))
		{
			self::$instance = new BDD();
		}
		
		return self::$instance;
	}

	public function query($query)
	{
		return $this->PDOInstance->query($query);
	}
}
?>