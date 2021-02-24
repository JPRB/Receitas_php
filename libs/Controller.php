<?php

class Controller{


    public function model($model)
    {
        require_once './models/'.$model.'.php';
        return new $model();
    }

    public function view ($view, $data=[], $title="Receitas", $layout="layout")
    {
        $data;
        $template = "./views/$view.php";

        require_once "./views/Shared/$layout.php";
    }

}

?>