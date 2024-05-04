<?php
class login extends Controller{
    private $userModel;
    public function __construct(){
        $this->userModel = $this->model('user');
    }
    public function index(){
        $data = $this->userModel->getUser();
        $this->view('pages/login', $data);
    }
    public function login(){
        $data = $this->userModel->getUser();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $error = false;
            $email = $_POST['email'];
            $password = $_POST['password'];
            foreach($data as $user){
                if($email == $user['username'] && $password == $user['password'] && $user['TTTK'] == 1){
                    $_SESSION['user_privilege'] = $this->userModel->getUser_privilegeByUserId($user['id']);
                    $_SESSION['user'] = $user;
                    $error = true;
                    echo json_encode(['check' => 'success']);
                }
            }
            if(!$error){
                echo json_encode(['check' => 'error']);
            }
        }
    }
    public function logout(){
        session_destroy();
        header('Location: ' . URLROOT . 'login');
    }
}
?>