<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$so_sp = 8;
$offset = ($page - 1) * $so_sp;
if (isset($_GET['quanly']) && $_GET['quanly'] == 'timkiem') {
    $tukhoa = $_GET['tukhoa'];
} else {
    $tukhoa = '';
}
$total_products_query = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM san_pham,danh_muc where san_pham.ma_danh_muc=danh_muc.id_danh_muc and san_pham.ten_san_pham like '%" . $tukhoa . "%'  ");
$total_products = mysqli_fetch_assoc($total_products_query)['total'];

$total_pages = ceil($total_products / $so_sp);



?>

<div class="space body"></div>
<!----------------------------------Filer-product ------------------------------->
<div class="backgroud_color">

    <section class="filter-product-container  backgroud_color">

        <div class="container-product body">
            <div class="filter-product-content">

                <div class="filter-product-content-left">
                    <?php include('pages/main/sidebar/sidebar_timkiem.php') ?>

                </div>
                <div class="filter-product-content-right">
                    <div class="container-filter-product">
                        <div class="product-filter-content">
                            <div class="product-filter-content-title">
                                <p>Tìm kiếm: <?php echo $tukhoa ?></p>


                            </div>
                            <div class="product-filter-content-product body">


                            </div>
                            <div class="pagination-container-filter">
                                <div class="pagination-filter">
                                    <a href="#">&laquo;</a>
                                    <?php
                                    // Giả sử $total_pages là tổng số trangư\
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<a href='index.php?quanly=sanphamall&page=$i'>$i</a>";
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
            url: 'pages/main/phantrang/sanphamtimkiem.php',
            type: 'GET',
            data: {
                tukhoa: '<?php echo $tukhoa; ?>',
                page: 1
            },
            success: function(response) {
                $(".product-filter-content-product ").html(response);
            }
        });

        var currentPage = 1;
        $(".pagination-filter a").click(function(e) {
            e.preventDefault();

            $(".pagination-filter a").removeClass("active-filter");

            $(this).addClass("active-filter");

            var page = $(this).text();

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
                url: 'pages/main/phantrang/sanphamtimkiem.php',
                type: 'GET',
                data: {
                    tukhoa: '<?php echo $tukhoa; ?>',
                    page: currentPage
                },
                success: function(response) {
                    $(".product-filter-content-product ").html(response);
                }
            });

            $.ajax({
                url: 'pages/main/phantrang/phantrangtheogia.php',
                type: 'GET',
                data: {
                    tukhoa: '<?php echo $tukhoa; ?>',
                    page: currentPage,
                    hang: getSelectedCheckboxIds(),
                    gia: getSelectedRadioButtonId()
                },
                success: function(data) {
                    $('.product-filter-content-product').html(data);
                }
            })
        });

        function updateURL(selectedFilters, type) {
            let baseURL = 'index.php';
            let currentURL = new URL(window.location.href);
            let params = currentURL.searchParams;

            // Set base parameters
            params.set('quanly', 'timkiem');
            params.set('tukhoa', '<?php echo $tukhoa; ?>');

            // Handle branch filter
            if (type === 'branch') {
                if (selectedFilters && selectedFilters.length > 0) {
                    params.set('hang', selectedFilters.join(','));
                } else {
                    params.delete('hang');
                }
            }

            // Handle price filter
            if (type === 'price') {
                if (selectedFilters) {
                    params.set('gia', selectedFilters);
                } else {
                    params.delete('gia');
                }
            }

            // Reconstruct the URL with updated parameters
            let newURL = baseURL + '?' + params.toString();

            // Replace encoded commas with actual commas
            newURL = newURL.replace(/%2C/g, ',');

            // Update the URL in the browser without reloading the page
            history.pushState(null, null, newURL);
        }

        // Function to get IDs of selected checkboxes
        function getSelectedRadioButtonId() {
            const selectedRadioButton = $('.item-price-filter input[type="radio"]:checked');
            if (selectedRadioButton.length > 0) {
                return selectedRadioButton.attr('id');
            } else {
                return null;
            }
        }

        function getSelectedCheckboxIds() {
            const selectedCheckboxes = $('.item-brand-filter input[type="checkbox"]:checked');
            if (selectedCheckboxes.length > 0) {
                return selectedCheckboxes.map(function() {
                    return this.id;
                }).get();
            } else {
                return null;
            }
        }

        $('.item-price-filter input[type="radio"][name="price"]').on('change', function() {
            const selectedRadioButton = getSelectedRadioButtonId();
            updateURL(selectedRadioButton, 'price');
        });

        $('.item-brand-filter input[type="checkbox"][name="branch"]').on('change', function() {
            const selectedCheckboxButtons = getSelectedCheckboxIds();
            updateURL(selectedCheckboxButtons, 'branch');
        });

        $('.item-brand-filter input[type="checkbox"]').click(function() {
            const selectedRadioButton = getSelectedRadioButtonId();
            const selectedCheckboxButtons = getSelectedCheckboxIds();

            $.ajax({
                url: 'pages/main/phantrang/phantrangtheogia.php',
                type: 'GET',
                data: {
                    tukhoa: '<?php echo $tukhoa; ?>',
                    page: currentPage,
                    hang: selectedCheckboxButtons,
                    gia: selectedRadioButton
                },
                success: function(data) {
                    $('.product-filter-content-product').html(data);
                }
            });
        })

        $('.item-price-filter input[type="radio"]').click(function() {
            const selectedRadioButton = getSelectedRadioButtonId();
            const selectedCheckboxButtons = getSelectedCheckboxIds();

            $.ajax({
                url: 'pages/main/phantrang/phantrangtheogia.php',
                type: 'GET',
                data: {
                    tukhoa: '<?php echo $tukhoa; ?>',
                    page: currentPage,
                    hang: selectedCheckboxButtons,
                    gia: selectedRadioButton
                },
                success: function(data) {
                    $('.product-filter-content-product').html(data);
                }
            });
        });
    });
</script>