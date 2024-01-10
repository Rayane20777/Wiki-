<?php
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
            $newUser->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
            $newUser->setRole("author");
            $this->service->insert($newUser);
            $this->view('Register/register');
        }

    }








// public function loginP() {
//     $this->view('Register/login');
// }
//         public function login(){
//             $data =[

//                 "error" =>"",
//                 "emailError" =>"",
//                 "passwordError" =>""
//             ];
//             if (isset($_POST["submit"])){
//                 $email = $_POST["email"];
//                 $password = $_POST["password"];
    
//                 if(empty($email) || empty($password)){
//                     $data["error"] = "Please fill all the fields";
//             }
//             else{
//                 if(strlen($email) < 8){
//                     $data["usernameError"] = "please enter a valid email";
//             }elseif(!validPassword($password)){
//                 $data["passwordError"] = "Please enter a valid password";
//             }else{
//                 $loginService = new User();
//                 $loginService = new LoginService();
//                         if($loginService->login($email, $password)){
//                             $role = $loginService->checkRole($email);
//                             $_SESSION["role_name"] = $role;
//                             $_SESSION["email"] = $email;
//                             if($role == "author"){
//                               header("location:".URLROOT."/Author/dashboard");
//                             }
//                             elseif($role == "admin"){
//                               header("location:".URLROOT."/Admin/dashboard");
//                             }    
//                         } 
//                         else {
//                             $data["error"] = "invalid credentials";
//                             $_SESSION["role_name"] = "";
//                             $_SESSION["email"] = "";
//                         }   
//             }
//         }
            
//     }
//     $this->view("Register/login", $data);

//     }
    }


?>