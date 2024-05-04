

    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm nhà cung cấp</h6>
        <button type="button" class="btn btn-success" id="add-NCC">Thêm nhà cung cấp</button>
    </div>
    <div class="container p-3">
        <div class="row d-flex justify-content-center">

        <div class="col-md-5">
                <div class="form-group">
                    <label for="ten_ncc" class="form-label" style="font-weight: bold;">Tên NCC</label>
                    <input type="text" id="ten_ncc" name="ten_ncc" class="form-control"
                        placeholder="Nhập NCC">
                </div>
                
                <div class="form-group">
                    <label for="sdt" class="form-label" style="font-weight: bold;">SĐT</label>
                    <input type="text" id="sdt" name="sdt" class="form-control" placeholder="Nhập SĐT">
                </div>
                
            
        </div>
        <div class="col-md-10">
                <div class="form-group">
                    <label for="dia_chi" class="form-label" style="font-weight: bold;">Địa chỉ:</label>
                    <textarea id="dia_chi" name="dia_chi" class="form-control"></textarea>
                </div>
            </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#add-NCC").click(function(e) {
        ten_ncc = $("#ten_ncc");
        dia_chi = $("#dia_chi");
        sdt = $("#sdt");
       
        if(checkEmptyAndHighlight(ten_ncc) || checkEmptyAndHighlight(dia_chi) || checkEmptyAndHighlight(sdt) ) {
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        }else{
            if(!validatePhone(sdt.val())){
                    swal("Error", "Số điện thoại không hợp lệ số điện thoại 10 hoặc 11 số", "error");
                }else{
            $.ajax({
                url: "http://localhost/Project_Laptop/admin/NCCManage/add_NCC",
                type: "POST",
                data: {
     
                    ten_ncc: $("#ten_ncc").val(),
                    dia_chi: $("#dia_chi").val(),
                    sdt: $("#sdt").val(),
                  
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
        }
        
    });
});
</script>
<script>
    $(document).ready(function(){
        $("input").on('input', function(){
            $(this).css('border', '1px solid #ced4da');
        });
        $("#hinh_anh").on('change', function(){
            if(this.files.length > 0) {
                $(this).css('border', '1px solid #ced4da'); 
            }
        });
        $("#thong_tin_chung").on('input', function(){
            $(this).css('border', '1px solid #ced4da'); 
        });
    });
</script>
<script>
document.getElementById('hinh_anh').addEventListener('change', function(e) {
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('preview').src = e.target.result;
        document.getElementById('preview').style.display = 'block';
    };
    reader.readAsDataURL(this.files[0]);
});
</script>
