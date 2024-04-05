
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$so_sp = 8;
$offset = ($page - 1) * $so_sp;
if(isset($_POST['timkiem'])){
	$tukhoa=$_POST['tukhoa'];
}else{
	$tukhoa='';
}
$total_products_query = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM san_pham,danh_muc where san_pham.ma_danh_muc=danh_muc.id and san_pham.ten_san_pham like '%".$tukhoa."%'  ");
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
    });
});
</script>
