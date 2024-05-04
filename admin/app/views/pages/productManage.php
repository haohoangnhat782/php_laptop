<?php
    require_once 'app/views/pages/includes/header.php';
?>
<link rel="stylesheet" href="assets/css/button.css">
<!-- DataTales Example -->
<div class="card shadow mb-4" id="productManage">
    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
        <?php $checkdetail = 0; $checkedit = 0;
            if(isset($_SESSION['user_privilege'])){
                foreach ($_SESSION['user_privilege'] as $user_privilege) {
                    if($user_privilege['privilege_id'] == 15)
                    {
                        echo '<button type="button" class="btn btn-success" id="btnadd" >Thêm sản phẩm</button>';
                    }
                    if($user_privilege['privilege_id'] == 16)
                    {
                        $checkdetail = 1;
                    }
                    if($user_privilege['privilege_id'] == 17)
                    {
                        $checkedit = 1;
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
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['laptop'] as $laptop):  extract($laptop)?>
                    <tr>
                        <td><?php echo $id_san_pham; ?></td>
                        <td><img src="<?php echo 'images/' . $hinh_anh; ?>" alt="" width="200px" height="155px" ></td>
                        <td><?php echo $ten_san_pham; ?></td>
                        <td><?php echo $thong_tin_chung; ?></td>
                        <td><?php echo $don_gia; ?></td>
                        <td><?php echo $so_luong; ?></td>
                        <td>
                            <input type="hidden" name="id_san_pham" value="<?php echo $id_san_pham; ?>">
                            <?php
                                if($checkdetail == 1){
                                    echo '<button type="button" class="detailButton">Chi tiết</button>';
                                }
                                if($checkedit == 1){
                                    echo '<button type="button" class="editButton" data-toggle="modal" data-target="#exampleModal" data-id="'.$id_san_pham.'" id="btnedit">Sửa</button>';
                                }
                            ?>
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
<script>
$(document).ready(function() {
    $("#btnadd").click(function() {
        var data = $('#productManage');
        data.empty();
        $.ajax({
            url: 'app/views/pages/producManage/addProduct.php',
            type: 'GET',
            data: {
                danhmuc: JSON.stringify(<?php echo json_encode($data['danhmuc']) ?>)
            },
            success: function(response) {
                data.append(response);
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $(".detailButton").click(function() {
        var data = $('#productManage');
        data.empty();
        id_san_pham = $(this).siblings('input[name="id_san_pham"]').val();
        <?php foreach ($data['laptop'] as $laptop):  extract($laptop)?>
        if (id_san_pham == <?php echo $id_san_pham; ?>) {
            laptop = <?php echo json_encode($laptop); ?>;
        }
        <?php endforeach;?>
        $.ajax({
            url: 'app/views/pages/producManage/detailProduct.php',
            type: 'GET',
            data: {
                danhmuc: JSON.stringify(<?php echo json_encode($data['danhmuc']) ?>),
                laptop: JSON.stringify(laptop)
            },
            success: function(response) {
                data.append(response);
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $(".editButton").click(function() {
        var data = $('#productManage');
        data.empty();
        id_san_pham = $(this).siblings('input[name="id_san_pham"]').val();
        <?php foreach ($data['laptop'] as $laptop):  extract($laptop)?>
        if (id_san_pham == <?php echo $id_san_pham; ?>) {
            laptop = <?php echo json_encode($laptop); ?>;
        }
        <?php endforeach;?>
        $.ajax({
            url: 'app/views/pages/producManage/editProduct.php',
            type: 'GET',
            data: {
                danhmuc: JSON.stringify(<?php echo json_encode($data['danhmuc']) ?>),
                laptop: JSON.stringify(laptop)
            },
            success: function(response) {
                data.append(response);
            }
        });
    });
});
</script>

<?php
    require_once 'app/views/pages/includes/footer.php';
?>