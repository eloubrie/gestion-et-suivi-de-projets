<?php
include("models/sprint.php");

class ControllerSprint
{
	private $modelSprint;

	public function __construct()
	{
		$this->modelSprint = new ModelSprint();
	}
	
	public function _getSprintList()
	{
		return $this->modelSprint->_getSprintList();
	}
}