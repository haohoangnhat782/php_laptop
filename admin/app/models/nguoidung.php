<?php
class nguoidung extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getNguoiDung(){
        $sql = "SELECT * FROM nguoi_dung";
        return $this->db->select($sql);
    }
    public function getTbl_taikhoan(){
        $sql = "SELECT * FROM tbl_taikhoan";
        return $this->db->select($sql);
    }
    public function add_nguoidung($id_nguoi_dung, $ho_ten, $dia_chi, $email, $so_dien_thoai, $password, $Ngay_tao, $TTTK){
        $sql = "INSERT INTO nguoi_dung (id_nguoi_dung, ho_ten, dia_chi, email, so_dien_thoai) VALUES ('$id_nguoi_dung', '$ho_ten', '$dia_chi', '$email', '$so_dien_thoai')";
        $this->db->execute($sql);
        $sql = "INSERT INTO tbl_taikhoan (MaTK, TenDN, Mat_khau, Ngay_tao, TTTK) VALUES ('$id_nguoi_dung', '$email','$password', '$Ngay_tao', '$TTTK')";
        $this->db->execute($sql);
    }
    public function edit_nguoidung($id_nguoi_dung, $ho_ten, $dia_chi, $email, $so_dien_thoai, $password, $Ngay_tao, $TTTK){
        $sql = "UPDATE nguoi_dung SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', email = '$email', so_dien_thoai = '$so_dien_thoai' WHERE id_nguoi_dung = '$id_nguoi_dung'";
        $this->db->execute($sql);
        $sql = "UPDATE tbl_taikhoan SET TenDN = '$email', Mat_khau = '$password', Ngay_tao = '$Ngay_tao', TTTK = '$TTTK' WHERE MaTK = '$id_nguoi_dung'";
        $this->db->execute($sql);
    }
    public function delete_nguoidung($id_nguoi_dung){
        $sql = "DELETE FROM nguoi_dung WHERE id_nguoi_dung = '$id_nguoi_dung'";
        $this->db->execute($sql);
        $sql = "DELETE FROM tbl_taikhoan WHERE MaTK = '$id_nguoi_dung'";
        $this->db->execute($sql);
    }
}
?>