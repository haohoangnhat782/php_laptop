<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["reg_name"];
    $tel = $_POST["reg_tel"];
    $email = $_POST["reg_email"];
    $password = $_POST["reg_pass"];

    if (empty($_POST["reg_name"]) || empty($_POST["reg_tel"]) || empty($_POST["reg_email"]) || empty($_POST["reg_pass"])) {
        header("Location: /xampp/htdocs/php_laptop/index.php?quanly=authenticate&stt=400");
        exit;
    }


    $check_email_sql = "SELECT * FROM nguoi_dung WHERE email = ?";
    $check_stmt = $conn->prepare($check_email_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: /xampp/htdocs/php_laptop/index.php?quanly=authenticate&stt=409");
        exit;
    }



    $sql = "INSERT INTO nguoi_dung (ho_ten, so_dien_thoai, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssss", $name, $tel, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: /xampp/htdocs/php_laptop/index.php?quanly=authenticate&stt=200");
            $stmt->close(); 
        } else {
            header("Location: /xampp/htdocs/php_laptop/index.php?quanly=authenticate&stt=404");
            $stmt->close(); 
        }
    } else {
        // Xử lý lỗi khi chuẩn bị câu lệnh SQL
        echo "Lỗi khi chuẩn bị câu lệnh SQL.";
        exit;
    }
} else {
    echo "Lỗi: Phương thức không hợp lệ.";
}
?>
