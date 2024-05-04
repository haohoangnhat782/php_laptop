<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
    <button type="button" class="btn btn-success" id="add-product">Thêm sản phẩm</button>
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-weight: bold;">Ảnh sản phẩm</label>
                <input class="form-control" type="file" id="hinh_anh" name="url_anh">
                <img id="preview" src="" alt="Image preview" style="display: none;width: 200px; height: 150px;">
            </div>
            <div class="form-group">
                <label for="don_gia" class="form-label" style="font-weight: bold;">Giá sản phẩm</label>
                <input type="number" id="don_gia" name="don_gia" class="form-control" placeholder="Nhập giá">
            </div>
            <div class="form-group">
                <label for="so_luong" class="form-label" style="font-weight: bold;">Số Lượng trong kho</label>
                <input type="number" id="so_luong" name="so_luong" class="form-control" placeholder="Nhập số lượng" min="0">
            </div>
            <div class="form-group">
                <label for="ma_danh_muc" class="form-label" style="font-weight: bold;">Mã Danh Mục</label>
                <select class="form-control" id="ma_danh_muc">
                    <?php $danhmuc = json_decode($_GET['danhmuc'], true);
                    foreach ($danhmuc as $item) : ?>
                        <option><?php echo $item['id_danh_muc'] . '-' . $item['ten_danh_muc'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="trang_thai" class="form-label" style="font-weight: bold;">Trạng thái</label>
                <select class="form-control" id="trang_thai">
                    <option value="1">Mở sản phẩm</option>
                    <option value="0">Ẩn sản phẩm</option>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="ten_san_pham" class="form-label" style="font-weight: bold;">Tên sản phẩm</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="cpu" class="form-label" style="font-weight: bold;">CPU</label>
                <input type="text" id="cpu" name="cpu" class="form-control" placeholder="Nhập CPU">
            </div>
            <div class="form-group">
                <label for="ram" class="form-label" style="font-weight: bold;">RAM</label>
                <input type="text" id="ram" name="ram" class="form-control" placeholder="Nhập RAM">
            </div>
            <div class="form-group">
                <label for="dung_luong_pin" class="form-label" style="font-weight: bold;">Dung Lượng Pin</label>
                <input type="text" id="dung_luong_pin" name="dung_luong_pin" class="form-control" placeholder="Nhập dung lượng pin">
            </div>
            <div class="form-group">
                <label for="man_hinh" class="form-label" style="font-weight: bold;">Màn hình</label>
                <input type="text" id="man_hinh" name="man_hinh" class="form-control" placeholder="Nhập màn hình">
            </div>
            <div class="form-group">
                <label for="bao_hanh" class="form-label" style="font-weight: bold;">Bảo hành</label>
                <input type="text" id="bao_hanh" name="bao_hanh" class="form-control" placeholder="Nhập bảo hành">
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label for="thong_tin_chung" class="form-label" style="font-weight: bold;">Thông tin chung:</label>
                <textarea id="thong_tin_chung" name="thong_tin_chung" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/check.js"></script>
<script>
    $(document).ready(function() {
        $("#add-product").click(function(e) {
            hinh_anh = $("#hinh_anh");
            don_gia = $("#don_gia");
            so_luong = $("#so_luong");
            ma_danh_muc = $("#ma_danh_muc");
            trang_thai = $("#trang_thai");
            ten_san_pham = $("#ten_san_pham");
            cpu = $("#cpu");
            ram = $("#ram");
            dung_luong_pin = $("#dung_luong_pin");
            man_hinh = $("#man_hinh");
            bao_hanh = $("#bao_hanh");
            thong_tin_chung = $("#thong_tin_chung");
            if (checkEmptyAndHighlight(hinh_anh) || checkEmptyAndHighlight(don_gia) || checkEmptyAndHighlight(so_luong) || checkEmptyAndHighlight(ten_san_pham) || checkEmptyAndHighlight(cpu) || checkEmptyAndHighlight(ram) || checkEmptyAndHighlight(dung_luong_pin) || checkEmptyAndHighlight(man_hinh) || checkEmptyAndHighlight(bao_hanh) || checkEmptyAndHighlight(thong_tin_chung)) {
                swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
            } else {
                if (checkNegativeNumber(so_luong) || checkNegativeNumber(don_gia)) {
                    swal("Error", "Số lượng và giá không được âm", "error");
                    return;
                } else {
                    var formData = new FormData();
                    formData.append('url_anh', $("#hinh_anh")[0].files[0]);
                    formData.append('hinh_anh', $("#hinh_anh").val().split('\\').pop());
                    formData.append('don_gia', $("#don_gia").val());
                    formData.append('so_luong', $("#so_luong").val());
                    formData.append('ma_danh_muc', $("#ma_danh_muc").val());
                    formData.append('trang_thai', $("#trang_thai").val());
                    formData.append('ten_san_pham', $("#ten_san_pham").val());
                    formData.append('cpu', $("#cpu").val());
                    formData.append('ram', $("#ram").val());
                    formData.append('dung_luong_pin', $("#dung_luong_pin").val());
                    formData.append('man_hinh', $("#man_hinh").val());
                    formData.append('bao_hanh', $("#bao_hanh").val());
                    formData.append('thong_tin_chung', $("#thong_tin_chung").val());
                    $.ajax({
                        url: "http://localhost/admin/productManage/add_product",
                        type: "POST",
                        data: formData,
                        processData: false, // Tell jQuery not to process the data
                        contentType: false, // Tell jQuery not to set contentType
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status == 'success') {
                                swal("Success", "Thêm thành công", "success")
                                $("#hinh_anh").val("");
                                $("#don_gia").val("");
                                $("#so_luong").val("");
                                $("#ma_danh_muc").val("");
                                $("#trang_thai").val("");
                                $("#ten_san_pham").val("");
                                $("#cpu").val("");
                                $("#ram").val("");
                                $("#dung_luong_pin").val("");
                                $("#man_hinh").val("");
                                $("#bao_hanh").val("");
                                $("#thong_tin_chung").val("");
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
    $(document).ready(function() {
        $("input").on('input', function() {
            $(this).css('border', '1px solid #ced4da');
        });
        $("#hinh_anh").on('change', function() {
            if (this.files.length > 0) {
                $(this).css('border', '1px solid #ced4da');
            }
        });
        $("#thong_tin_chung").on('input', function() {
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