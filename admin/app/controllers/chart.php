<?php
class chart extends Controller{
    private $laptopModel;
    private $donhangModel;
    private $danhmucModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->donhangModel = $this->model('donhang');
        $this->danhmucModel = $this->model('danhmuc');
    }

    public function index(){
        if(isset($_SESSION['user']) && $_SESSION['user_privilege'])
        {
            foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 5)
                {
                    $home_chart = $this->home_chart();
                    $danhmuc = $this->danhmucModel->getDanhMuc();
                    $this->view('pages/chart', ['home_chart' => $home_chart, 'danhmuc' => $danhmuc]);
                    break;
                }
            } 
        }
        else
        {
            return;
        }
        
    }
    public function home_chart(){
        $chitietdonhang = $this->donhangModel->getChiTietDonHang();
        $donhang = $this->donhangModel->getDonHang();
        $combined_chitietdonhang = [];
        // Lọc donhang có trang_thai_don_hang bằng 1
        $filtered_donhang = array_filter($donhang, function($item) {
            return $item['trang_thai_don_hang'] == 1;
        });

        foreach ($chitietdonhang as $item) {
            $ma_don_hang = $item['ma_don_hang'];
            $ma_san_pham = $item['ma_san_pham'];
            $so_luong = $item['so_luong'];
            $don_gia = $item['don_gia'];
            
            // Kiểm tra xem ma_don_hang có tồn tại trong filtered_donhang không
            foreach ($filtered_donhang as $filtered_donhang1) {
                if($filtered_donhang1['id_don_hang'] == $ma_don_hang){
                    $laptopItem = $this->laptopModel->getLaptopById($ma_san_pham);
                    $img = $laptopItem[0]['hinh_anh'];
                    $name = $laptopItem[0]['ten_san_pham'];
                    if (isset($combined_chitietdonhang[$ma_san_pham])) {
                        $combined_chitietdonhang[$ma_san_pham]['so_luong'] += $so_luong;
                        $combined_chitietdonhang[$ma_san_pham]['don_gia'] += $don_gia;
                    } else {
                        $combined_chitietdonhang[$ma_san_pham] = [
                            'ma_san_pham' => $ma_san_pham,
                            'so_luong' => $so_luong,
                            'don_gia' => $don_gia,
                            'img' => $img, // Thêm hình ảnh vào mảng
                            'name' => $name // Thêm tên vào mảng
                        ];
                    }
                }               
            }
        }
        return $combined_chitietdonhang;
    }

    public function chart(){
        if(isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])){
            
            $chitietdonhang = $this->donhangModel->getChiTietDonHang();
            $donhang = $this->donhangModel->getDonHang();
            $combined_chitietdonhang = array();
            // Lọc donhang có trang_thai_don_hang bằng 1
            $day = $_GET['day'] ? $_GET['day'] : null;
            $month = $_GET['month'] ? $_GET['month'] : null;
            $year = $_GET['year'] ? $_GET['year'] : null;

            $filtered_donhang = array_filter($donhang, function($item) {
                return $item['trang_thai_don_hang'] == 1;
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

            foreach ($chitietdonhang as $item) {
                $ma_don_hang = $item['ma_don_hang'];
                $ma_san_pham = $item['ma_san_pham'];
                $so_luong = $item['so_luong'];
                $don_gia = $item['don_gia'];

               // Kiểm tra xem ma_don_hang có tồn tại trong filtered_donhang không
                foreach ($filtered_donhang as $filtered_donhang1) {
                    if($filtered_donhang1['id_don_hang'] == $ma_don_hang){
                        $laptopItem = $this->laptopModel->getLaptopById($ma_san_pham);
                        $img = $laptopItem[0]['hinh_anh'];
                        $name = $laptopItem[0]['ten_san_pham'];
                        if (isset($combined_chitietdonhang[$ma_san_pham])) {
                            $combined_chitietdonhang[$ma_san_pham]['so_luong'] += $so_luong;
                            $combined_chitietdonhang[$ma_san_pham]['don_gia'] += $don_gia;
                        } else {
                            $combined_chitietdonhang[$ma_san_pham] = [
                                'ma_san_pham' => $ma_san_pham,
                                'so_luong' => $so_luong,
                                'don_gia' => $don_gia,
                                'img' => $img, // Thêm hình ảnh vào mảng
                                'name' => $name // Thêm tên vào mảng
                            ];
                        }
                    }               
                }
            }
            echo json_encode(['combined_chitietdonhang' => $combined_chitietdonhang]);
        }
       
    }
    public function myAreaChart(){
        if(isset($_GET['year']) && isset($_GET['category'])){
            $year = $_GET['year'];
            $category = $_GET['category'];
            $data = array_fill(1, 12, 0); // Tạo một mảng với 12 phần tử, tất cả đều được khởi tạo là 0

            $chitietdonhang = $this->donhangModel->getChiTietDonHang();
            $donhang = $this->donhangModel->getDonHang();
            $danhmuc = $this->danhmucModel->getDanhMuc();
            $filtered_donhang = array_filter($donhang, function($item) use ($year) {
                $date = substr($item['ngay_dat_hang'], 0, 4);
                return $item['trang_thai_don_hang'] == 1 && $date == $year;

            });
            if ($category != 'Tất cả') {
                foreach ($chitietdonhang as $item) {
                    $ma_don_hang = $item['ma_don_hang'];
                    $ma_san_pham = $item['ma_san_pham'];
                    $don_gia = $item['don_gia'];

                    // Kiểm tra xem ma_don_hang có tồn tại trong filtered_donhang không
                    foreach ($filtered_donhang as $filtered_donhang1) {
                        if($filtered_donhang1['id_don_hang'] == $ma_don_hang){
                            $laptopItem = $this->laptopModel->getLaptopById($ma_san_pham);
                            $madanhmuc = $laptopItem[0]['ma_danh_muc'];
                            $danhmucItem = $this->danhmucModel->getDanhMucById($madanhmuc);
                            $danhmuc = $danhmucItem[0]['ten_danh_muc'];
                            if ($danhmuc == $category) {
                                $month = substr($filtered_donhang1['ngay_dat_hang'], 5, 2);
                                $data[(int)$month] += $don_gia;
                                
                            }
                        }                       
                    }                                           
                }
            }
            if($category == 'Tất cả') {
                foreach ($chitietdonhang as $item) {
                    $ma_don_hang = $item['ma_don_hang'];
                    $ma_san_pham = $item['ma_san_pham'];
                    $don_gia = $item['don_gia'];

                    // Kiểm tra xem ma_don_hang có tồn tại trong filtered_donhang không
                    foreach ($filtered_donhang as $filtered_donhang1) {
                        if($filtered_donhang1['id_don_hang'] == $ma_don_hang){                        
                            $month = substr($filtered_donhang1['ngay_dat_hang'], 5, 2);
                            $data[(int)$month] += $don_gia;                                                         
                        }                       
                    }                 
                }
            }
            echo json_encode(['filtered_donhang' => $filtered_donhang, 'data' =>$data]);// Trả về dữ liệu dưới dạng JSON

        }
    }
}
?>