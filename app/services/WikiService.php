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

        $sql = "SELECT wiki.*, user.full_name AS user_name
        FROM wiki
        LEFT JOIN user ON wiki.id_user = user.id_user
        ORDER BY wiki.date_modified";
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

    public function archive($id){

        $sql = "UPDATE wiki SET archived = '1' WHERE id_wiki = :id_wiki";
        $this->db->query($sql);
        $this->db->bind(":id_wiki", $id);
        $this->db->execute();

        

    }

    public function restore($id){
        $sql = "UPDATE wiki SET archived = '0' WHERE id_wiki = :id_wiki";
        $this->db->query($sql);
        $this->db->bind(":id_wiki", $id);
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

    public function getWiki($id) {

        $sql = "SELECT *, c.name AS category_name , u.full_name AS author FROM wiki w JOIN category c ON w.id_category = c.id_category JOIN user u ON w.id_user = u.id_user WHERE id_wiki = :id";
        try {
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $tags = $this->db->single();
            return $tags;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    public function getWikiByUser($id) {

        $sql = "SELECT w.* FROM wiki w JOIN category c ON w.id_category = c.id_category JOIN user u ON w.id_user = u.id_user WHERE u.id_user = :id";
        try {
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $tags = $this->db->resultSet();
            return $tags;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }


    // Add other methods as needed, e.g., getWikiById, updateWiki, etc.
}






?>