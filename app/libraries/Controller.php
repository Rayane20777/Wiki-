<?php 

// load model amd views
 class Controller{
    public function service($service){
        require '../app/services/' . $service . '.php';
        return new $service();
    }

    public function model($model){
        require '../app/models/'. $model. '.php';
        return new $model();
    }

    public function view($view, $data = []){
        if(file_exists('../app/views/'. $view . '.php')){
            require '../app/views/'. $view .'.php';
        } else{
            die('View does not exist');
        }
    }
 }

?>
