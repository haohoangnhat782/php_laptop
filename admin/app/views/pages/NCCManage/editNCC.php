
<?php $NCC = json_decode($_GET['NCC'], true); ?>
<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
    <button type="button" class="btn btn-primary" id="edit-NCC">Sửa nhà cung cấp</button>
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
    
        <div class="col-md-5">
            <div class="form-group">
                <label for="ten_ncc" class="form-label" style="font-weight: bold;">Tên NCC</label>
                <input type="text" id="ten_ncc" name="ten_ncc" class="form-control"
                    placeholder="Nhập tên NCC" value="<?php echo $NCC['ten_ncc'] ?>">
            </div>
            <div class="form-group">
                <label for="sdt" class="form-label" style="font-weight: bold;">SĐT</label>
                <input type="text" id="sdt" name="sdt" class="form-control" placeholder="Nhập sdt"
                    value="<?php echo $NCC['sdt'] ?>">
            </div>
           
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label for="dia_chi" class="form-label" style="font-weight: bold;">Địa chỉ:</label>
                <textarea id="dia_chi" name="dia_chi"
                    class="form-control"><?php echo $NCC['dia_chi'] ?></textarea>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#edit-NCC").click(function(e) {
        ten_ncc = $("#ten_ncc");
        dia_chi = $("#dia_chi");
        sdt = $("#sdt")
        if (checkEmptyAndHighlight(ten_ncc) || checkEmptyAndHighlight(dia_chi) ||
            checkEmptyAndHighlight(sdt)) {
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        } else {
            if(!validatePhone(sdt.val())){
                    swal("Error", "Số điện thoại không hợp lệ số điện thoại 10 hoặc 11 số", "error");
                }else{
            $.ajax({
                url: "http://localhost/Project_Laptop/admin/NCCManage/edit_NCC",
                type: "POST",
                data: {
                    ma_ncc: <?php echo $NCC['ma_ncc'] ?>,
                    ten_ncc: $("#ten_ncc").val(),
                    dia_chi: $("#dia_chi").val(),
                    sdt: $("#sdt").val(),
                  
                },
                success: function(response) {                 
                    var result2 = JSON.parse(response);
                    if (result2.status == 'success') {
                        swal("Success", "Sửa thành công", "success")
                    }
                    if (result2.status == 'fail') {
                        swal("Fail", "Sửa thất bại", "error")
                    }                  
                }
            });
        }
        }

    });
});
</script>
<script>
$(document).ready(function() {
    $("input").on('input', function() {
        $(this).css('border', '1px solid #ced4da');
    });
   
});
</script>