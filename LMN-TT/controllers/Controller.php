<?php
include_once( BASE_PATH. '/models/master.php');

class Controller
{
    public function model(){
        return $model = new MasterModel();
    }

    public function view($view, $data = []){
        require_once BASE_PATH .'/views/' . $view . '.php';
    }
}