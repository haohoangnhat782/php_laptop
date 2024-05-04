<?php
class billManage extends Controller
{
    private $donhangModel;
    private $laptopModel;

    public function __construct()
    {
        $this->donhangModel = $this->model('donhang');
        $this->laptopModel = $this->model('laptop');
    }

    public function index()
    {
        if(isset($_SESSION['user']) && $_SESSION['user_privilege'])
        {
            foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 4)
                {
                    $donhang = $this->donhangModel->getDonHang();
                    $laptop = $this->laptopModel->getLaptop();
                    $chitietdonhang = $this->donhangModel->getChiTietDonHang();
                    $this->view('pages/billManage', ['donhang' => $donhang, 'laptop' => $laptop, 'chitietdonhang' => $chitietdonhang]);
                    break;
                }
            } 
        }
        else
        {
            return;
        }
    }
    public function update_trangthaidonhang()
    {   
        if(isset($_POST['trang_thai_don_hang']) && isset($_POST['id_don_hang']))
        {
            $trang_thai_don_hang = $_POST['trang_thai_don_hang'];
            $id_don_hang = $_POST['id_don_hang'];
            $this->donhangModel->updateTrangThaiDonHang($trang_thai_don_hang, $id_don_hang);
            echo json_encode(['status' => 'success']);
        }      
    }
    public function fill(){
        if(isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])){
            
            $donhang = $this->donhangModel->getDonHang();
            // Lọc donhang có trang_thai_don_hang bằng 1
            $day = $_GET['day'] ? $_GET['day'] : null;
            $month = $_GET['month'] ? $_GET['month'] : null;
            $year = $_GET['year'] ? $_GET['year'] : null;

            $filtered_donhang = array_filter($donhang, function($item) {
                return $item['trang_thai_don_hang'] == 1 || $item['trang_thai_don_hang'] == 0;
            });

            if ($day != null) {
                $filtered_donhang = array_filter($filtered_donhang, function($item) use ($day) {
                    $date = substr($item['ngay_dat_hang'], 0, 10);
                    return $date == $day;
                });
            }

            if ($month != null) {
                $filtered_donhang = array_filter($filtered_donhang, function($item) use ($month) {
                    $date = substr($item['ngay_dat_hang'], 0, 7);
                    return $date == $month;
                });
            }

            if ($year != null) {
                $filtered_donhang = array_filter($filtered_donhang, function($item) use ($year) {
                    $date = substr($item['ngay_dat_hang'], 0, 4);
                    return $date == $year;
                });
            }

            echo json_encode(['combined_chitietdonhang' => $filtered_donhang]);
        }
       
    }
}   
?>