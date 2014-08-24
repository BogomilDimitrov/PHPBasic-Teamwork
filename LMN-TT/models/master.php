<?php
include_once('lib/database.php');
class MasterModel
{
    public function getUsers($args = array()) {

        $username = $args['username'];
        $password = $args['password'];
        $dbConnect = new Database();
        $db = $dbConnect->get_db();
        $sql= "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_INT);
        $stmt->bindParam(':password', $password, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->rowCount();
        if($result != 0){
            $UserArray = $stmt->fetch();
            return $UserArray['user_id'];
        }else{
            return false;
        }
    }

    public function getTopicByID($topicID){

        $dbConnect = new Database();
        $db = $dbConnect->get_db();
        $sql= "SELECT * FROM topic
               WHERE topic_id = :topicId";
        $sql1 = "SELECT * FROM comments
               WHERE topic_id = :topicId";
        $stm1 = $db->prepare($sql1);
        $stm1->bindParam(':topicId', $topicID, PDO::PARAM_INT);
        $stm1->execute();
        $TopicArray1 = $stm1->fetchAll();

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':topicId', $topicID, PDO::PARAM_INT);
        $stmt->execute();
        $TopicArray = $stmt->fetchAll();
        //var_dump($TopicArray1);

        $commentsArray = array();
        foreach($TopicArray1 as $ta){
            array_push($commentsArray, $ta['comment']);
        }
            $array = array(
                "topicId" => $TopicArray[0][0],
                "topicName" => $TopicArray[0][1],
                "topicDate" => $TopicArray[0][2],
                "commentID" => $TopicArray1[0][0],
                "comments" => $commentsArray,
                "user_id" => $TopicArray[0][4]
            );
        return $array;

    }


    public function getCategoryByName($categoryName){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();
        $sql= "SELECT * FROM category
               WHERE category_name = :categoryName";
        $stm = $db->prepare($sql);
        $stm ->bindParam(':categoryName', $categoryName, PDO::PARAM_INT);
        $stm ->execute();
        $categoryArray = $stm->fetch();

        $categoryId = $categoryArray[0];
        $query= "SELECT * FROM topic
               WHERE category_id = :categoryId";
        $stm2 = $db->prepare($query);
        $stm2 ->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stm2 ->execute();
        $TopicArray = $stm2->fetchAll();
        $result = array();
        foreach($TopicArray as $tp)
        array_push($result,$tp[1]);

        return $result;
    }

    public function AllUsers(){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();
        $sql= "SELECT * FROM users";
        $stm = $db->query($sql);
        $usersArray = $stm->fetchAll();
            return($usersArray);
    }



}