<?php 
class Wiki {
    private $id_wiki;
    private $title;
    private $content;
    private $date_create;
    private $date_modified;
    private $id_user;
    private $id_category;

    public function getId_wiki() {
        return $this->id_wiki;
    }

    public function setId_wiki($id_wiki) {
        $this->id_wiki = $id_wiki;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getDate_create() {
        return $this->date_create;
    }

    public function setDate_create($date_create) {
        $this->date_create = $date_create;
    }

    public function getDate_modified() {
        return $this->date_modified;
    }

    public function setDate_modified($date_modified) {
        $this->date_modified = $date_modified;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function getId_category() {
        return $this->id_category;
    }

    public function setId_category($id_category) {
        $this->id_category = $id_category;
    }
}

?>