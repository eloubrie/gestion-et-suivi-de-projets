<?php

include('bdd.php');
include ('BDDTestSQL.php');

//Class to launch non-parametrics test
class BDDTestSQLBase implements BDDTestSQL{
    
    private $sqlSelect;
    private $sqlInsert;
    private $sqlRemove;
    private $sqlUpdate;
    
    function __construct() {
         $this->sqlSelect = "SELECT * FROM us";
         $this->sqlInsert = "INSERT INTO `cdp`.`us` (`ID`, `titre`, `description`, `projet`, `sprint`, `cout`, `dependances`, `statut`, `date_debut`, `date_fin`, `date_test`, `ID_test`, `description_test`, `ID_git`) VALUES ('42', 'ddqd', 'dsqdsq', '8', '7', '6', 'ddsqdsqdsqd', '2', '2014-10-01', '2014-10-16', '2014-10-07', '7', 'zqdzqdqz', '2')";
         $this->sqlRemove = "DELETE FROM `cdp`.`us` WHERE `us`.`ID` = 42";
         $this->sqlUpdate = "UPDATE `cdp`.`us` SET `titre` = 'ddqds' WHERE `us`.`ID` = 42";
         
    }
    public function insertRequest(){
        $array = BDD::getConnection()->query($this->sqlInsert);
        if($array != FALSE){
            return TRUE;
        }
        echo "Insert error<br />";
        return FALSE;
    }
    
    public function removeRequest(){
        $array = BDD::getConnection()->query($this->sqlRemove);
        if($array != FALSE){
            return TRUE;
        }
        echo "Remove error<br />";
        return FALSE;
    }
    
    public function selectRequest(){
       
        $array = BDD::getConnection()->query($this->sqlSelect);
        if($array != FALSE){
            return TRUE;
        }
        echo "Selection error<br />";
        return FALSE;
        
    }
    
    public function updateRequest(){
        $array = BDD::getConnection()->query($this->sqlUpdate);
        if($array != FALSE){
            return TRUE;
        }
        echo "Update error<br />";
        return FALSE;
    }
}
