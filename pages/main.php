<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php echo "<link rel='stylesheet' type='text/css' href='css/styleIndex1.css' />"; ?>
    <script defer src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>


<body>
    <?php
    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }

    if (isset($_GET[''])) {
        include('pages/main/index.php');
    }


    if (isset($_POST['ten_truong'])) {
        $gia_tri = $_POST['ten_truong'];
    } else {
        
    }


    if ($tam == 'trangchu') {
        include('pages/main/index.php');
    } elseif ($tam == 'sanphamall') {
        include('main/filter_product.php');
    } elseif ($tam == 'chitiet') {
        include('pages/main/product.php');  
    } elseif ($tam == 'giohang') {
        include('pages/main/cart.php');        
    } elseif ($tam == 'authenticate') {
        include('pages/main/Authenticate/authenticate.php');
    } elseif ($tam == 'profile') {
        include('pages/main/Profile/profile.php');
    } 
    elseif($tam=='danhmucsanpham'){
        include("main/danhmuc.php");
    }  elseif($tam=='timkiem'){
        include("main/timkiem.php");
    } 
    else {
        include('pages/main/index.php');
    } 


    ?>
</body>