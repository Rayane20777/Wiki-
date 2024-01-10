<?php 
class Category extends Controller{
    private $serviceCategory;
    public function __construct(){
        $this->serviceCategory = $this->service("CategoryService");
    }

public function category(){
    $this->view('Admin/category');


}

public function addCategory(){
    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        $data =[
            "id_category" => uniqid(),
            "name" => $_POST["name"]
        ];
        $newCategory = new Category();
        $newCategory->id_category = $data['id_category'];
        $newCategory->name = $data['name'];

        $this->serviceCategory->addCategory($newCategory);


    }
}
}
?>