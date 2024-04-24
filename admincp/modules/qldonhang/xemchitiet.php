<?php
$sql_donhang="SELECT * FROM chi_tiet_don_hang where ma_don_hang='$_GET[id]'";
$query_donhang=mysqli_query($con,$sql_donhang);


    ?>
    <div class="main-content">
    <h1>Xem chi tiết đơn hàng </h1>
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
                    <th>Mã sản phẩm</th>
                    <th>số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
               
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            $tong=0;
            while($row = mysqli_fetch_array($query_donhang)){ 
                $tong += $row['so_luong']* $row['don_gia'];
                ?>
           
                <tr>
                    
                    <td style="  text-align: center;"><?= $i++ ?> </td>
                    <td><?= $row['ma_don_hang'] ?></td>
                    <td><?= $row['ma_san_pham'] ?></td>
                    <td><?= $row['so_luong'] ?></td>
                    <td><?= $row['don_gia'] ?></td>
                    <td><?php echo number_format($row['so_luong']* $row['don_gia'],0,',','.') ?></td>
                 
                   
                </tr>
                
                <?php }?>
               
            </tbody>
        </table>
    </div>
      <div class="total" >
        <p>Tổng tiền : <?php echo number_format($tong,0,',','.') ?></p>
      </div>


            <div class="clear-both"></div>
        </div>
    </div>
    <?php

?>