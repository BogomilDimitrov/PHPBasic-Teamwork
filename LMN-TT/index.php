<?php
include_once('config/db.php');
include_once('models/master.php');
$ob = new MasterModel();
echo("-----------------------------GetUser--------------------------------" . "<br />");
//echo($ob->checkUser(array("username" => "Atamas","password" => "4324")) . "<br />");

echo("-----------------------------GetTopic--------------------------------" . "<br />");

//$getTopicByID = $ob->getTopicByID(19);
//var_dump($getTopicByID);
echo("<br/>"."-------------------------GetTopicsFromCategory------------------------" . "<br />");

//$Categories = $ob->getCategoryByName("C#");
//var_dump($Categories);


echo("<br/>"."-------------------------ShowAllUser------------------------" . "<br />");

//$ShowAllUser = $ob->AllUsers();
//var_dump($ShowAllUser);

echo("<br/>"."------------------------------insertUser---------------------------------" . "<br />");

//$insertUser = $ob->insertUser(array("username" => "Ninjaa2", "password" => "ninja23", "email" => "email@mailto2.bg"));
//
//var_dump($insertUser);

echo("<br/>"."------------------------------AddComment------------------------------" . "<br />");

//$AddComment = $ob->addComment(array("comment" => "NInja bqla i to", "topic_id" => "2", "user_id" => "1"));
//
//var_dump($AddComment);

echo("<br/>"."------------------------------AddTopic------------------------------" . "<br />");

//$createCategory = $ob->createTopic(array("categoryId" => "3", "topicName" => "TestTemichkaZComentar", "comment" => "First Comment", "user_id" => "4"));