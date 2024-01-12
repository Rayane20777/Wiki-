<?php

class UserService implements UserServiceInterface {

    private $db;
    private $author = "author";

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function insert(User $user){

        $id_user = $user->getId_user();
        $full_name = $user->getFull_name();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user VALUES (:id_user, :full_name, :username, :email, :password, :role)";
        $this->db->query($sql);
        $this->db->bind(":id_user", $id_user);
        $this->db->bind(":full_name", $full_name);
        $this->db->bind(":username", $username);
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);
        $this->db->bind(":role", $this->author);
        $this->db->execute();

    }


    public function fetchByEmail(User $user){
        $email = $user->getEmail();
        $password = $user->getPassword();
    
        $sql = 'SELECT * FROM user WHERE email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        $this->db->execute();
    
        if ($this->db->rowCount() > 0) {
            $userInfo = $this->db->single();
        
            if (password_verify($password, $userInfo->password)) {
                if ($userInfo->role == 'author') {
                    header('Location: http://localhost/Wiki/Wikis/display');
                    exit(); // Add exit after header to ensure no further code execution
                } else {
                    header('Location: http://localhost/Wiki/Wikis/display');
                    exit(); // Add exit after header to ensure no further code execution
                }
            } else {
                echo 'Password incorrect<br>';
                echo 'Password from form: ' . $password . '<br>';
                echo 'Hashed password from database: ' . $userInfo->password . '<br>';
            }
        } else {
            header("Location: " . URLROOT . "/Register/login");
            exit(); // Add exit after header to ensure no further code execution
        }
    }
    

    public function fetch($idUser){


        $sql = "SELECT * FROM user WHERE id_user = :idUser";
        $this->db->query($sql);
        $this->db->bind(":idUser", $idUser);
        $this->db->execute();

    }

}