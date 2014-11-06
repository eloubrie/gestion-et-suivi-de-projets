<?php
include("models/developer.php");

class ControllerDeveloper
{
	private $modelDeveloper;

	public function __construct()
	{
            $this->modelDeveloper = new ModelDeveloper();
	}
	
	public function _getDevelopers()
        {
            return $this->modelDeveloper->_getDevelopers();
        }
        
        public function _getDeveloper($id) {
            return $this->modelDeveloper->_getDeveloper($ID);
        }
}