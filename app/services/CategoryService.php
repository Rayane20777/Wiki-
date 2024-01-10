<?php 
class CategoryService implements CategoryIservice{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance();
        }


        public function addCategory(Category $category){
            $sql = "INSERT INTO category VALUES :id_category, ::name";
            try{
                $this->db->query($sql);
                $this->db->bind('id_category', $category->id_category);
                $this->db->bind('name', $category->name);
                $this->db->execute();
                return true;
            }catch(PDOException $e){
                print_r($e->getMessage());
}
}
}
?>