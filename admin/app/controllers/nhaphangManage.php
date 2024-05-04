<?php
class nhaphangManage extends Controller{
    private $nhaphangModel;
    private $laptopModel;
    private $NCCModel;
    private $userModel;

    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->nhaphangModel = $this->model('nhaphang');
        $this->NCCModel = $this->model('nhacungcap');
        $this->userModel = $this->model('user');
        
    }

    public function index(){
        // if(isset($_SESSION['user']) && $_SESSION['user_privilege'])
        // {
        //     foreach ($_SESSION['user_privilege'] as $user_privilege) {
        //         if($user_privilege['privilege_id'] == 2)
        //         {
            $user = $this->userModel->getUser();
                    $laptop = $this->laptopModel->getLaptop();
                    $NCC = $this->NCCModel->getNCC();
                    $nhaphang = $this->nhaphangModel->getnhaphang();
                    $chitiet = $this->nhaphangModel->getChiTietNhapHang();
                    
                    $this->view('pages/nhaphangManage', ['phieunhap' => $nhaphang,'NCC' => $NCC,'laptop' => $laptop,'user' => $user,'chitiet' => $chitiet]);
                    // break;
                // }
        //     } 
        // }
        // else
        // {
        //     return;
        // }
        
    }  
      public function add_nhaphang1(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ma_pn = $_POST['ma_pn'];
            $ma_NCC = $_POST['ma_NCC'];
            $ma_NV = $_POST['ma_NV'];
            $id_san_pham = $_POST['id_san_pham'];
            $don_gia = $_POST['don_gia'];
            $so_luong = $_POST['so_luong'];
            $this->nhaphangModel->addnhaphang($ma_pn,$ma_NCC, $ma_NV, $id_san_pham, $don_gia, $so_luong);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function add_nhaphang(){
        if(isset($_POST['ma_pn']) && isset($_POST['ma_pn']) && isset($_POST['ma_NV']) && isset($_POST['id_san_pham']) && isset($_POST['don_gia']) && isset($_POST['so_luong']) ){
            $ma_pn = $_POST['ma_pn'];
            $ma_NCC = $_POST['ma_NCC'];
            $ma_NV = $_POST['ma_NV'];
            $id_san_pham = $_POST['id_san_pham'];
            $don_gia = $_POST['don_gia'];
            $so_luong = $_POST['so_luong'];
            $nhaphang = $this->nhaphangModel->getnhaphang();
            $check = 0;
            foreach ($nhaphang as $nd) {
                if($nd['ma_pn'] == $ma_pn){
                    $check = 1;
                    break;
                }
            }
            if($check == 0){    
                $this->nhaphangModel->addnhaphang($ma_pn,$ma_NCC, $ma_NV, $id_san_pham, $don_gia, $so_luong);
                echo json_encode(['status' => 'success']);
            }else{
                echo json_encode(['status' => 'failusername']);
            }
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    // public function add_NCC(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $ten_ncc = $_POST['ten_ncc'];
    //         $dia_chi = $_POST['dia_chi'];
    //         $sdt = $_POST['sdt'];

    //         $this->nhaphangModel->addNCC($ten_ncc, $dia_chi, $sdt);
    //         echo json_encode(['status' => 'success']);
    //     }else{
    //         echo json_encode(['status' => 'fail']);
    //     }
    // }
    // public function edit_NCC(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $ma_ncc = $_POST['ma_ncc'];
    //         $ten_ncc = $_POST['ten_ncc'];
    //         $dia_chi = $_POST['dia_chi'];
    //         $sdt = $_POST['sdt'];
    //         $this->nhaphangModel->editNCC($ma_ncc, $ten_ncc, $dia_chi, $sdt);
    //         echo json_encode(['status' => 'success']);
    //     }else{
    //         echo json_encode(['status' => 'fail']);
    //     }
    // }
    // public function delete_NCC()
    // {
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $ma_ncc = $_POST['id'];
    
    //         $this->nhaphangModel->deleteNCC($ma_ncc);
    //         echo json_encode(['status' => 'success']);
    //     }else{
    //         echo json_encode(['status' => 'fail']);
    //     }
    // }
}
?>