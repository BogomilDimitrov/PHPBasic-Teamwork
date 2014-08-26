<?php

class Topics extends Controller{
    public function getAllTopicsFromCat($cat_name){
        $model = $this->model();
        $topics = $model->getTopicsByCatName($cat_name);

        $this->view('show_topics', $topics, $model->getCatId($topics[0]));
    }
    //$id = $_POST['id'];

}