<?php 
class Categories extends Controller{

    
    private $model;
    private $service;
    public function __construct(){
        $this->model = $this->model("Category");
        $this->service = $this->service("CategoryService");
    }

public function category(){
    $this->view('Admin/category');


}

public function insert(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $data =[
            "id_category" => uniqid(),
            "name" => $_POST["name"]
        ];

        $this->model->setId_category($data["id_category"]);
        $this->model->setName($data["name"]);
        $this->service->insert($this->model);
        $this->view('Admin/category');

        

    }
}
}
?>