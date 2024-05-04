<?php
class nhacungcap extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getNCC(){
        $sql = "SELECT * FROM nha_cung_cap";
        return $this->db->select($sql);
    }
    public function getNCCById($ma_ncc){
        $sql = "SELECT * FROM nha_cung_cap WHERE ma_ncc = $ma_ncc";
        return $this->db->select($sql);
    }
    public function addNCC($ten_ncc,$dia_chi,$sdt){
        $sql = "INSERT INTO nha_cung_cap (ten_ncc,dia_chi,sdt) VALUES ('$ten_ncc','$dia_chi','$sdt')";
        $this->db->execute($sql);
    }
    public function editNCC($ma_ncc,$ten_ncc,$dia_chi,$sdt){
        $sql = "UPDATE nha_cung_cap SET ten_ncc = '$ten_ncc',dia_chi = '$dia_chi',sdt = '$sdt' WHERE ma_ncc = $ma_ncc";
        $this->db->execute($sql);
    }
    public function deleteNCC($ma_ncc){
        $sql = "DELETE FROM nha_cung_cap WHERE ma_ncc = '$ma_ncc'";
        $this->db->execute($sql);
    }
}
?>