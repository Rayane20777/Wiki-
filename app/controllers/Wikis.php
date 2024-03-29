<?php
session_start();



class Wikis extends Controller {
    private $wikiService;
    private $categoryService;
    private $tagService;

    private $tagOfWikiService;

    public function __construct() {
        $this->wikiService = $this->service("WikiService");
        $this->categoryService = $this->service("CategoryService");
        $this->tagOfWikiService = $this->service("TagsOfWikiService");
        $this->tagService = $this->service("TagService");
    }

    public function display() {

        $data = [
            'categories' => $this->categoryService->getAllCategories(),
            'tags' => $this->tagService->getAllTags()
        ];

        if($_SESSION == 'author'){
            $data = [
                'wikis' => $this->wikiService->getWikiByUser($_SESSION['id_user'])
            ];
        } else {
            $data = [
                'wikis' => $this->wikiService->getAllWikis()
            ];
        }

        $this->view('Author/wiki', $data);
    
    }


    public function addWiki()  {


        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            


            $newWiki = $this->model("Wiki");
            $newWiki->setId_wiki(uniqid(mt_rand(), true));
            $newWiki->setTitle($_POST['title']);
            $newWiki->setContent($_POST['content']);
            $newWiki->setId_category($_POST['id_category']);
            $newWiki->setId_user($_SESSION['id_user']); 
            $newWiki->setDate_create(date('Y-m-d H:i:s')); 
            $newWiki->setDate_modified(date('Y-m-d H:i:s')); 


            // Additional logic if needed

            // Add the wiki to the database
            $this->wikiService->addWiki($newWiki);

            $tagOfWiki = $this->model("TagsOfWiki");
            $tagOfWiki->setWiki_id($newWiki->getId_wiki());
            foreach($_POST['tags'] as $tag):
                $tagOfWiki->setTag_id($tag);
                $this->tagOfWikiService->insert($tagOfWiki);
            endforeach;


            // Redirect to the author's page or any other appropriate page
            header('Location: http://localhost/Wiki/Wikis/display');

        }

        

    }
    public function delete($id) {

        $data = $this->wikiService->delete($id);
        header("Location: http://localhost/Wiki/Wikis/display");
    
    }

    public function archive($id) {

        $data = $this->wikiService->archive($id);
        header("Location: http://localhost/Wiki/Wikis/display");
    
    }

    public function restore($id){
        $data = $this->wikiService->restore($id);
        header("Location: http://localhost/Wiki/Wikis/display");

    }



    public function edit(){




        if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
            $newWiki = $this->model("Wiki");
    
            $newWiki->setId_wiki($_POST['id']);
            $newWiki->setTitle($_POST['title']);
            $newWiki->setContent($_POST['content']);
            $newWiki->setId_category($_POST['id_category']);
            $newWiki->setId_user($_POST['id_user']);
            $this->wikiService->edit($newWiki);

            // $tagOfWiki = $this->model("TagsOfWiki");
            // $tagOfWiki->setWiki_id($newWiki->getId_wiki());
            // foreach($_POST['tags'] as $tag):
            //     $tagOfWiki->setTag_id($tag);
            //     $this->tagOfWikiService->edit($tagOfWiki);
            // endforeach;


            header("Location: http://localhost/Wiki/Wikis/display");
    
        }
    }


    public function get($id) {

        $selectedTags = $this->tagOfWikiService->getByWiki($id);

        $data = [
            'Wiki' => $this->wikiService->fetch($id),
            'edit' => 1,
            'categories' => $this->categoryService->getAllCategories(),
            'selectedTags' => $selectedTags == null ? [] : $selectedTags,
            'tags' => $this->tagService->getAllTags()
        ];
        $this->view('Author/wiki', $data);
    
    }

}



?>