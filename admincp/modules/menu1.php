 
  <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                    <div class="left-content">
     
     <div class="sidebar">
       <div class="logo">
       <i class='bx bxs-user menu-icon'></i>
         <span class="logo-name">  <?php echo $_SESSION['current_user']['fullname'] ?> </span>
       </div>
 
       <div class="sidebar-content">
         
         <ul class="lists">
           <li class="list">
             <a href="index.php?action=thongtin&&query=1" class="nav-link">
             <i class='bx bxs-dashboard icon'></i>
               <span class="link">Dashboard</span>
             </a>
           </li>
           <?php if (checkPrivilege('action=quanlydanhmuc&&query=hienthi')) { ?>
           <li class="list">
             <a href="index.php?action=quanlydanhmuc&&query=hienthi" class="nav-link">
             <i class='bx bx-category icon'></i>
               <span class="link">Danh mục</span>
             </a>
           </li>
           <?php } ?>
           <?php if (checkPrivilege('action=quanlysanpham&&query=hienthi')) { ?>
           <li class="list">
             <a href="index.php?action=quanlysanpham&&query=hienthi" class="nav-link">
             <i class='bx bx-laptop icon'></i>
               <span class="link">Sản phẩm</span>
             </a>
           </li>
           <?php }
           if (checkPrivilege('action=quanlydonhang&&query=hienthi')) {
           
           ?>
           <li class="list">
             <a href="index.php?action=quanlydonhang&&query=hienthi" class="nav-link">
             <i class="fa-solid fa-cart-shopping icon"></i>
               <span class="link">Đơn hàng</span>
             </a>
           </li>
           <?php }
           if (checkPrivilege('action=quanlythongke&&query=hienthi')) {
           
           ?>
           <li class="list">
             <a href="index.php?action=quanlythongke&&query=hienthi" class="nav-link">
             <i class="fa-solid fa-chart-simple icon"></i>
               <span class="link">Thống kê</span>
             </a>
           </li>
           <?php }
           if (checkPrivilege('action=quanlythanhvien&&query=hienthi')) {
           
           ?>
           <li class="list">
             <a href="index.php?action=quanlythanhvien&&query=hienthi" class="nav-link">
             <i class='bx bxs-user-circle icon'></i>
               <span class="link">Thành viên và phân quyền</span>
             </a>
           </li>
           <?php }
        
           
           ?>
         </ul>
         <div class="line_border"></div>
         <div class="bottom-cotent">
           <li class="list">
             <a href="#" class="nav-link">
               <i class="bx bx-cog icon"></i>
               <span class="link">Settings</span>
             </a>
           </li>
           <li class="list">
             <a href="logout.php" class="nav-link">
               <i class="bx bx-log-out icon"></i>
               <span class="link">Logout</span>
             </a>
           </li>
         </div>
       </div>
     </div>
   </div>
                    </div>