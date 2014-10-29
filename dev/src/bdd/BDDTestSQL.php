<?php

//Interface to set up the different commands on SQL
interface BDDTestSQL {
    public function insertRequest();
    public function removeRequest();
    public function selectRequest();
    public function updateRequest();
}
