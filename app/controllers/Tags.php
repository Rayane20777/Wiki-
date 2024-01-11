<?php 
class Tags extends Controller{

    
    private $service;
    public function __construct(){
        $this->service = $this->service("TagService");
    }



public function insert(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $newTag = $this->model("Tag");

        $newTag->setId_tag(uniqid(mt_rand(), true));
        $newTag->setName($_POST['name']);
        $this->service->insert($newTag);
        header("Location: http://localhost/Wiki/Tags/display");

        

    }

    
}

public function display() {

    $data = $this->service->getAllTags();
    $this->view('Admin/tag', $data);

}

public function delete($id) {

    $data = $this->service->delete($id);
    header("Location: http://localhost/Wiki/Tags/display");

}


public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $newTag = $this->model("Tag");

        $newTag->setId_tag($_POST['id']);
        $newTag->setName($_POST['name']);
        $this->service->edit($newTag);
        header("Location: http://localhost/Wiki/Tags/display");

    }
}

public function get($id) {

    $tag = $this->service->fetch($id);
    $data = [
        'tag' => $tag,
        'edit' => 1
    ];
    $this->view('Admin/tag', $data);

}
}
?>