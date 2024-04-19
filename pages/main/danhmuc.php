<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$so_sp = 8;
$offset = ($page - 1) * $so_sp;

$total_products_query = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM san_pham WHERE ma_danh_muc='$_GET[id]'");
$total_products = mysqli_fetch_assoc($total_products_query)['total'];

$total_pages = ceil($total_products / $so_sp);

$sql_dm = "SELECT * FROM danh_muc WHERE id_danh_muc='$_GET[id]' LIMIT 1 ";
$query_dm = mysqli_query($mysqli, $sql_dm);
$row_title = mysqli_fetch_array($query_dm);



?>

<div class="space body"></div>
<!----------------------------------Filer-product ------------------------------->
<div class="backgroud_color">

    <section class="filter-product-container  backgroud_color">

        <div class="container-product body">
            <div class="filter-product-content">

                <div class="filter-product-content-left">
                    <?php include('pages/main/sidebar/sidebar.php') ?>

                </div>
                <div class="filter-product-content-right">
                    <div class="container-filter-product">
                        <div class="product-filter-content">
                            <div class="product-filter-content-title">
                                <p>Danh mục sản phẩm:<?php echo $row_title['ten_danh_muc'] ?></p>


                            </div>
                            <div class="product-filter-content-product body">


                            </div>
                            <div class="pagination-container-filter">
                                <div class="pagination-filter">
                                    <a href="#">&laquo;</a>
                                    <?php
                                    // Giả sử $total_pages là tổng số trangư\
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<a href='index.php?quanly=danhmucsanpham&id=$_GET[id]&page=$i'>$i</a>";
                                    }
                                    ?>

                                    <a href="#">&raquo;</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </section>


</div>

<div class="clear"></div>
<script>
    $(document).ready(function() {


        $.ajax({
            url: 'pages/main/phantrang/phantrangtheodm.php',
            type: 'GET',
            data: {
                id: '<?php echo $_GET['id']; ?>',
                page: 1
            },
            success: function(response) {
                $(".product-filter-content-product ").html(response);
            }
        });

        $(".pagination-filter a").click(function(e) {
            e.preventDefault();

            $(".pagination-filter a").removeClass("active-filter");

            $(this).addClass("active-filter");

            var page = $(this).text();
            var currentPage = 1;

            if (page === "«") {
                if (currentPage > 1) {
                    currentPage--;
                } else {
                    currentPage = 1;
                }
            } else if (page === "»") {
                if (currentPage < <?php echo $total_pages; ?>) {
                    currentPage++;
                }
            } else {
                currentPage = parseInt(page);
            }

            $.ajax({
                url: 'pages/main/phantrang/phantrangtheodm.php',
                type: 'GET',
                data: {
                    id: '<?php echo $_GET['id']; ?>',
                    page: currentPage
                },
                success: function(response) {
                    $(".product-filter-content-product ").html(response);
                }
            });
        });
    });
</script>