<?php

class UserService implements UserIservice {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

        public function register(User $user) {

            $sql = "INSERT INTO User VALUES(:id_user , :full_name , :username , :email , :password, 'author')";

            try {
                $this->db->query($sql);
                $this->db->bind('id_user' , $user->id_user);
                $this->db->bind('full_name' , $user->full_name);
                $this->db->bind('username' , $user->username);
                $this->db->bind('email' , $user->email);
                $this->db->bind('password' , $user->password);

                $this->db->execute();
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
            }



        }
    }

        ?>