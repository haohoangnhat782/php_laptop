<?php session_start(); ?>

    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Nhập hàng</h6>
        <button  type="button" class="btn btn-success" id="add-nhaphang">Nhập hàng</button>
    </div>
    <div class="container p-3">
        <div class="row d-flex justify-content-center">

        <div class="col-md-5">
        <div class="form-group">
                <label for="ma_pn" class="form-label" style="font-weight: bold;">Mã phiếu nhập</label>
                <input  type="text" id="ma_pn" name="ma_pn" class="form-control" placeholder="Nhập mã PN"
                disabled >
            </div>
          
            
       
                
                <div class="form-group">
                    <label for="ma_NV" class="form-label" style="font-weight: bold;">Mã nhân viên:</label>
                    <input readonly type="text" id="ma_NV" name="ma_NV" value="<?php echo $_SESSION['user']['id'] ?>" class="form-control" placeholder="Nhập SĐT">
                </div>
                <div class="form-group">
                <label for="ma_NCC" class="form-label" style="font-weight: bold;">Mã nhà cung cấp</label>
                <select  class="form-control" id="ma_NCC">
                    <?php $NCC = json_decode($_GET['NCC'], true);
                     foreach ($NCC as $item): 
                       ?>
                    <option ><?php
               
                     echo $item['ma_ncc'].'-'.$item['ten_ncc']; ?></option>

                    <?php  endforeach ?>
                </select>
            </div>
              
                <div class="form-group">
                <label for="ma_NCC" class="form-label" style="font-weight: bold;">Mã sản phẩm</label>
                <select  class="form-control" id="id_san_pham">
                    <?php $laptop = json_decode($_GET['laptop'], true);
                     foreach ($laptop as $item): 
                       ?>
                    <option ><?php
               
                     echo $item['id_san_pham'].'-'.$item['ten_san_pham']; ?></option>

                    <?php  endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="don_gia" class="form-label" style="font-weight: bold;">Giá:</label>
                <input type="text" id="don_gia" name="don_gia" class="form-control" placeholder="Nhập giá SP"
                   >
            </div>
            <div class="form-group">
                <label for="so_luong" class="form-label" style="font-weight: bold;">Số lượng</label>
                <input type="text" id="so_luong" name="so_luong" class="form-control" placeholder="Nhập số lượng"
                   >
            </div>
            <div class="form-group">
                <label for="Ngay_tao" class="form-label" style="font-weight: bold;">Ngày tạo</label>
                <input type="text" readonly id="Ngay_tao" name="Ngay_tao" class="form-control" placeholder="Nhập số lượng"
                   >
            </div>
          
          
              
              
            
        </div>
     
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#add-nhaphang").click(function(e) {
        ma_pn= $("#ma_pn");
        ma_NCC = $("#ma_NCC");
        ma_NV = $("#ma_NV");
        id_san_pham= $("#id_san_pham");
        don_gia= $("#don_gia");
        so_luong= $("#so_luong");
        
        if(checkEmptyAndHighlight(ma_pn) || checkEmptyAndHighlight(ma_NCC) || checkEmptyAndHighlight(ma_NV) || checkEmptyAndHighlight(id_san_pham) || checkEmptyAndHighlight(don_gia) || checkEmptyAndHighlight(so_luong)){
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        }else{
            if (checkNegativeNumber(so_luong) || checkNegativeNumber(don_gia)) {
                    swal("Error", "Số lượng và giá không được âm", "error");
                    return;
                } else {
                    $.ajax({
                        url: "http://localhost/Project_Laptop/admin/nhaphangManage/add_nhaphang",
                        type: "POST",
                        data: {
                            ma_pn: ma_pn.val(),
                            ma_NCC: ma_NCC.val(),
                            ma_NV: ma_NV.val(),
                            id_san_pham: id_san_pham.val(),
                            so_luong: so_luong.val(),
                            don_gia: don_gia.val(),
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status == 'success') {
                                swal("Success", "Thêm thành công", "success")
                                $("#ma_pn").val(generateRandomCode());
                                $("#ma_NCC").val("");
                           
                                $("#id_san_pham").val("");
                                $("#so_luong").val("");
                                $("#don_gia").val("");
                            }
                            if (result.status == 'failusername') {
                                swal("Fail", "ID đã tồn tại", "error")
                            }
                            if (result.status == 'fail') {
                                swal("Fail", "Thêm thất bại", "error")
                            }
                        }
                    });
                }
                
            
        }
        
    });
});
</script>
<!-- <script>
$(document).ready(function() {
    $("#add-nhaphang").click(function(e) {
        ma_NCC = $("#ma_NCC");
        ma_NV = $("#ma_NV");
        id_san_pham= $("#id_san_pham");
        don_gia= $("#don_gia");
        so_luong= $("#so_luong");
     
       
        if( checkEmptyAndHighlight(don_gia) || checkEmptyAndHighlight(so_luong) ) {
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        }else{
            $.ajax({
                url: "http://localhost/admin/nhaphangManage/add_nhaphang",
                type: "POST",
                data: {
                    ma_pn:$("#ma_pn").val(),
                    ma_NCC: $("#ma_NCC").val(),
                    ma_NV: $("#ma_NV").val(),
                    so_luong: $("#so_luong").val(),
                    don_gia: $("#don_gia").val(),
                    id_san_pham: $("#id_san_pham").val()
                  
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status == 'success') {
                        swal("Success", "Thêm thành công", "success")
                    }
                    if (result.status == 'fail') {
                        swal("Fail", "Thêm thất bại", "error")
                    }
                }
            });
        }
        
    });
});
</script> -->
<script>
    $(document).ready(function(){
        $("input").on('input', function(){
            $(this).css('border', '1px solid #ced4da');
        });
      
    });
</script>
<script>
    var randomCode = generateRandomCode();
    $("#ma_pn").val(randomCode);

    function generateRandomCode() {
        var code = "";
        var characters = "0123456789";
        var length = 6;

        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            code += characters.charAt(randomIndex);
        }

        return code;
    }
    document.getElementById('Ngay_tao').value = new Date().toISOString().slice(0, 10);
    $(document).ready(function() {
        $("input").on('input', function() {
            $(this).css('border', '1px solid #ced4da');
        });
    });
</script>