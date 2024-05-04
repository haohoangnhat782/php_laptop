<?php
require_once 'app/views/pages/includes/header.php';
?>
<link rel="stylesheet" href="assets/css/chart.css">
<link href="assets/bootstraps/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/bootstraps/css/sb-admin-2.min.css" rel="stylesheet">
<link href="assets/bootstraps/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="chart">
    <div class="row">
        <div class="col-xl col-lg" >
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê biểu đồ</h6>
                    <div class="d-flex justify-content-between">
                        <div style="padding-top: 10px;">
                            <label for="chose-year-hot">Chọn năm:</label>
                            <input class="form-control" type="number" id="year">
                        </div>
                        <div style="padding-top: 10px;">
                            <label for="chose-year-hot">Chọn danh mục:</label>
                            <select class="form-control" id="category" >
                                <option>Tất cả</option>
                                <?php foreach ($data['danhmuc'] as $danhmuc): ?>
                                <option><?php echo $danhmuc['ten_danh_muc'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm bán chạy</h6>
            <div class="fill-chart" style="display: flex;">
                <div class="form-group" style="padding: 0px 20px;">
                    <label for="criteria">Chọn tiêu chí:</label>
                    <select class="form-control" id="criteria">
                        <option value="">--Chọn tiêu chí--</option>
                        <option value="day">Ngày</option>
                        <option value="month">Tháng</option>
                        <option value="year">Năm</option>
                    </select>
                </div>
                <div class="form-group criteria-input" id="day-input" style="display: none;">
                    <label for="chose-day-hot">Chọn ngày:</label>
                    <input type="date" class="form-control chose-day-hot" id="chose-day-hot">
                </div>
                <div class="form-group criteria-input" id="month-input" style="display: none;">
                    <label for="chose-month-hot">Chọn tháng:</label>
                    <input type="month" class="form-control chose-month-hot" id="chose-month-hot">
                </div>
                <div class="form-group criteria-input" id="year-input" style="display: none;">
                    <label for="chose-year-hot">Chọn năm:</label>
                    <input type="number" class="form-control chose-year-hot" id="chose-year-hot">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Tổng số sản phẩm bán ra</th>
                            <th>Tổng doanh thu sản phẩm bán ra</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Tổng số sản phẩm bán ra</th>
                            <th>Tổng doanh thu sản phẩm bán ra</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($data['home_chart'] as $item) {
                        ?>
                        <tr>
                            <td><img src="images/<?php echo $item['img']; ?>" alt="" width="200px"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['so_luong']; ?></td>
                            <td><?php echo $item['don_gia']; ?> VND</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.getElementById('chose-year-hot').value = new Date().getFullYear();
    let date;
    $(document).ready(function() {
        $('#criteria').on('change', function() {
            // Ẩn tất cả các input
            $('.criteria-input').hide();
            // Hiển thị input tương ứng với tiêu chí được chọn
            var selectedCriteria = $(this).val();
            if (selectedCriteria) {
                date = '#chose-' + selectedCriteria + '-hot';
                $('#' + selectedCriteria + '-input').show();
                console.log(date);
                $(date).on('change', function() {
                    if (selectedCriteria == 'year') {
                        var selectedDateYear = $(this).val();
                        var selectedDateMonth = null;
                        var selectedDateDay = null;
                    }
                    if (selectedCriteria == 'month') {
                        var selectedDateMonth = $(this).val();
                        var selectedDateYear = null;
                        var selectedDateDay = null;
                    }
                    if (selectedCriteria == 'day') {
                        var selectedDateDay = $(this).val();
                        var selectedDateMonth = null;
                        var selectedDateYear = null;
                    }
                    $.ajax({
                        url: 'http://localhost/Project_Laptop/admin/chart/chart',
                        type: 'GET',
                        data: {
                            day: selectedDateDay,
                            month: selectedDateMonth,
                            year: selectedDateYear
                        },
                        success: function(response) {
                            console.log(response);
                            var result = JSON.parse(response);
                            var data = Object.values(result.combined_chitietdonhang);
                            console.log(data);
                            var table = $('#dataTable tbody');
                            table.empty();
                            data.forEach(function(item) {
                                var hmtl = '<tr>' +
                                    '<td><img src="images/' + item.img +
                                    '" alt="" width="200px"></td>' +
                                    '<td>' + item.name + '</td>' +
                                    '<td>' + item.so_luong + '</td>' +
                                    '<td>' + item.don_gia + ' VND</td>' +
                                    '</tr>';
                                table.append(hmtl);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                            console.error(textStatus, errorThrown);
                        }
                    });
                });
            }
        });
    });
</script>
<script src="assets/bootstraps/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="assets/js//chart-area.js">
    
</script>

<!-- Page level plugins -->
<?php
    require_once 'app/views/pages/includes/footer.php';
?>