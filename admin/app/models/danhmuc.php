<?php
class danhmuc extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getDanhMuc(){
        $sql = "SELECT * FROM danh_muc";
        return $this->db->select($sql);
    }
    public function getDanhMucById($id){
        $sql = "SELECT * FROM danh_muc WHERE id_danh_muc = $id";
        return $this->db->select($sql);
    }
    public function addDanhMuc($ten_danh_muc){
        $sql = "INSERT INTO danh_muc (ten_danh_muc) VALUES ('$ten_danh_muc')";
        $this->db->execute($sql);
    }
    public function editDanhMuc($id, $ten_danh_muc){
        $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE id_danh_muc = $id";
        $this->db->execute($sql);
    }
    public function deleteDanhMuc($id){
        $sql = "DELETE FROM danh_muc WHERE id_danh_muc = $id";
        $this->db->execute($sql);
    }
}
?>