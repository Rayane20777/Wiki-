<?php

class CategoryService implements CategoryServiceInterface {

    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function insert(Category $category){

        $id_category = $category->getId_category();
        $name = $category->getName();

        $sql = "INSERT INTO category VALUES (:name, :id_category)";
        $this->db->query($sql);
        $this->db->bind(":id_category", $id_category);
        $this->db->bind(":name", $name);
        $this->db->execute();

    }
}