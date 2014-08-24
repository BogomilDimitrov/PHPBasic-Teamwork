<?php
include_once('config/db.php');
include_once('models/master.php');
$ob = new MasterModel();
//$ob->select('users');
echo('---------------------------SELECT------------------------------------------' . '<br />');
$ob->find(array('table'=>'users'));
echo('-------------------------END OF SELECT-------------------------------------' . '<br />');
//$ob->add('users',array('username','password','email'),array('Ananasssss','123445','ss@ss.eu'));
echo('---------------------------CHECK USER--------------------------------------' . '<br />');

$ob->checkUser('Atamas','1234');