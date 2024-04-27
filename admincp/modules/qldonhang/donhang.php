<?php
$sql_donhang="SELECT * FROM don_hang order by trang_thai_don_hang desc";
$query_donhang=mysqli_query($con,$sql_donhang);


    ?>
    <div class="main-content">
    <h1>Đơn hàng</h1>
        <div class="listing-items">
        <div class="content-top">
        
           <p> </p>
            </div>
    


            <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã khách hàng</th>
                    <th>Họ và tên</th>
                    <th>Địa chỉ</th>
                    <th>SĐT</th>
                    <th>Tình trạng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            while($row = mysqli_fetch_array($query_donhang)){ ?>
              
                <tr>
                    <td style="  text-align: center;"><?= $i++ ?> </td>
                    <td><?= $row['id_don_hang'] ?></td>
                    <td><?= $row['ma_nguoi_dat'] ?></td>
                    <td><?= $row['ho_ten_nguoi_nhan'] ?></td>
                    <td><?= $row['dia_chi_nhan'] ?></td>
                    <td><?= $row['sdt_nhan_hang'] ?></td>

                    <td style="  text-align: center;">
            
                     <?php
                      if($row['trang_thai_don_hang']==1){
                        
                    
                        if (checkPrivilege('set_trang_thai=0&id_don_hang='.$row['id_don_hang'])) {
                      
                           
                      
                     ?>

                     <button class="btn bg-blue"><a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id_don_hang'] ?>)">Đơn hàng mới</a></button>
                   <?php } else {
                    ?>
                           <button class="btn bg-blue"><a >Đơn hàng mới</a></button>
                   
                   <?php 
           } }else{
                     ?>
                      <button class="" style=" background-color: grey;">Đã xử lí</button>
                  <?php } ?>
                  </td>
          
                    <td style="  text-align: center;"> 
          <?php if (checkPrivilege('action=quanlydonhang&query=xemchitiet&id='.$row['id_don_hang'])) { ?>
                           
                        <button class="btn bg-blue">
                            <!-- //<a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id_san_pham']; ?>)"> -->
                        <a href="?action=quanlydonhang&query=xemchitiet&id=<?php echo $row['id_don_hang'] ?>">Xem chi tiết</a></button>
                    <?php } ?>
                    
                    </td>
                   
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


            <div class="clear-both"></div>
        </div>
    </div>
    <script>
    function confirmDelete(Id) {
        if (confirm("Xác nhận duyệt đơn hàng  này không?")) {
            window.location.href = "modules/qldonhang/xuly.php?set_trang_thai=0&id_don_hang=" + Id;
        }
    }
</script>
    <?php

?>