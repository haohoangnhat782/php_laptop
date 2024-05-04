<?php
class productManage extends Controller{
    private $laptopModel;
    private $danhmucModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->danhmucModel = $this->model('danhmuc');
    }

    public function index(){
        if(isset($_SESSION['user']) && $_SESSION['user_privilege'])
        {
            foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 2)
                {
                    $laptop = $this->laptopModel->getLaptop();
                    $danhmuc = $this->danhmucModel->getDanhmuc();
                    $this->view('pages/productManage', ['laptop' => $laptop, 'danhmuc' => $danhmuc]);
                    break;
                }
            } 
        }
        else
        {
            return;
        }
        
    }
    public function add_product(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //upload file
            $uploads_dir = 'images';
            $tmp_name = $_FILES["url_anh"]["tmp_name"];
            $name = basename($_FILES["url_anh"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            
            $hinh_anh = $_POST['hinh_anh'];
            $don_gia = $_POST['don_gia'];
            $so_luong = $_POST['so_luong'];
            $ma_danh_muc = $_POST['ma_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $dung_luong_pin = $_POST['dung_luong_pin'];
            $man_hinh = $_POST['man_hinh'];
            $bao_hanh = $_POST['bao_hanh'];
            $thong_tin_chung = $_POST['thong_tin_chung'];
            $this->laptopModel->addProduct($hinh_anh, $don_gia, $so_luong, $ma_danh_muc, $trang_thai, $ten_san_pham, $cpu, $ram, $dung_luong_pin, $man_hinh, $bao_hanh, $thong_tin_chung);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function edit_product(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_san_pham = $_POST['id_san_pham'];
            if(isset($_FILES["url_anh"]["name"])){
                $uploads_dir = 'images';
                $tmp_name = $_FILES["url_anh"]["tmp_name"];
                $name = basename($_FILES["url_anh"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                unlink("images/".$_POST['old_hinh_anh']);
            }
            

            $hinh_anh = $_POST['hinh_anh'];
            $don_gia = $_POST['don_gia'];
            $so_luong = $_POST['so_luong'];
            $ma_danh_muc = $_POST['ma_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $dung_luong_pin = $_POST['dung_luong_pin'];
            $man_hinh = $_POST['man_hinh'];
            $bao_hanh = $_POST['bao_hanh'];
            $thong_tin_chung = $_POST['thong_tin_chung'];
            $this->laptopModel->editProduct($id_san_pham, $hinh_anh, $don_gia, $so_luong, substr($ma_danh_muc,0,2), $trang_thai, $ten_san_pham, $cpu, $ram, $dung_luong_pin, $man_hinh, $bao_hanh, $thong_tin_chung);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
}
?>