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


    public function delete($id) {

        $sql = "DELETE FROM wiki WHERE id_wiki = :id_wiki";
        try {
            $this->db->query($sql);
            $this->db->bind("id_wiki", $id);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }
    public function edit(Wiki $wiki){

        $id_wiki = $wiki->getId_wiki();
        $title = $wiki->getTitle();
        $content = $wiki->getContent();
        $id_category = $wiki->getId_category();

        $sql = "UPDATE wiki SET title = :title , content = :content , id_category =:id_category WHERE id_wiki = :id_wiki";
        $this->db->query($sql);
        $this->db->bind(":id_wiki", $id_wiki);
        $this->db->bind(":title", $title);
        $this->db->bind(":content", $content);
        $this->db->bind(":id_category", $id_category);
        $this->db->execute();

        

    }

    public function fetch($id) {

        $sql = "SELECT * FROM wiki WHERE id_wiki = :id";
        try {
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $tags = $this->db->single();
            return $tags;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }


    // Add other methods as needed, e.g., getWikiById, updateWiki, etc.
}






?>