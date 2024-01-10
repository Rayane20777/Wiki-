<?php
class Register extends Controller
{
    private $model;
    private $service;
    public function __construct(){
        $this->model = $this->model("User");
        $this->service = $this->service("UserService");
    }

    public function register(){
        $this->view('Register/register');
    }

    public function insert() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            $data = [
                'id_user' => uniqid(mt_rand(), true),
                'full_name' => $_POST['full_name'],
                'username' =>  ucfirst($_POST['username']),
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'name_role' => "author"
            ];

            $this->model->setId_user($data["id_user"]);
            $this->model->setFull_name($data["full_name"]);
            $this->model->setUsername($data["username"]);
            $this->model->setEmail($data["email"]);
            $this->model->setPassword($data["password"]);
            $this->model->setRole($data["name_role"]);
            $this->service->insert($this->model);
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