<?php
include_once('lib/database.php');

class MasterModel
{
    public function checkUser($args = array())
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $username = $args['username'];
        $password = $args['password'];


        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_INT);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result != 0) {
            $UserArray = $stmt->fetch();
            return $UserArray['user_id'];
        } else {
            return false;
        }
    }

    public function getUserById($user_id){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql = "SELECT username FROM users
               WHERE user_id = :user_id";
        $stm = $db->prepare($sql);
        $stm->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stm->execute();
        $out= $stm->fetch(PDO::FETCH_ASSOC);

        return $out['username'];
    }

    public function getTopicByID($topicID)
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql = "SELECT * FROM topic
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
        foreach ($TopicArray1 as $ta) {
            array_push($commentsArray, $ta['comment'] = $ta['comment_date']);
        }
        $array = array(
            "commentID" => $TopicArray1[0][0],
            "comments" => $commentsArray,

            "user_id" => $TopicArray[0][4]
        );
        return $array;
    }

    public function getCategoriesFromMain($main_id)
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql = "SELECT * FROM category WHERE main_category_id=$main_id";
        $stm = $db->query($sql);
        $category = $stm->fetchAll();
        $result = array();

        foreach ($category as $ct) {
            $categoryId = $ct[0];
            $sql = "SELECT * FROM topic WHERE category_id = $categoryId";
            $rs = $db->query($sql);
            $topics = $rs->fetchAll();
            $count = $rs->rowCount();

            foreach ($topics as $top) {
                $topicID = $top['topic_id'];

                $sql2 = "SELECT * FROM comments WHERE topic_id = $topicID";
                $rrs = $db->query($sql2);
                $com_count = $count*$rrs->rowCount();
                $sqlID = "SELECT MAX(comment_date) FROM comments WHERE topic_id = " . $topicID;
                $rsID = $db->query($sqlID);
                $id = $rsID->fetch();
                $result[$ct[1]] = array(
                    "main_category_id" => (int)$ct[3],
                    "user_id" => $this->getUserById((int)$ct[2]),
                    "category_id" => (int)$ct[0],
                    "topic_count" => $count,
                    "comment_count" => $com_count,
                    "last_comment_date" => $id[0]
                );
                break;
            }

        }
        return $result;
    }

    public function catInfoById($cat_id)
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql = "SELECT * FROM category
               WHERE category_id = :categoryID";
        $stm = $db->prepare($sql);
        $stm->bindParam(':categoryID', $cat_id, PDO::PARAM_INT);
        $stm->execute();
        $categoryArray = $stm->fetch(PDO::FETCH_ASSOC);
        $output = $categoryArray;

        return $output;
    }

    public function getCommentsCount($topic_id)
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql = "SELECT * FROM comments WHERE topic_id = ".$topic_id;
        $rrs = $db->query($sql);
        $com_count = $rrs->rowCount();

        $sqlID = "SELECT MAX(comment_date) FROM comments WHERE topic_id =". $topic_id;
        $rsID = $db->query($sqlID);
        $id = $rsID->fetch();

        $sqlName = "SELECT user_id FROM comments WHERE comment_date=:date";
        $rsName = $db->prepare($sqlName);
        $rsName->bindParam(':date', $id[0], PDO::PARAM_STR);
        $rsName->execute();
        $name = $rsName->fetch();

        $sqlSubstr = "SELECT SUBSTRING(comment,1,50) FROM comments WHERE topic_id =:topic_id";
        $rsSubstr = $db->prepare($sqlSubstr);
        $rsSubstr->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
        $rsSubstr->execute();
        $substr = $rsSubstr->fetch();


        $result = array(
            "comment_count" => $com_count,
            "last_comment_date" => $id[0],
            "last_comment_name" => $this->getUserById($name[0]),
            'substr' => $substr[0] . "..."
        );

        return $result;
    }

    public function getTopicsByCatId($cat_id)
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $query = "SELECT * FROM topic
               WHERE category_id = :categoryId";
        $stm2 = $db->prepare($query);
        $stm2->bindParam(':categoryId', $cat_id, PDO::PARAM_INT);
        $stm2->execute();
        $TopicArray = $stm2->fetchAll();

        $result = array();
        foreach ($TopicArray as $tp){
            $comments = $this->getCommentsCount($tp[0]);
            array_push($result,
                array('name'=>$tp[1],
                      'id' => (int)$tp[0],
                      'date' => $tp[2],
                      'comment_count' => $comments['comment_count'],
                      'last_update' => $comments['last_comment_date'],
                      'last_comment_name' => $comments['last_comment_name'],
                      'substr' => $comments['substr']));
        }

        return $result;
    }

    public function AllUsers()
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $sql = "SELECT * FROM users";
        $stm = $db->query($sql);
        $usersArray = $stm->fetchAll();
        return ($usersArray);
    }

    public function addComment($args = array())
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $comment = $args['comment'];
        $userId = $args['user_id'];
        $topicId = $args['topic_id'];
        $table = "comments";
        $query = "INSERT INTO " . $table . "(comment, topic_id,user_id)" . "VALUE('" . $comment . "','" . $topicId . "','" . $userId . "')";
        $result = $db->exec($query);

        if ($result != false) {
            return true;
        } else {
            return false;
        }
    }

    public function insertUser($args = array())
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $username = $args['username'];
        $password = $args['password'];
        $email = $args['email'];
        $table = 'users';

        $query = "INSERT INTO " . $table . "(username, password, email)" . "VALUE('" . $username . "',(PASSWORD('" . $password . "')),'" . $email . "')";

        if ($db->exec($query) != false) {
            return true;
        } else {
            return false;
        }
    }

    public function createTopic($args = array())
    {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $categoryId = $args['categoryId'];
        $topicName = $args['topicName'];
        $comment = $args['comment'];
        $userId = $args['user_id'];

        $query = "INSERT INTO topic" . "(name, category_id, user_id)" . "VALUE('" . $topicName . "','" . $categoryId . "','" . $userId . "')";
        $db->exec($query);

        $selectQuery = "SELECT * FROM topic WHERE name = :topicName";
        $stmt = $db->prepare($selectQuery);
        $stmt->bindParam(':topicName', $topicName, PDO::PARAM_INT);
        $stmt->execute();
        $temp = $stmt->fetch();
        $GetTopicId = $temp['topic_id'];

        $commetInsertQuery = $query = "INSERT INTO " . "comments" . "(comment, topic_id,user_id)" . "VALUE('" . $comment . "','" . $GetTopicId . "','" . $userId . "')";
        $db->exec($commetInsertQuery);

    }

}