<?php

class CategoryService implements CategoryServiceInterface {

    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function insert(Category $category){

        $id_category = $category->getId_category();
        $name = $category->getName();

        $sql = "INSERT INTO category VALUES (:id_category, :name)";
        $this->db->query($sql);
        $this->db->bind(":id_category", $id_category);
        $this->db->bind(":name", $name);
        $this->db->execute();

    }

    public function edit(Category $category){

        $id_category = $category->getId_category();
        $name = $category->getName();

        $sql = "UPDATE category SET name = :name WHERE id_category = :id_category";
        $this->db->query($sql);
        $this->db->bind(":id_category", $id_category);
        $this->db->bind(":name", $name);
        $this->db->execute();

    }


    public function getAllCategories() {

        $sql = "SELECT * FROM category";
        try {
            $this->db->query($sql);
            $categories = $this->db->resultSet();
            return $categories;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    public function fetch($id) {

        $sql = "SELECT * FROM category WHERE id_category = :id";
        try {
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $categories = $this->db->single();
            return $categories;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    public function delete($id) {

        $sql = "DELETE FROM category WHERE id_category = :id_category";
        try {
            $this->db->query($sql);
            $this->db->bind("id_category", $id);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }
}