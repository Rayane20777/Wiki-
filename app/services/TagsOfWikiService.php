<?php

class TagsOfWikiService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function insert(TagsOfWiki $tagsOfWiki) {
        $id_tag = $tagsOfWiki->getTag_id();
        $id_wiki = $tagsOfWiki->getWiki_id();

        $sql = "INSERT INTO TagOfWiki (id_tag, id_wiki) VALUES (:id_tag, :id_wiki)";
        $this->db->query($sql);
        $this->db->bind(":id_tag", $id_tag);
        $this->db->bind(":id_wiki", $id_wiki);
        $this->db->execute();
    }

    public function getByWiki($id_wiki) {

        $sql = "SELECT * FROM TagOfWiki WHERE id_wiki =  :id_wiki";
        $this->db->query($sql);
        $this->db->bind(":id_wiki", $id_wiki);
        $this->db->execute();
    }

}
