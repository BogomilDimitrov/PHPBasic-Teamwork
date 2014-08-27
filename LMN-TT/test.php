<?php
define('BASE_PATH', dirname(realpath(__FILE__)));
include_once('config/db.php');
include_once('models/master.php');
include_once('controllers/Controller.php');
include_once('controllers/Topics.php');
$ob = new MasterModel();
//include_once BASE_PATH . '/views/header.php';
//
//$topics = new Topics();
//$topics->getAllTopicsFromCat('C#');
//include_once BASE_PATH . '/views/footer.php';

//echo("-----------------------------GetUser--------------------------------" . "<br />");
//$pass =  '1234';
//$pass = md5($pass);
//var_dump($pass);
//echo($ob->checkUser(array("username" => "kiwi","password" => md5('troy'))) . "<br />");
//
//echo("-----------------------------GetTopic--------------------------------" . "<br />");
var_dump($ob->getCategoriesFromMain(1));
//$getTopicFromID = $ob->catInfoById(1);
//$getbyId = $ob->getTopicByID(1);
//echo var_dump($getTopicFromID)."<br />";
//var_dump($getbyId);
//echo("<br/>"."-------------------------GetTopicsFromCategory------------------------" . "<br />");
//
//$Categories = $ob->getCategoryByName("C#");
//var_dump($Categories);
//
//
//echo("<br/>"."-------------------------ShowAllUser------------------------" . "<br />");
//
//$ShowAllUser = $ob->AllUsers();
//var_dump($ShowAllUser);

//echo("<br/>"."------------------------------insertUser---------------------------------" . "<br />");

//$insertUser = $ob->insertUser(array("username" => "Ninjaa2", "password" => "ninja23", "email" => "email@mailto2.bg"));
//
//var_dump($insertUser);

//echo("<br/>"."------------------------------AddComment------------------------------" . "<br />");

//$AddComment = $ob->addComment(array("comment" => "NInja bqla i to", "topic_id" => "2", "user_id" => "1"));
//
//var_dump($AddComment);

//echo("<br/>"."------------------------------AddTopic------------------------------" . "<br />");

//$createCategory = $ob->createTopic(array("categoryId" => "3", "topicName" => "TestTemichkaZComentar", "comment" => "First Comment", "user_id" => "4"));