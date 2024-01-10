<?php 
class Tags extends Controller{

    
    private $model;
    private $service;
    public function __construct(){
        $this->model = $this->model("Tag");
        $this->service = $this->service("TagService");
    }

public function tag(){
    $this->view('Admin/tag');


}

public function insert(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $data =[
            "id_tag" => uniqid(),
            "name" => $_POST["name"]
        ];

        $this->model->setId_tag($data["id_tag"]);
        $this->model->setName($data["name"]);
        $this->service->insert($this->model);
        $this->view('Admin/tag');

        

    }
}
}
?>