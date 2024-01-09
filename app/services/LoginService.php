<?php 




class LoginService implements LoginIservice{
    private $db;
    public function __construct(){
        $this->db = Database:: getInstance() ;
}

public function login($email, $password){

    $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
    $this->db->query($sql);
    $this->db->bind("email", $email);
    $this->db->bind("password", $password);
    try{
        $user = $this->db->fetchOneRow();
        if(empty($user)){
            return false;
        } else {
            return true;
        }

    }  catch(PDOException $e){
        die($e->getMessage());


}
}

public function checkRole($email){
    $sql = "SELECT * FROM user WHERE email = :email";
    $this->db->query($sql);
    $this->db->bind(":email", $email);
    try{
        $user = $this->db->fetchOneRow();
        return $user->role_name;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}


}