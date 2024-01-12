<?php
class Wikis extends Controller {
    private $wikiService;

    public function __construct() {
        $this->wikiService = $this->service("WikiService");
    }

    public function display() {

        $data = $this->wikiService->getAllWikis();

        $this->view('Author/wiki', $data);
    
    }


    public function addWiki()  {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newWiki = $this->model("Wiki");
            $newWiki->setId_wiki(uniqid(mt_rand(), true));
            $newWiki->setTitle($_POST['title']);
            $newWiki->setContent($_POST['content']);
            $newWiki->setId_category($_POST['id_category']);
            $newWiki->setId_user($_POST['id_user']); 
            $newWiki->setDate_create(date('Y-m-d H:i:s')); 
            $newWiki->setDate_modified(date('Y-m-d H:i:s')); 

            // Additional logic if needed

            // Add the wiki to the database
            $this->wikiService->addWiki($newWiki);

            // Redirect to the author's page or any other appropriate page
            header('Location: http://localhost/Wiki/Wikis/display');

        }

        

    }
    public function delete($id) {

        $data = $this->wikiService->delete($id);
        header("Location: http://localhost/Wiki/Wikis/display");
    
    }



    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
            $newWiki = $this->model("Wiki");
    
            $newWiki->setId_wiki($_POST['id']);
            $newWiki->setTitle($_POST['title']);
            $newWiki->setContent($_POST['content']);
            $newWiki->setId_user($_POST['id_user']);
            $newWiki->setId_category($_POST['id_category']);
            $this->wikiService->edit($newWiki);
            header("Location: http://localhost/Wiki/Wikis/display");
    
        }
    }


    public function get($id) {

        $wiki = $this->wikiService->fetch($id);
        $data = [
            'Wiki' => $wiki,
            'edit' => 1
        ];
        $this->view('Author/wiki', $data);
    
    }

}



?>