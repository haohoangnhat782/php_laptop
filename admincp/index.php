<?php
   session_start();
   include("config/fuction.php");
  if(!isset($_SESSION['current_user'])) {
    header("Location:login.php"); 
      }
     // $regexResult = checkPrivilege(); //Kiểm tra quyền thành viên
     //    if (!$regexResult) {
     //        echo "Bạn không có quyền truy cập chức năng này";
     //        exit;
     //    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
 
</head>
<body>
<?php 
include("config/connect_db.php");

        include("modules/header.php");
         include("modules/menu1.php");
       include("modules/main.php");

      //  include("modules/footer.php");
?>
</body>
</html>