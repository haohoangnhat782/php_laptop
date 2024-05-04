<?php 
class userManage extends Controller{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('user');
    }
    public function index()
    {   
        if(isset($_SESSION['user']) && $_SESSION['user_privilege'])
        {
            foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 3)
                {
                    $user = $this->userModel->getUser();
                    $user_privilege = $this->userModel->getUser_privilege();
                    $privilege = $this->userModel->getPrivilege();
                    $privilege_group = $this->userModel->getPrivilege_group();
                    $this->view('pages/userManage', ['user' => $user, 'user_privilege' => $user_privilege, 'privilege' => $privilege, 'privilege_group' => $privilege_group]);
                    break;
                }
            } 
        }
        else
        {
            return;
        }
        
    }
    public function add_user()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $isUsernameTaken = $this->userModel->checkUsername($username);
            
            if($isUsernameTaken) {
                echo json_encode(['status' => 'failusername']);
                return;
            }
            
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $Ngay_tao = $_POST['Ngay_tao'];
            $TTTK = $_POST['TTTK'];
            $this->userModel->addUser($username, $password, $fullname, $Ngay_tao, $TTTK);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function edit_user()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $Ngay_tao = $_POST['Ngay_tao'];
            $TTTK = $_POST['TTTK'];
            $this->userModel->editUser($id, $username, $password, $fullname, $Ngay_tao, $TTTK);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function edit_user_privilege()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user_id = $_POST['user_id'];
            $privilege_id = $_POST['privilege_id'];
            $this->userModel->editUserPrivilege($user_id, $privilege_id);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function delete_user()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $this->userModel->deleteUser($id);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
}
?>