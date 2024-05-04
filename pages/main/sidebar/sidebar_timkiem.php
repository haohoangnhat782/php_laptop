<?php

$sql_dm = "SELECT * FROM danh_muc";
$query_dm = mysqli_query($mysqli, $sql_dm);

?>

<div class="filter-product-brand">
  <p>Danh mục</p>
  <div class="filter-product-content">
    <div class="fitler-product-content-item">

      <?php while ($row = mysqli_fetch_array($query_dm)) { ?>
        <div class="item-brand-filter">
          <input id="<?php echo $row['ten_danh_muc'] ?>" type="checkbox" name="branch">
          <label for="<?php echo $row['ten_danh_muc'] ?>">
            <p style="font-color=black"> <?php echo $row['ten_danh_muc'] ?></p>
          </label><br>
        </div>

      <?php } ?>




    </div>

  </div>
</div>

<!-- <div class="filter-product-brand">
                        <p>Ram</p>
                        <div class="filter-product-content">
                            <div class="fitler-product-content-item">
                             
                              <div class="item-brand-filter">
                                <input type="checkbox"  name="4gb" >
                                <label for="4gb"> 4gb</label><br>
                              </div>
                              <div class="item-brand-filter">
                                <input type="checkbox"  name="8gb" >
                                <label for="8gb"> 8gb</label><br>
                              </div>
                              <div class="item-brand-filter">
                                <input type="checkbox"  name="16gb" >
                                <label for="16gb"> 16gb</label><br>
                              </div>
                              <div class="item-brand-filter">
                                <input type="checkbox"  name="32gb" >
                                <label for="32gb"> 32gb</label><br>
                              </div>
                                

                                
                              </div>
    
                            </div>
                        </div>

                        <div class="filter-product-Onerow">
                          <p>CPU</p>
                          <div class="filter-product-content-Onerow">
                              <div class="fitler-product-content-item-Onerow">
                               
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="Intel celeron" >
                                      <label for="Intel celeron"> Intel celeron</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="8gb" >
                                      <label for="8gb"> Intel pentium</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="16gb" >
                                      <label for="16gb"> Intel core i3</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="32gb" >
                                      <label for="32gb"> Intel core i5</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="32gb" >
                                      <label for="32gb"> Intel core i7</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="32gb" >
                                      <label for="32gb"> Amd ryzen 5</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="32gb" >
                                      <label for="32gb"> Amd ryzen 5</label><br>
                                    </div>
                                    <div class="item-brand-filter-Onerow">
                                      <input type="checkbox"  name="32gb" >
                                      <label for="32gb"> Amd ryzen 7</label><br>
                                    </div>
                            
                                </div>
      
                              </div>
                          </div> -->
<div class="filter-product-Onerow">
  <p>Mức giá</p>
  <div class="filter-product-content-Onerow">
    <div class="fitler-product-content-item-Onerow">
      <div class="item-brand-filter-Onerow item-price-filter">
        <input type="radio" name="price" id="below10ml">
        <label for="below10ml"> Dưới 10 triệu</label><br>
      </div>
      <div class="item-brand-filter-Onerow item-price-filter">
        <input type="radio" name="price" id="from10to15ml">
        <label for="from10to15ml"> Từ 10 - 15 triệu</label><br>
      </div>
      <div class="item-brand-filter-Onerow item-price-filter">
        <input type="radio" name="price" id="from15to20ml">
        <label for="from15to20ml"> Từ 15 - 20 triệu</label><br>
      </div>
      <div class="item-brand-filter-Onerow item-price-filter">
        <input type="radio" name="price" id="from20to25ml">
        <label for="from20to25ml">Từ 20 - 25 triệu</label><br>
      </div>
      <div class="item-brand-filter-Onerow item-price-filter">
        <input type="radio" name="price" id="above25ml">
        <label for="above25ml"> Trên 25 triệu</label><br>
      </div>
    </div>

  </div>
</div>