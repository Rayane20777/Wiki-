<?php

class Pages extends Controller
{
    private $wikiService;
    private $categoryService;
    private $tagService;
    public function __construct()
    {
        $this->wikiService = $this->service("WikiService");
        $this->categoryService = $this->service("CategoryService");
        $this->tagService = $this->service("TagService");
    }


    public function navbar(){
        $this->view('pages/navbar');
    }

    public function dashboard() {

        $data = [
            'categories' => $this->categoryService->getAllCategories(),
            'wikis' => $this->wikiService->getAllWikis(),
            'tags' => $this->tagService->getAllTags()
        ];

        $this->view('pages/dashboard', $data);
    
    }

    public function wikiPage($id) {

        $data = [
            'wiki' => $this->wikiService->getWiki($id),
            'tags' => $this->tagService->getTagsOFWiki($id)
        ];

        // var_dump($data);

        $this->view('pages/wikipage', $data);
    
    }


    public function head(){
        $this->view('pages/head');
    }
   

}
?>

