<?php

class Register extends Controller
{




    public function register(){

        $this->view('Register/register');
    }



    public function login(){
        $this->view('Register/login');
    }

}
?>