	<?php
    if(isset($_GET['action']) && $_GET['query']){
        $tam=$_GET['action'];
        $query=$_GET['query'];
    }
    else{
        $tam='';
           $query='';
    }


    if($tam=='thongtin' && $query=='1'){

         include("modules/dashboard.php");
    }
    elseif($tam=='quanlydanhmuc' &&$query=='hienthi'){

         include("modules/qldanhmuc/danhmuc.php");
    }
     elseif($tam=='quanlydanhmuc' &&$query=='them'){

         include("modules/qldanhmuc/them.php");
    }
    elseif($tam=='quanlydanhmuc' &&$query=='sua'){

         include("modules/qldanhmuc/sua.php");
    }
  

    elseif ($tam=='quanlysanpham' &&$query=='hienthi'){
           include("modules/qlsanpham/sanpham.php");
       
    }
       elseif ($tam=='quanlysanpham' &&$query=='them'){
           include("modules/qlsanpham/them.php");
       
    }
       elseif ($tam=='quanlysanpham' &&$query=='sua'){
           include("modules/qlsanpham/sua.php");
       
    }
       elseif ($tam=='quanlysanpham' &&$query=='xoa'){
           include("modules/qlsanpham/xoa.php");
       
    }
    elseif ($tam=='quanlydonhang' &&$query=='hienthi'){
        
             include("modules/qldonhang/donhang.php");
       
    }
       elseif ($tam=='quanlydonhang' &&$query=='xemchitiet'){
        
             include("modules/qldonhang/xemchitiet.php");
       
    }
    elseif ($tam=='quanlythongke' &&$query=='hienthi'){
        include("modules/qlthongke/thongke.php");
    
 }
   elseif ($tam=='quanlythanhvien' &&$query=='hienthi'){
           include("modules/qlthanhvien/thanhvien.php");
       
    }
     elseif ($tam=='quanlythanhvien' &&$query=='them'){
           include("modules/qlthanhvien/them.php");
       
    }
     elseif ($tam=='quanlythanhvien' &&$query=='sua'){
           include("modules/qlthanhvien/sua.php");
       
    }
     elseif ($tam=='quanlythanhvien' &&$query=='xoa'){
           include("modules/qlthanhvien/xoa.php");
       
    }
     elseif ($tam=='quanlythanhvien' &&$query=='phanquyenn'){
           include("modules/qlthanhvien/phanquyen.php");
       
    }
  
    else{
        include("modules/dashboard.php");
    }

?>
