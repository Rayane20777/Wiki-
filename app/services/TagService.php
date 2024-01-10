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


    
}