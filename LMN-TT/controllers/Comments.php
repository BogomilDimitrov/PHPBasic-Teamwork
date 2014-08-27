<?php

class Comments extends Controller{
    public function getAllComments($topicID){
        $model = $this->model();
        $comments = $model->getTopicByID($topicID);
        var_dump($comments);

        $this->view('show_comments', $comments, $topicID);
    }
}