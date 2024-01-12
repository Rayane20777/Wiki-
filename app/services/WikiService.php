<?php

class WikiService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addWiki(Wiki $wiki) {
        $id_wiki = $wiki->getId_wiki();
        $title = $wiki->getTitle();
        $content = $wiki->getContent();
        $date_create = $wiki->getDate_create();
        $date_modified = $wiki->getDate_modified();
        $id_user = $wiki->getId_user();
        $id_category = $wiki->getId_category();

        $sql = "INSERT INTO wiki VALUES (:id_wiki, :title, :content, :date_create, :date_modified, :id_user, :id_category)";

        $this->db->query($sql);
        $this->db->bind(":id_wiki", $id_wiki);
        $this->db->bind(":title", $title);
        $this->db->bind(":content", $content);
        $this->db->bind(":date_create", $date_create);
        $this->db->bind(":date_modified", $date_modified);
        $this->db->bind(":id_user", $id_user);
        $this->db->bind(":id_category", $id_category);

        return $this->db->execute();
    }


    public function getAllWikis() {

        $sql = "SELECT * FROM wiki";
        try {
            $this->db->query($sql);
            $Wikis = $this->db->resultSet();
            return $Wikis;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }
   

    // Add other methods as needed, e.g., getWikiById, updateWiki, etc.
}




?>