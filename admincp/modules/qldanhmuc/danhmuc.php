<?php
$sql_danhmuc="SELECT * from danh_muc order by id_danh_muc Desc";
$query_danhmuc=mysqli_query($con,$sql_danhmuc)
    ?>
    <div class="main-content">
        <h1>Danh mục</h1>
        <div class="listing-items">
        <div class="content-top">
        <div class="sort-list">
        <label for="sort">Sắp xếp: </label>
    <select id="sort">
        <option value="ascending">Tăng dần</option>
        <option value="descending">Giảm dần</option>
    </select>
    </div>    
            <?php
             if (checkPrivilege('action=quanlydanhmuc&query=them')) {
           
                ?>
           
            <div class="buttons">
              <a href="?action=quanlydanhmuc&query=them">Thêm </a>
            </div>
            <?php } ?>
            </div>
    

            <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                  while($row=mysqli_fetch_array($query_danhmuc)){
                ?>
              
                <tr>
                <td><?= $i++ ?></td>
                    <td style="  text-align: center;"><?php echo $row['id_danh_muc'] ?></td>
                    <td><?php echo $row['ten_danh_muc'] ?></td>
             
                    <td style="  text-align: center;">
                    
                    <?php 
           if (checkPrivilege('action=quanlydanhmuc&query=sua&id='.$row['id_danh_muc'])) {
           
           ?>
                    <button class="btn bg-blue"><a href="?action=quanlydanhmuc&query=sua&id=<?php echo $row['id_danh_muc'] ?>"> <i class="fa-solid fa-pen-to-square"></i></i></a></button>
                    <?php }
           if (checkPrivilege('action=quanlydanhmuc&query=xoa&id='.$row['id_danh_muc'])) {
           
           ?>
                        <button class="btn bg-red"><a  href="modules/qldanhmuc/xuly.php?action=quanlydanhmuc&query=xoa&id=<?php echo $row['id_danh_muc'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                   <?php } ?>
                   
                    </td>
                   
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>


<!--             <ul id="list">
                <li class="listing-item-heading">
                    <div class="listing-prop listing-name"  style="width:301px;">Tên <?php echo ""; ?> </div>
                    <div class="listing-prop listing-button">
                        Xóa
                    </div>
                    <div class="listing-prop listing-button">
                        Sửa
                    </div>
                    <div class="listing-prop listing-button">
                        Copy
                    </div>
                    <div class="listing-prop listing-time">Ngày tạo</div>
                    <div class="listing-prop listing-time">Ngày cập nhật</div>



                    <div class="clear-both"></div>
                </li>

 -->
                <?php
                // if (!empty($menuTree)) {
                //     showMenuTree($menuTree, 0, $config_name);
                // }
                ?>
            </ul>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
?>