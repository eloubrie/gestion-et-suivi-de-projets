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
include ("models/tasc.php");

class ModelGantt {
    //put your code here
    
    // Foreign keys in gantt table
    private $developer;
    private $sprint;
    private $tasc;
    
    public function __construct()
    {
        $this->sprint = new ModelSprint();
        $this->developer = new ModelDeveloper();
        $this->tasc = new ModelTasc();
    }
    
    public function _getSprintList(){
        return $this->sprint->_getSprintList();
    }
    
    public function _getDevelopers(){
        return $this->developer->_getDevelopers();
    }
    
    public function _getDays($sprintID){
        return $this->sprint->_getDays($sprintID);
    }
    
    public function _setCurrentDay($id, $day){
        return BDD::getConnection()->query("UPDATE gantt SET `Jour`='".mysql_real_escape_string ($day)."'WHERE ID = ".$id);
    }
    
    public function _insertGantt($devID, $day, $tascID, $sprintID){
        return BDD::getConnection()->query("INSERT INTO `gantt` VALUES (0,$devID,$day,$tascID,$sprintID)");
    }
    
    public function _deleteBySprint($sprintID){
        return BDD::getConnection()->query("DELETE FROM `gantt` WHERE ID_sprint = $sprintID");;
    }
}
