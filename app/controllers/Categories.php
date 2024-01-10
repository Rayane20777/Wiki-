<?php 
class Categories extends Controller {

    
   private $service;
    public function __construct(){
        $this->service = $this->service("CategoryService");
    }



public function insert(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $newCategory = $this->model("Category");

        $newCategory->setId_category(uniqid(mt_rand(), true));
        $newCategory->setName($_POST['name']);
        $this->service->insert($newCategory);
        header("Location: http://localhost/Wiki/Categories/display");

    }
}

public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $newCategory = $this->model("Category");

        $newCategory->setId_category($_POST['id']);
        $newCategory->setName($_POST['name']);
        $this->service->edit($newCategory);
        header("Location: http://localhost/Wiki/Categories/display");

    }
}

public function display() {

        $data = $this->service->getAllCategories();
        $this->view('Admin/category', $data);

    }

public function get($id) {

    $category = $this->service->fetch($id);
    $data = [
        'category' => $category,
        'edit' => 1
    ];
    $this->view('Admin/category', $data);

}


public function delete($id) {

    $data = $this->service->delete($id);
    header("Location: http://localhost/Wiki/Categories/display");

}

}
?>