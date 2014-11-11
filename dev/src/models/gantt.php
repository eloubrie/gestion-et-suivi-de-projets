<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gantt
 *
 * @author dechu
 */

include ("models/sprint.php");
include ("models/developer.php");

class ModelGantt {
    //put your code here
    
    private $developer;
    private $sprint;
    
    public function __construct()
    {
        $this->sprint = new ModelSprint();
        $this->developer = new ModelDeveloper();
    }
    
    public function _getDevelopersName(){
        return $this->developer->_getDevelopersName();
    }
    
    public function _getDays($sprintID){
        return $this->sprint->_getDays($sprintID);
    }
    
    public function _setCurrentDay($id, $day){
        return BDD::getConnection()->query("UPDATE gantt SET `Jour`='".mysql_real_escape_string ($day)."'WHERE ID = ".$id);
    }
}
