<?php

include ('BDDResultBase.php');
include ('BDDTestSQLBase.php');

class BDDTestManager {
  
    public static function _simpleTestCase(){
        $bddTester = new BDDTestSQLBase();
        $array = new ArrayObject();
        $array->append($bddTester->insertRequest());
        $array->append($bddTester->selectRequest());
        $array->append($bddTester->updateRequest());
        $array->append($bddTester->removeRequest());
        $interpreter = new BDDResultBase();
        $interpreter->_setResult($array);
        $interpreter->_printResult();
    }
}

BDDTestManager::_simpleTestCase();
