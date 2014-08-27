<?php
//$id = $_POST['id'];
$id = 3;
include_once(BASE_PATH . '/config/db.php');
include_once(BASE_PATH . '/models/master.php');
include_once(BASE_PATH . '/controllers/Controller.php');
include_once(BASE_PATH . '/controllers/Topics.php');
$topics = new Topics();
$topics->getAllTopicsFromCat($id);