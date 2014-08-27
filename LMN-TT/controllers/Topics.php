<?php

class Topics extends Controller{
    public function getAllTopicsFromCat($cat_id){
        $model = $this->model();
        $cat_info = $model->catInfoById($cat_id);
        $topics = $model->getTopicsByCatId($cat_info['category_id']);

        $this->view('show_topics',
            array('topics' => $topics,
                  'cat_name' => $cat_info['category_name'],
                  'username' => $model->getUserById($cat_info['user_id'])));
    }
}