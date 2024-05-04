<?php
class categoryManage extends Controller{
    private $danhmucModel;
    public function __construct(){
        $this->danhmucModel = $this->model('danhmuc');
    }
    public function index(){
        if(isset($_SESSION['user']) && $_SESSION['user_privilege']){
            foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 1){
                    $danhmuc = $this->danhmucModel->getDanhMuc();
                    $this->view('pages/categoryManage', ['danhmuc' => $danhmuc]);
                    break;
                }
            }
        }else{
            return;
        }
    }
    public function add_category(){
        if(isset($_POST['ten_danh_muc'])){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $this->danhmucModel->addDanhMuc($ten_danh_muc);
            echo json_encode(['status' => 'success']);
        }
    }
    public function edit_category(){
        if(isset($_POST['id']) && isset($_POST['ten_danh_muc'])){
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $this->danhmucModel->editDanhMuc($id, $ten_danh_muc);
            echo json_encode(['status' => 'success']);
        }
    }
    public function delete_category(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->danhmucModel->deleteDanhMuc($id);
            echo json_encode(['status' => 'success']);
        }
    }
}
?>