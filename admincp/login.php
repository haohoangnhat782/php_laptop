<?php
include("../connect_db.php");
session_start();


if (isset($_POST['dangnhap'])){
    $taikhoan=$_POST['username'];
    $matkhau=$_POST['password'];
    $sql="SELECT * FROM user where username='$taikhoan' AND password='$matkhau' and TTTK=1  LIMIT 1";

    $row=mysqli_query($con ,$sql);
    $user=mysqli_fetch_array($row);

    if ($user>0) {
                    $id=$user['id'];
                   $userPrivileges = mysqli_query($con, "SELECT * FROM `user_privilege` INNER JOIN `privilege` ON user_privilege.privilege_id = privilege.id WHERE user_privilege.user_id ='".$id."' ");
        $userPrivileges = mysqli_fetch_all($userPrivileges, MYSQLI_ASSOC);
                if(!empty($userPrivileges)){
                    $user['privileges'] = array();
                    foreach($userPrivileges as $privilege){
                        $user['privileges'][] = $privilege['url_match'];
                    }
                }

    $_SESSION['current_user'] = $user;
        
        header('Location: index.php');
        exit;
    } else{
            // echo ' <scrip> Tài khoản hoặc mật khẩu không đúng.Mời nhập lại </scrip> ';
            echo "<script>alert('Tài khoản hoặc mật khẩu không đúng.Mời nhập lại ');</script>";
                // header("Location:login.php");
        }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin-Laptop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .box-content {
            margin: 0 auto;
            width: 800px;
            border: 1px solid #ccc;
            text-align: center;
            padding: 20px;
        }

        #user_login form {
            width: 200px;
            margin: 40px auto;
        }

        #user_login form input {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div id="user_login" class="box-content">
    <h1>Đăng nhập tài khoản</h1>
    <form  method="post" autocomplete="off">
        <label>Username</label><br>
        <input type="text" name="username" value=""><br>
        <label>Password</label><br>
        <input type="password" name="password" value=""><br><br>
        <input type="submit" name="dangnhap" value="Đăng nhập">
    </form>
</div>
</body>
</html>
