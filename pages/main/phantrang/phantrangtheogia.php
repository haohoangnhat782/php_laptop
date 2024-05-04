<?php
include("../../../config/config.php");
$gia = '';
if (isset($_GET['gia'])) {
    $gia = $_GET['gia'];
    // echo "Check gia inside: " . $gia . "<br>";
    $priceFilter = '';
    switch ($gia) {
        case 'below10ml':
            $priceFilter = 'don_gia < 10000000';
            break;
        case 'from10to15ml':
            $priceFilter = 'don_gia >= 10000000 AND don_gia <= 15000000';
            break;
        case 'from15to20ml':
            $priceFilter = 'don_gia >= 15000000 AND don_gia <= 20000000';
            break;

        case 'from20to25ml':
            $priceFilter = 'don_gia >= 20000000 AND don_gia <= 25000000';
            break;

        case 'above25ml':
            $priceFilter = 'don_gia > 25000000';
            break;
    }
}

$hang;
$brandFilter = '';
if (isset($_GET["hang"])) {
    if ($_GET["hang"] != null) {
        $hang = $_GET["hang"];
        for ($i = 0; $i < count($hang); $i++) {
            if ($i == 0) {
                $brandFilter .= "ten_danh_muc LIKE '%" . $hang[$i] . "%'";
            } else {
                $brandFilter .= " OR ten_danh_muc LIKE '%" . $hang[$i] . "%'";
            }
        }
        $sql_dm = "SELECT * FROM danh_muc WHERE " . $brandFilter;
        $query_dm = mysqli_query($mysqli, $sql_dm);

        $brandFilter = '';

        while ($row_dm = mysqli_fetch_array($query_dm)) {
            if ($brandFilter == '') {
                $brandFilter .= "ma_danh_muc LIKE '%" . $row_dm['id_danh_muc'] . "%'";
            } else {
                $brandFilter .= " OR ma_danh_muc LIKE '%" . $row_dm['id_danh_muc'] . "%'";
            }
        }

        // echo "Check has branch: " . $brandFilter . "<br>";
    }
}

// echo "Check none branch: " . $brandFilter . "<br>";

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$tukhoa = $_GET['tukhoa'];

$so_sp = 8;
$offset = ($page - 1) * $so_sp;

$baseQuery = "SELECT * FROM san_pham, danh_muc WHERE san_pham.ma_danh_muc = danh_muc.id_danh_muc and san_pham.trang_thai=1 AND san_pham.ten_san_pham like '%" . $tukhoa . "%'";
$priceFilterQuery = empty($priceFilter) ? "" : " AND " . "(" . $priceFilter . ")";
$brandFilterQuery = empty($brandFilter) ? "" : " AND " . "(" . $brandFilter . ")";
$baseOffsetQuery = " ORDER BY san_pham.id_san_pham DESC LIMIT $offset, $so_sp";

// echo "Check gia outside: " . $priceFilterQuery . "<br>";
// echo "Check hang outside: " . $brandFilterQuery . "<br>";

$sql_pro = $baseQuery . $priceFilterQuery . $brandFilterQuery . $baseOffsetQuery;
// echo "Check sql: " . $sql_pro . "<br>";

$query_sp = mysqli_query($mysqli, $sql_pro);
?>

<?php
while ($row = mysqli_fetch_array($query_sp)) {

?>
    <div class="product-filter-content-product-item">
        <a href="index.php?quanly=chitiet&id=<?php echo $row['id_san_pham']  ?>">
            <img src="admin/images/<?php echo $row['hinh_anh'] ?>" alt="">
            <div class="product-filter-content-product-item-text">
                <li>
                    <p class="title-item"><?php echo $row['ten_san_pham'] ?></p>

                    <div class="prices">

                        <p class="price">Giá: <?php echo number_format($row['don_gia'], 0,'.','.');  ?><sup>đ</sup></p>
                    </div>

                    <div class="information-container">
                        <p class="brand-item">Danh mục: <?php echo $row['ten_danh_muc'] ?></p>
                        <div class="information-item">

                            <p class="cpu-item">CPU: <?php echo $row['cpu'] ?></p>
                        </div>
                        <p class="ram-item">Ram: <?php echo $row['ram'] ?></p>
                    </div>

                </li>
            </div>
        </a>

    </div>
<?php
} ?>