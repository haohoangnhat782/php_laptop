<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["reg_name"];
    $tel = $_POST["reg_tel"];
    $email = $_POST["reg_email"];
    $password = $_POST["reg_pass"];

    if (empty($_POST["reg_name"]) || empty($_POST["reg_tel"]) || empty($_POST["reg_email"]) || empty($_POST["reg_pass"])) {
        echo json_encode(array(
            'status' => 400,
            'message' => "Please, check information and try again!"
        ));
        exit;
    }


    $check_email_sql = "SELECT * FROM nguoi_dung WHERE email = ?";
    $check_stmt = $mysqli->prepare($check_email_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(array(
            'status' => 409,
            'message' => "Email already exist!"
        ));
        exit;
    }

    $sql = "INSERT INTO nguoi_dung (ho_ten, so_dien_thoai, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("ssss", $name, $tel, $email, $hashed_password);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $stmt->close();
            session_start();
            $_SESSION['register'] = array(
                'pwd' => $password,
                'email' => $email
            );
            session_destroy();

            echo json_encode(array(
                'status' => 200,
                'message' => "Register successful"
            ));
            exit();
        } else {
            $stmt->close();
            echo json_encode(array(
                'status' => 500,
                'message' => "Register failed, check internet and try again!"
            ));
            exit();
        }
    } else {
        echo "Lỗi khi chuẩn bị câu lệnh SQL.";
        exit;
    }
} else {
    echo "Lỗi: Phương thức không hợp lệ.";
}
