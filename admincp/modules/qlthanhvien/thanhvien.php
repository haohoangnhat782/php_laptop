
<?php
$id_userCrent= $_SESSION['current_user']['id'];
$sql_thanhvien ="SELECT * FROM user where id !='".$id_userCrent."' order by TTTK desc";
$result = mysqli_query($con, $sql_thanhvien);

 ?>
  
    <div class="main-content">
        <h1>Thanh vien</h1>
        <div class="listing-items">
      <div class="content-top">
        <div class="sort-list">
        <label for="sort">Sắp xếp: </label>
    <select id="sort">
        <option value="ascending">Tăng dần</option>
        <option value="descending">Giảm dần</option>
    </select>
    </div>
            <div class="buttons">
            <?php 
                   if (checkPrivilege('action=quanlythanhvien&query=them')) {
                  ?>

              <a href="?action=quanlythanhvien&query=them">Thêm </a>
              <?php }
               
                  ?>
            </div>
            </div>
    





<div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Tên tài khoản</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái </th>
                    <th>Phân quyền</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
             $i=1;
            while($row = mysqli_fetch_array($result)){ ?>
              
                <tr>
                <td><?= $i++ ?></td>
                    <td style="  text-align: center;"><?= $row['id'] ?> </td>
                    <td><?= $row['fullname'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['Ngay_tao'] ?></td>

                    <td style="  text-align: center;">
            
                     <?php
                      if($row['TTTK']==1){
                        
                      
                     ?>
                     <button class="btn-active bg-blue">Kích hoạt</button>
                     <?php 
            }else{
                     ?>
                      <button class="" style=" background-color: gray;">Ẩn</button>
                  <?php } ?>
                  </td>

             <td style="  text-align: center;">
             <?php 
                   if (checkPrivilege('action=quanlythanhvien&query=phanquyenn&id='.$row['id'])) {
                  ?>
              <button class="btn bg-blue"><a href="?action=quanlythanhvien&query=phanquyenn&id=<?=$row['id'] ?>"><i class="fa-solid fa-pen"></i></a>  </button>
            <?php } ?>
            </td>
                    <td style="  text-align: center;">
                    <?php 
                   if (checkPrivilege('action=quanlythanhvien&query=sua&id='.$row['id'])) {
                  ?>
                    <button class="btn bg-blue"><a href="?action=quanlythanhvien&query=sua&id=<?php echo $row['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i></i></a></button>
                    <?php  }
                   if (checkPrivilege('action=quanlythanhvien&query=xoa&id='.$row['id'])) {
                  ?>
                    <button class="btn bg-red"> <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)"><i class="fa-solid fa-trash"></i></a></button>
                  <?php } ?>
                
                </td>
                   
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>



            
            </ul>
            <div class="clear-both"></div>
        </div>
    </div>
    <script>
    function confirmDelete(userId) {
        if (confirm("Bạn có muốn xóa thành viên này không?")) {
            window.location.href = "modules/qlthanhvien/xuly.php?action=quanlythanhvien&query=xoa&id=" + userId;
        }
    }
</script>
