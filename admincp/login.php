
<?php
include("config/connect_db.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login">
        <form  method="post" autocomplete="off">
        <h2>Login</h2>
        <br>
    <p>Username: </p>
    <br>
    <input type="text" name="username" placeholder="Enter Username">
    <br>
    <p>Password:</p>
    <br>
    <input type="password"  name="password" placeholder="Enter Password" >
    <br>
    <button type="submit" name="dangnhap">Login</button>
    </form>
    </div>
</body>
</html>