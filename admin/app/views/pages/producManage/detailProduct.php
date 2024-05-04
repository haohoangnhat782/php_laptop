<?php $laptop = json_decode($_GET['laptop'], true); ?>

<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Chi tiết sản phẩm</h6>
    <!-- <button type="button" class="btn btn-primary" id="edit-product">Sửa sản phẩm</button> -->
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-weight: bold;">Ảnh sản phẩm</label>
                <input class="form-control" type="file" id="hinh_anh">
                <img id="preview" src="images/<?php echo $laptop['hinh_anh'] ?>" alt="Image preview"
                    style="width: 200px; height: 150px;">
                <input type="hidden" id="default-file" value="<?php echo $laptop['hinh_anh'] ?>">
                <input type="hidden" id="id_san_pham" value="<?php echo $laptop['id_san_pham'] ?>">
            </div>
            <div class="form-group">
                <label for="don_gia" class="form-label" style="font-weight: bold;">Giá sản phẩm</label>
                <input type="number" id="don_gia" name="don_gia" class="form-control" placeholder="Nhập giá"
                    value="<?php echo $laptop['don_gia'] ?>">
            </div>
            <div class="form-group">
                <label for="so_luong" class="form-label" style="font-weight: bold;">Số Lượng trong kho</label>
                <input type="number" id="so_luong" name="so_luong" class="form-control" placeholder="Nhập số lượng"
                    value="<?php echo $laptop['so_luong'] ?>">
            </div>
            <div class="form-group">
                <label for="ma_danh_muc" class="form-label" style="font-weight: bold;">Mã Danh Mục</label>
                <select class="form-control" id="ma_danh_muc">
                    <?php $danhmuc = json_decode($_GET['danhmuc'], true);
                     foreach ($danhmuc as $item): ?>
                    <option><?php echo $item['id_danh_muc'].'-'.$item['ten_danh_muc'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="trang_thai" class="form-label" style="font-weight: bold;">Trạng thái</label>
                <select class="form-control" id="trang_thai">
                    <option>1</option>
                    <option>0</option>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="ten_san_pham" class="form-label" style="font-weight: bold;">Tên sản phẩm</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control"
                    placeholder="Nhập tên sản phẩm" value="<?php echo $laptop['ten_san_pham'] ?>">
            </div>
            <div class="form-group">
                <label for="cpu" class="form-label" style="font-weight: bold;">CPU</label>
                <input type="text" id="cpu" name="cpu" class="form-control" placeholder="Nhập CPU"
                    value="<?php echo $laptop['cpu'] ?>">
            </div>
            <div class="form-group">
                <label for="ram" class="form-label" style="font-weight: bold;">RAM</label>
                <input type="text" id="ram" name="ram" class="form-control" placeholder="Nhập RAM"
                    value="<?php echo $laptop['ram'] ?>">
            </div>
            <div class="form-group">
                <label for="dung_luong_pin" class="form-label" style="font-weight: bold;">Dung Lượng Pin</label>
                <input type="text" id="dung_luong_pin" name="dung_luong_pin" class="form-control"
                    placeholder="Nhập dung lượng pin" value="<?php echo $laptop['dung_luong_pin'] ?>">
            </div>
            <div class="form-group">
                <label for="man_hinh" class="form-label" style="font-weight: bold;">Màn hình</label>
                <input type="text" id="man_hinh" name="man_hinh" class="form-control" placeholder="Nhập màn hình"
                    value="<?php echo $laptop['man_hinh'] ?>">
            </div>
            <div class="form-group">
                <label for="bao_hanh" class="form-label" style="font-weight: bold;">Bảo hành</label>
                <input type="text" id="bao_hanh" name="bao_hanh" class="form-control" placeholder="Nhập bảo hành"
                    value="<?php echo $laptop['bao_hanh'] ?>">
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <label for="thong_tin_chung" class="form-label" style="font-weight: bold;">Thông tin chung:</label>
                <textarea id="thong_tin_chung" name="thong_tin_chung"
                    class="form-control"><?php echo $laptop['thong_tin_chung'] ?></textarea>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("input").prop('readonly', true);
    $("#hinh_anh").prop('disabled', true);
    $("#thong_tin_chung").prop('readonly', true);
    $("#ma_danh_muc").prop('disabled', true);
    $("#trang_thai").prop('disabled', true);
});
</script>
