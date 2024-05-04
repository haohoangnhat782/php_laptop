<?php 
class donhang extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getDonHang(){
        $sql = "SELECT * FROM don_hang";
        return $this->db->select($sql);
    }
    public function getChiTietDonHang(){
        $sql = "SELECT * FROM chi_tiet_don_hang";
        return $this->db->select($sql);
    }
    public  function updateTrangThaiDonHang($trang_thai_don_hang, $id_don_hang){
        $sql = "UPDATE don_hang SET trang_thai_don_hang = $trang_thai_don_hang WHERE id_don_hang = $id_don_hang";
        $this->db->execute($sql);
    }
}
?>