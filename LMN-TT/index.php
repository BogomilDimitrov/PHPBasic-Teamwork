<?php
include_once('config/db.php');
include_once('models/master.php');
$ob = new MasterModel();
echo("-----------------------------GetUser--------------------------------" . "<br />");
echo($ob->getUsers(array("username" => "Atamas","password" => "4324")) . "<br />");

echo("-----------------------------GetTopic--------------------------------" . "<br />");

$getTopicByID = $ob->getTopicByID(1);
var_dump($getTopicByID);
echo("<br/>"."-------------------------GetTopicsFromCategory------------------------" . "<br />");

$Categories = $ob->getCategoryByName("C#");
var_dump($Categories);


echo("<br/>"."-------------------------GetAllCommentsByTopicID------------------------" . "<br />");

$comments = $ob->AllUsers();
var_dump($comments);