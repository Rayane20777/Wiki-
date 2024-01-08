<?php
class Register extends Controller
{
    private $userService;
    public function __construct(){
        $this->userService = $this->service("UserService");
    }

    public function register(){
        $this->view('Register/register');
    }

    public function addUser() {

        if($_SERVER['REQUEST_METHOD'] === "POST") {

            $data = [
                'id_user' => uniqid(),
                'full_name' => $_POST['full_name'],
                'username' =>  ucfirst($_POST['username']),
                'email' => uniqid($_POST['email']),
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ];

            $newUser = new User();

            $newUser->id_user = $data['id_user'];
            $newUser->full_name = $data['full_name'];
            $newUser->username = $data['username'];
            $newUser->email = $data['email'];
            $newUser->password = $data['password'];

            $this->userService->register($newUser);

 

        }

    }







    public function login(){
        $this->view('Register/login');
    }

}
?>