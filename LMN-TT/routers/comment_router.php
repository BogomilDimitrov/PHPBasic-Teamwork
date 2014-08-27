<?php
//$id = $_POST['id'];
$id = 1;

include_once(BASE_PATH . '/config/db.php');
include_once(BASE_PATH . '/models/master.php');
include_once(BASE_PATH . '/controllers/Controller.php');
include_once(BASE_PATH . '/controllers/Comments.php');
include_once BASE_PATH . '/views/header.php';

$topics = new Comments();
$topics->getAllComments($id);
include_once BASE_PATH . '/views/footer.php';