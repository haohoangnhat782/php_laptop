<?php
class nhaphang extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getnhaphang(){
        $sql = "SELECT * FROM  phieu_nhap";
        return $this->db->select($sql);
    }
    public function getChiTietNhapHang(){
        $sql = "SELECT * FROM chi_tiet_phieu_nhap";
        return $this->db->select($sql);
    }
    public function addnhaphang($ma_pn,$ma_NCC, $ma_NV, $id_san_pham, $don_gia, $so_luong){
        $tong_tien=$so_luong * $don_gia;
        $sql = "INSERT INTO phieu_nhap(ma_pn,ma_ncc,ma_NV,tong_tien) VALUES ('$ma_pn','$ma_NCC', '$ma_NV','$tong_tien' )";
        $this->db->execute($sql);

        $sql_ = "INSERT INTO chi_tiet_phieu_nhap(ma_phieu_nhap,ma_san_pham,so_luong,don_gia) VALUES ('$ma_pn', '$id_san_pham', '$so_luong','$don_gia' )";
        $this->db->execute($sql_);
        $sql_ = "UPDATE san_pham SET so_luong = so_luong + '$so_luong' where id_san_pham = '$id_san_pham'";
        $this->db->execute($sql_);
        
    }
    
}
?>