<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laptop Admin</title>

    <!-- Custom fonts for this template -->
    <link href="assets/bootstraps/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/bootstraps/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/bootstraps/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="http://localhost/Project_Laptop/admin/admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Laptop Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
              <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 23){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/NCCManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý nhà cung cấp</span></a>
            </li>
            <?php }
            } ?>
            


            <hr class="sidebar-divider my-0">
              <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 24){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/nhaphangManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý nhập hàng</span></a>
            </li>
            <?php }
            } ?>

<hr class="sidebar-divider my-0">
            <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 1){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/categoryManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý danh mục</span></a>
            </li>
            <?php }
            } ?>

            <hr class="sidebar-divider my-0">
            <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 2){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/productManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý sản phẩm</span></a>
            </li>
            <?php }
            } ?>
            <hr class="sidebar-divider my-0">
            <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 4){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/billManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý đơn hàng</span></a>
            </li>
            <?php }
            } ?>
    
         
             <hr class="sidebar-divider my-0">
            <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 19){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/customerManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý khách hàng</span></a>
            </li>
            <?php }
            } ?>
            
            <hr class="sidebar-divider my-0">
            <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 3){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/userManage">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quản lý thành viên</span></a>
            </li>
            <?php }
            } ?>
            <hr class="sidebar-divider my-0">
            <?php foreach ($_SESSION['user_privilege'] as $user_privilege) {
                if($user_privilege['privilege_id'] == 5){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Project_Laptop/admin/chart">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Thống kê</span></a>
            </li>
            <?php }
            } ?>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <h5><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['username']; ?></h5>
                                </span>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">