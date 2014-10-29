<?php

include ('BDDResultPrinting.php');

//Just interpret tests to send OK or KO
class BDDResultBase implements BDDResultPrinting {

    private $resList;

    public function __construct() {
        $this->resList = new ArrayObject();
    }

    public function _setResult($resList) {
        $this->resList = $resList;
    }

    public function _printResult() {
        foreach ($this->resList as $result) {
            if ($result != TRUE) {
                die("DataBase problem : Tests KO<br />");
            }
        }
    }

}
