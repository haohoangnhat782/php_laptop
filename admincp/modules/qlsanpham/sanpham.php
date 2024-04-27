<?php
$sql_sanpham="SELECT * FROM san_pham,danh_muc where san_pham.ma_danh_muc=danh_muc.id_danh_muc order by trang_thai desc";
$query_sanpham=mysqli_query($con,$sql_sanpham);
    ?>
    <div class="main-content">
    <h1>Sản phẩm</h1>
    <div class="listing-items">
      <div class="content-top">
        <div class="sort-list">
        <label for="sort">Sắp xếp: </label>
    <select id="sort">
        <option value="ascending">Tăng dần</option>
        <option value="descending">Giảm dần</option>
    </select>
    </div>
    <?php if (checkPrivilege('action=quanlysanpham&query=them')) { ?>
            <div class="buttons">
              <a href="?action=quanlysanpham&query=them">Thêm </a>
            </div>
            <?php } ?>
            </div>
    


            <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Id</th>
                    <th>Hình ảnh</th>
                    <th>Tên </th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <!-- <th>Danh mục</th>
                    <th>CPU</th>
                    <th>Ram</th>
                    <th>Màn hình</th>
                    <th>Dung lượng pin</th>
                    <th>Thông tin chung</th> -->
                    <th>Tình trạng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            while($row = mysqli_fetch_array($query_sanpham)){ ?>
              
                <tr>
                    <td style="  text-align: center;"><?= $i++ ?> </td>
                    <td><?= $row['id_san_pham'] ?></td>
                    <td><img src="modules/qlsanpham/uploads/<?php echo $row['hinh_anh'] ?>" alt=""></td>
             <td>       <?php 
        $ten_san_pham = $row['ten_san_pham'];
        echo (strlen($ten_san_pham) > 40) ? substr($ten_san_pham, 0, 40) . '...' : $ten_san_pham;
    ?></td>
      
                    <td><?= $row['so_luong'] ?></td>
                    <td><?= $row['don_gia'] ?></td>
               
                    <!-- <td><?= $row['ten_danh_muc'] ?></td>
                    <td><?= $row['cpu'] ?></td>
                    <td><?= $row['ram'] ?></td>
                    <td><?= $row['man_hinh'] ?></td>
                    <td><?= $row['dung_luong_pin'] ?></td>
                    <td><?= $row['thong_tin_chung'] ?></td> -->

                    <td style="  text-align: center;">
            
                     <?php
                      if($row['trang_thai']==1){
                        
                      
                     ?>
                     <button class="btn bg-blue">Kích hoạt</button>
                     <?php 
            }else{
                     ?>
                      <button class="" style=" background-color: grey;">Ẩn</button>
                  <?php } ?>
                  </td>
              
                  <td style="  text-align: center;">
                  <?php if (checkPrivilege('action=quanlysanpham&query=xemchitiet&id='.$row['id_san_pham'])) { ?>
                  <button class="btn" style=" background-color: #42EC5C "><a href="?action=quanlysanpham&query=xemchitiet&id=<?php echo $row['id_san_pham'] ?>"><i class="fa-regular fa-eye"></i></a></button>
                  <?php }
                   if (checkPrivilege('action=quanlysanpham&query=sua&id='.$row['id_san_pham'])) {
                  ?>
                  <button class="btn bg-blue" style="  background-color: #0298cf;"><a href="?action=quanlysanpham&query=sua&id=<?php echo $row['id_san_pham'] ?>"> <i class="fa-solid fa-pen-to-square"></i></i></a></button>
                  <?php }
                   if (checkPrivilege('action=quanlysanpham&query=xoa&id='.$row['id_san_pham'])) {
                  ?>
                        <button class="btn bg-red" style=" background-color:  #f80000; "> <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id_san_pham']; ?>)"><i class="fa-solid fa-trash"></i></a></button>
                        <?php }
                   
                  ?>
                  
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
        if (confirm("Bạn có muốn xóa sản phẩm này không?")) {
            window.location.href = "modules/qlsanpham/xuly.php?action=quanlysanpham&query=xoa&id=" + Id;
        }
    }
</script>
    <?php

?>