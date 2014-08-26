<?php
include_once('lib/database.php');
class MasterModel
{
    public function checkUser($args = array()) {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $username = $args['username'];
        $password = $args['password'];

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

        $commentsArray = array();
        foreach($TopicArray1 as $ta){
            array_push($commentsArray, $ta['comment'] = $ta['comment_date']);
        }
            $array = array(
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

    public function addComment($args = array()){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $comment = $args['comment'];
        $userId = $args['user_id'];
        $topicId = $args['topic_id'];
        $table = "comments";
        $query = "INSERT INTO " . $table . "(comment, topic_id,user_id)" . "VALUE('".$comment ."','".$topicId ."','".$userId ."')";
        $result = $db->exec($query);

        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function insertUser($args = array()){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $username = $args['username'];
        $password = $args['password'];
        $email = $args['email'];
        $table = 'users';

        $query = "INSERT INTO " . $table . "(username, password, email)" . "VALUE('".$username ."',(PASSWORD('".$password ."')),'".$email ."')";

        if($db->exec($query) != false){
            return true;
        }else{
             return false;
         }
    }

    public function createTopic ($args = array()){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $categoryId = $args['categoryId'];
        $topicName = $args['topicName'];
        $comment = $args['comment'];
        $userId = $args['user_id'];

        $query = "INSERT INTO topic" . "(name, category_id, user_id)" . "VALUE('".$topicName ."','".$categoryId ."','".$userId ."')";
        $db->exec($query);

        $selectQuery = "SELECT * FROM topic WHERE name = :topicName";
        $stmt = $db->prepare($selectQuery);
        $stmt->bindParam(':topicName', $topicName, PDO::PARAM_INT);
        $stmt->execute();
        $temp = $stmt->fetch();
        $GetTopicId = $temp['topic_id'];

        $commetInsertQuery =         $query = "INSERT INTO " . "comments" . "(comment, topic_id,user_id)" . "VALUE('".$comment ."','".$GetTopicId ."','".$userId ."')";
        $db->exec($commetInsertQuery);
    }

    public function displayMainCategory(){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql= "SELECT * FROM category";
        $stm = $db->query($sql);
        $category = $stm->fetchAll();
        $result = array();

        foreach($category as $ct){
            $categoryId = $ct[0];
            $sql = "SELECT * FROM topic WHERE category_id = $categoryId";
            $rs = $db->query($sql);
            $topics = $rs->fetchAll();
            $count = $rs->rowCount();

            foreach($topics as $top){
                $topicID = $top['topic_id'];

                $sqll = "SELECT * FROM comments WHERE topic_id = $topicID";
                $rrs = $db->query($sqll);
                $countt = $rrs->rowCount();
                $sqlID = "SELECT MAX(comment_date) FROM comments WHERE topic_id = " . $topicID;
                $rsID = $db->query($sqlID);
                $id = $rsID->fetch();
                $result[$ct[1]] = array(
                    "category_id" => $ct[0],
                    "topic_count" => $count,
                    "comment_count" => $countt,
                    "last_comment_date" => $id[0]
                );
                break;
            }

        }
        return $result;

    }


}