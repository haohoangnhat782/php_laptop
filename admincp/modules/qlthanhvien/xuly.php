 <?php
 include("../../../connect_db.php");
           if(isset($_POST['save'])){           
           
                $data = $_POST;
                $insertString = "";
                $deleteOldPrivileges = mysqli_query($con, "DELETE FROM user_privilege WHERE user_id = '".$data['user_id']."'");
                foreach ($data['privileges'] as $insertPrivilege) {
                    $insertString .= !empty($insertString) ? "," : "";
                    $insertString .= "(NULL, " . $data['user_id'] . ", " . $insertPrivilege . ")";
                }
                $insertPrivilege = mysqli_query($con, "INSERT INTO `user_privilege` (`id`, `user_id`, `privilege_id`) VALUES " . $insertString);
                if(!$insertPrivilege){
                    $error = "Phân quyền không thành công. Xin thử lại";
                }
                header("Location:../../index.php?action=quanlythanhvien&query=hienthi");
                ?>
                <?php if(!empty($error)){ ?>
                    echo $error;
                <?php } else { ?>
                    Phân quyền thành công. <a href="member_listing.php">Quay lại danh sách thành viên</a>
                <?php } }
                else{

$hoten=$_POST['hoten'];
$tentaikhoan=$_POST['username'];
$pass=$_POST['password'];
$trangthai=$_POST['trangthai'];

if(isset($_POST['themthanhvien'])){
	$sql_them="INSERT INTO user(username,password,fullname,TTTK) VALUES('".$tentaikhoan."','".$pass."','".$hoten."','".$trangthai."')";
		mysqli_query($con,$sql_them);
		header('Location:../../index.php?action=quanlythanhvien&query=hienthi');
}
elseif (isset($_POST['suathanhvien'])) {
$sql_sua="UPDATE user SET username='".$tentaikhoan."',password='".$pass."',fullname='".$hoten."',TTTK='".$trangthai."' WHERE id='$_GET[id]'";
		mysqli_query($con,$sql_sua);
		header('Location:../../index.php?action=quanlythanhvien&query=hienthi');
}
else{
	
	$sql_xoa="DELETE FROM user WHERE id='$_GET[id]'";
		mysqli_query($con,$sql_xoa);
        header('Location:../../index.php?action=quanlythanhvien&query=hienthi');
}
                }
 ?>