<?php

class TagService implements TagServiceInterface {

    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function insert(Tag $tag){

        $id_tag = $tag->getId_tag();
        $name = $tag->getName();

        $sql = "INSERT INTO tag VALUES (:id_tag, :name)";
        $this->db->query($sql);
        $this->db->bind(":id_tag", $id_tag);
        $this->db->bind(":name", $name);
        $this->db->execute();

    }

    public function getAllTags() {

        $sql = "SELECT * FROM tag";
        try {
            $this->db->query($sql);
            $tags = $this->db->resultSet();
            return $tags;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }
    public function delete($id) {

        $sql = "DELETE FROM tag WHERE id_tag = :id_tag";
        try {
            $this->db->query($sql);
            $this->db->bind("id_tag", $id);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }
    public function edit(Tag $tag){

        $id_tag = $tag->getId_tag();
        $name = $tag->getName();

        $sql = "UPDATE tag SET name = :name WHERE id_tag = :id_tag";
        $this->db->query($sql);
        $this->db->bind(":id_tag", $id_tag);
        $this->db->bind(":name", $name);
        $this->db->execute();

    }

    public function fetch($id) {

        $sql = "SELECT * FROM tag WHERE id_tag = :id";
        try {
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $tags = $this->db->single();
            return $tags;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    public function getTagsOFWiki($id) {

        $sql = "SELECT t.name FROM tag t JOIN tagofwiki tw ON t.id_tag = tw.id_tag JOIN wiki w ON tw.id_wiki = w.id_wiki WHERE w.id_wiki = :id";
        try {
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $tags = $this->db->resultSet();
            return $tags;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    
}