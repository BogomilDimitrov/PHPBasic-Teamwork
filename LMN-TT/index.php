<?php
include_once('config/db.php');
include_once('models/master.php');
$ob = new MasterModel();
//$ob->select('users');
$ob->find(array('table'=>'users'));
//$ob->add('users',array('username','password','email'),array('Ananasssss','123445','ss@ss.eu'));
$ob->checkUser('Shukri','1234');