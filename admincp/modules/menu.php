 
  <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                        <div class="menu-heading">Admin Menu</div>
                        <div class="menu-items">
                            <ul>
                                <li><a href="index.php?action=thongtin&&query=1">Dashboard</a></li>
                                  <?php if (checkPrivilege('action=quanlydanhmuc&&query=hienthi')) { ?>
                                    <li><a href="index.php?action=quanlydanhmuc&&query=hienthi">Danh mục</a></li>
                            <?php } ?>
                                 
                           <?php if (checkPrivilege('action=quanlysanpham&&query=hienthi')) { ?>
                                    <li><a href="index.php?action=quanlysanpham&&query=hienthi">Sản phẩm</a></li>
                            <?php } ?>
                                    <li><a href="index.php?action=quanlydonhang&&query=hienthi">Đơn hàng</a></li>
                   
                                    <li><a href="?action=quanlythanhvien&&query=hienthi">Quản lý thành viên và phân quyền</a></li>
        
                            </ul>
                        </div>
                    </div>