<?php

// Result can be printed with multiple ways (OK, graphs, etc)
interface BDDResultPrinting {
    public function _setResult($resList);
    public function _printResult();
}
