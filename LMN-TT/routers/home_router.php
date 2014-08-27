<?php
include_once(BASE_PATH . '/config/db.php');
include_once(BASE_PATH . '/models/master.php');
include_once(BASE_PATH . '/controllers/Controller.php');
include_once(BASE_PATH . '/controllers/Home.php');
$topics = new Home();
$topics->getMainPage();