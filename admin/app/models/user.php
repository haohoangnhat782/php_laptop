<?php 
class user extends Database{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getUser(){
        $sql = "SELECT * FROM user";
        return $this->db->select($sql);
    }
    public function getUserById($id){
        $sql = "SELECT * FROM user WHERE id = $id";
        return $this->db->select($sql);
    }
    public function getUser_privilege(){
        $sql = "SELECT * FROM user_privilege";
        return $this->db->select($sql);
    }
    public function getUser_privilegeByUserId($id){
        $sql = "SELECT * FROM user_privilege WHERE user_id = $id";
        return $this->db->select($sql);
    }
    public function getPrivilege(){
        $sql = "SELECT * FROM privilege";
        return $this->db->select($sql);
    }
    public function getPrivilege_group(){
        $sql = "SELECT * FROM privilege_group";
        return $this->db->select($sql);
    }

    public function checkUsername($username){
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->db->select($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function checkUserPrivilege($user_id, $privilege_id){
        $sql = "SELECT * FROM user_privilege WHERE user_id = $user_id AND privilege_id = $privilege_id";
        $result = $this->db->select($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function addUser($username, $password, $fullname, $Ngay_tao, $TTTK){
        $sql = "INSERT INTO user (username, password, fullname, Ngay_tao, TTTK) VALUES ('$username', '$password', '$fullname', '$Ngay_tao', '$TTTK')";
        $this->db->execute($sql);
    }
    public function editUser($id, $username, $password, $fullname, $Ngay_tao, $TTTK){
        $sql = "UPDATE user SET username = '$username', password = '$password', fullname = '$fullname', Ngay_tao = '$Ngay_tao', TTTK = '$TTTK' WHERE id = $id";
        $this->db->execute($sql);
    }
    public function deleteUser($id){
        $sql = "DELETE FROM user WHERE id = $id";
        $this->db->execute($sql);
    }
    public function editUserPrivilege($user_id, $privilege_id){
        $sql = "SELECT * FROM user_privilege WHERE user_id = $user_id AND privilege_id = $privilege_id";
        $result = $this->db->select($sql);
        if($result){
            $sql = "DELETE FROM user_privilege WHERE user_id = $user_id AND privilege_id = $privilege_id";
            $this->db->execute($sql);
        }else{
            $sql = "INSERT INTO user_privilege (user_id, privilege_id) VALUES ($user_id, $privilege_id)";
            $this->db->execute($sql);
        }
    }
}
?>