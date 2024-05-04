<?php
    require_once 'app/views/pages/includes/header.php';
?>
<link rel="stylesheet" href="assets/css/button.css">
<!-- DataTales Example -->
<div class="card shadow mb-4" id="nhaphangManage">
    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách nhập hàng</h6>
        <?php $checkdetail = 0; ;
            if(isset($_SESSION['user_privilege'])){
                foreach ($_SESSION['user_privilege'] as $user_privilege) {
                    if($user_privilege['privilege_id'] == 25)
                    {
                        echo ' <button type="button" class="btn btn-success" id="btnadd" >Nhập hàng</button>';
                    }
                    if($user_privilege['privilege_id'] == 37)
                    {
                        $checkdetail=1;
                    }
                    
                   
            }
        }
        ?>
       
        <!-- <button type="button" class="btn btn-success" id="btnadd" >Thêm sản phẩm</button> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>STT</th>
                        <th>Mã PN</th>
                        <th>Mã NCC</th>
                        <th>Mã Nhân viên</th>
                        <th>Ngày nhập</th>
                        <th>Tổng tiền</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>STT</th>
                    <th>Mã PN</th>
                        <th>Mã NCC</th>
                        <th>Mã Nhân viên</th>
                        <th>Ngày nhập</th>
                        <th>Tổng tiền</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $i=0;
                     foreach ($data['phieunhap'] as $phieunhap):  extract($phieunhap)?>
                    <tr>
                     
                          <td><?php echo      $i+=1; ?></td>
                        <td><?php  echo $ma_pn; ?></td>
                        <?php
        foreach ($data['NCC'] as $NCC):  
            if ($NCC['ma_ncc'] == $ma_ncc) {
                echo "<td>{$NCC['ma_ncc']} - {$NCC['ten_ncc']}</td>";
            }
        endforeach;
    ?>
                          <?php
        foreach ($data['user'] as $user):  
            if ($user['id'] == $ma_NV) {
                echo "<td>{$user['id']} - {$user['fullname']}</td>";
            }
        endforeach;
    ?>
                        <td><?php echo $ngay_nhap; ?></td>
                        <td><?php echo number_format($tong_tien, 0, ',', '.')?></td>
                 
                        <td>
                            <!-- <input type="hidden" name="ma_ncc" value="<?php echo $ma_ncc; ?>"> -->
                           <?php
                             if ($checkdetail == 1) {
                                echo '<button type="button" class="detailButton" data-id="' . $ma_pn . '">Chi tiết</button>';
                            }
                             ?> 
                             <!-- <button type="button" class="detailButton">Chi tiết</button> -->
                             <!-- <button type="button" class="editButton"  data-id=<?php echo $ma_ncc; ?> id="btnedit">Sửa</button>
                             <button type="button" class="delButton" id="btndelete" data-id="<?php echo $ma_ncc; ?>">Xóa</button> -->
                            <!-- <button type="button" class='detailButton'>Chi tiết</button>
                            <button type="button" class="editButton" data-toggle="modal" data-target="#exampleModal"
                                data-id="<?php echo $id_don_hang; ?>" id="btnedit">Sửa</button> -->
                              
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#btnadd").click(function() {
        var data = $('#nhaphangManage');
        data.empty();
        $.ajax({
            url: 'app/views/pages/nhaphangManage/addnhaphang.php',
            type: 'GET',
            data: {
                laptop: JSON.stringify(<?php echo json_encode($data['laptop']) ?>),
       
                chitiet: JSON.stringify(<?php echo json_encode($data['chitiet']) ?>),
                NCC: JSON.stringify(<?php echo json_encode($data['NCC']) ?>)
            },
            success: function(response) {
                data.append(response);
            }
        });
    });
});
</script>
 <script>
    $(document).ready(function(){
        $(".detailButton").click(function(){
            var data = $('#nhaphangManage');
            data.empty();
            var id = $(this).data('id');
            <?php foreach ($data['phieunhap'] as $phieunhap):  extract($phieunhap)?>
            if (id == <?php echo $ma_pn; ?>) {
                phieunhap = <?php echo json_encode($phieunhap); ?>;
            }
            <?php endforeach;?>
            let chitiet = [];
        let laptop = [];
        <?php foreach ($data['chitiet'] as $chitiet):  extract($chitiet)?>
        if (id == <?php echo $ma_phieu_nhap; ?>) {
            chitiet.push(<?php echo json_encode($chitiet);?>);
            <?php foreach ($data['laptop'] as $laptop):  extract($laptop)?>
            if (<?php echo $id_san_pham; ?> == <?php echo $ma_san_pham; ?>) {
                laptop.push(<?php echo json_encode($laptop); ?>);
            }
            <?php endforeach;?>
        }
        <?php endforeach;?>
            $.ajax({
                url: 'app/views/pages/nhaphangManage/detailnhaphang.php',
                type: 'GET',
                data: {
                    phieunhap: JSON.stringify(phieunhap),
          
           
                user: JSON.stringify(<?php echo json_encode($data['user']) ?>),
        
                NCC: JSON.stringify(<?php echo json_encode($data['NCC']) ?>),

                chitiet: JSON.stringify(chitiet),
                laptop: JSON.stringify(laptop)
                },
                success: function(response) {
                    data.append(response);
                }
            });
        });
    });
</script>
<!--
<script>
    $(document).ready(function(){
        $(".delButton").click(function(){
            var id = $(this).data('id');
            swal({
                title: "Xác nhận",
                text: "Bạn có chắc chắn muốn xóa?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'http://localhost/admin/NCCManage/delete_NCC',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            if (data.status == 'success') {
                                swal("Success", "Xóa thành công", "success")
                                .then((value) => {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    });
</script> -->
<?php
    require_once 'app/views/pages/includes/footer.php';
?>