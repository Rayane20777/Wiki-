<?php

class UserService implements UserServiceInterface {

    private $db;
    private $Author = "author";


    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function insert(User $user){

        $id_user = $user->getId_user();
        $full_name = $user->getFull_name();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user VALUES (:id_user, :full_name, :username, :email, :password, :name_role)";
        $this->db->query($sql);
        $this->db->bind(":id_user", $id_user);
        $this->db->bind(":full_name", $full_name);
        $this->db->bind(":username", $username);
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);
        $this->db->bind(":name_role", $this->Author);
        $this->db->execute();

    }
}