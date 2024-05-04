<?php
class laptop extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getLaptop(){
        $sql = "SELECT * FROM san_pham";
        return $this->db->select($sql);
    }
    public function getLaptopById($id){
        $sql = "SELECT * FROM san_pham WHERE id_san_pham = $id";
        return $this->db->select($sql);
    }
    public function addProduct($hinh_anh, $don_gia, $so_luong, $ma_danh_muc, $trang_thai, $ten_san_pham, $cpu, $ram, $dung_luong_pin, $man_hinh, $bao_hanh, $thong_tin_chung){
        $sql = "INSERT INTO san_pham(hinh_anh, don_gia, so_luong, ma_danh_muc, trang_thai, ten_san_pham, cpu, ram, dung_luong_pin, man_hinh, bao_hanh, thong_tin_chung) VALUES ('$hinh_anh', '$don_gia', '$so_luong', '$ma_danh_muc', '$trang_thai', '$ten_san_pham', '$cpu', '$ram', '$dung_luong_pin', '$man_hinh', '$bao_hanh', '$thong_tin_chung')";
        return $this->db->execute($sql);
    }
    public function editProduct($id_san_pham, $hinh_anh, $don_gia, $so_luong, $ma_danh_muc, $trang_thai, $ten_san_pham, $cpu, $ram, $dung_luong_pin, $man_hinh, $bao_hanh, $thong_tin_chung){
        $sql = "UPDATE san_pham SET hinh_anh = '$hinh_anh', don_gia = $don_gia, so_luong = $so_luong, ma_danh_muc = $ma_danh_muc, trang_thai = $trang_thai, ten_san_pham = '$ten_san_pham', cpu = '$cpu', ram = '$ram', dung_luong_pin = '$dung_luong_pin', man_hinh = '$man_hinh', bao_hanh = '$bao_hanh', thong_tin_chung = '$thong_tin_chung' WHERE id_san_pham = $id_san_pham";
        return $this->db->execute($sql);
    }
}
?>