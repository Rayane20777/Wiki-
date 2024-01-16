<?php
session_start();

class Register extends Controller
{
    private $service;

    public function __construct(){
        $this->service = $this->service("UserService");
    }

    public function register(){
        $this->view('Register/register');
    }

    public function insert() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $newUser = $this->model("User");
            $newUser->setId_user(uniqid(mt_rand(), true));
            $newUser->setFull_name($_POST['full_name']);
            $newUser->setUsername(ucfirst($_POST['username']));
            $newUser->setEmail($_POST['email']);
            $newUser->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $newUser->setRole("author");
            $this->service->insert($newUser);
            $this->view('Register/register');
        }

    }





public function login(){
 if($_SERVER['REQUEST_METHOD']== 'POST'){
    $logUser = $this->model("User");
    $logUser->setEmail($_POST['email']);
    $logUser->setPassword($_POST['password']);
    $this->service->fetchByEmail($logUser);
    

 }else{
    $this->view('Register/login');

 }

    
}

public function logout(){
    $this->service->logout();
}
 
}