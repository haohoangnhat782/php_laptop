<?php
class customerManage extends Controller{
    private $nguoidungModel;
    public function __construct(){
        $this->nguoidungModel = $this->model('nguoidung');
    }
    public function index(){
        if(isset($_SESSION['user']) && $_SESSION['user_privilege']){
            foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 19){
                    $nguoidung = $this->nguoidungModel->getNguoiDung();
                    $tbl_taikhoan = $this->nguoidungModel->getTbl_taikhoan();
                    $this->view('pages/customerManage', [
                        'nguoidung' => $nguoidung,
                        'tbl_taikhoan' => $tbl_taikhoan
                    ]);
                    break;
                }
            }
        }else{
            return;
        }
    }
    public function add_customer(){
        if(isset($_POST['id_nguoi_dung']) && isset($_POST['ho_ten']) && isset($_POST['dia_chi']) && isset($_POST['email']) && isset($_POST['so_dien_thoai']) && isset($_POST['password']) && isset($_POST['Ngay_tao']) && isset($_POST['TTTK'])){
            $id_nguoi_dung = $_POST['id_nguoi_dung'];
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $password = $_POST['password'];
            $Ngay_tao = $_POST['Ngay_tao'];
            $TTTK = $_POST['TTTK'];
            $nguoidung = $this->nguoidungModel->getNguoiDung();
            $check = 0;
            foreach ($nguoidung as $nd) {
                if($nd['id_nguoi_dung'] == $id_nguoi_dung){
                    $check = 1;
                    break;
                }
            }
            if($check == 0){    
                $this->nguoidungModel->add_nguoidung($id_nguoi_dung, $ho_ten, $dia_chi, $email, $so_dien_thoai, $password, $Ngay_tao, $TTTK);
                echo json_encode(['status' => 'success']);
            }else{
                echo json_encode(['status' => 'failusername']);
            }
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function edit_customer(){
        if(isset($_POST['id_nguoi_dung']) && isset($_POST['ho_ten']) && isset($_POST['dia_chi']) && isset($_POST['email']) && isset($_POST['so_dien_thoai']) && isset($_POST['password']) && isset($_POST['Ngay_tao']) && isset($_POST['TTTK'])){
            $id_nguoi_dung = $_POST['id_nguoi_dung'];
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $password = $_POST['password'];
            $Ngay_tao = $_POST['Ngay_tao'];
            $TTTK = $_POST['TTTK'];
            $this->nguoidungModel->edit_nguoidung($id_nguoi_dung, $ho_ten, $dia_chi, $email, $so_dien_thoai, $password, $Ngay_tao, $TTTK);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function delete_customer(){
        if(isset($_POST['id_nguoi_dung'])){
            $id_nguoi_dung = $_POST['id_nguoi_dung'];
            $this->nguoidungModel->delete_nguoidung($id_nguoi_dung);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
}
?>