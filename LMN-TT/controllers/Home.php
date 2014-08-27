<?php

class Home extends Controller{
    function getMainPage(){
        $model = new MasterModel();
        $oop = $model->getCategoriesFromMain(1);
        $func = $model->getCategoriesFromMain(2);
        $strange = $model->getCategoriesFromMain(3);
        $system = $model->getCategoriesFromMain(4);

        $this->view('home', array('oop' => $oop, 'func'=>$func, 'strange'=>$strange, 'system'=>$system));

    }
}