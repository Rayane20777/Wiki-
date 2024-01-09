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
                'id_user' => uniqid(mt_rand(), true),
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






public function loginP() {
    $this->view('Register/login');
}
        public function login(){

            $data =[
                "error" =>"",
                "emailError" =>"",
                "pwError" =>""
            ];
    
            if (isset($_POST["submit"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
    
                if(empty($email) || empty($password)){
                    $data["error"] = "Please fill all the fields";
    
            }
            else{
                if(strlen($email) < 8){
                    $data["usernameError"] = "please enter a valid email";
            }elseif(!validPassword($password)){
                $data["passwordError"] = "Please enter a valid password";
            }else{
                
            }
        }
    }
    }
    }


?>