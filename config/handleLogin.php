<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['log_email'];
    $pwd = $_POST['log_pass'];
    
    // Check if email and password are provided
    if (empty($email) || empty($pwd)) {
        echo json_encode(array(
            'status' => 400,
            'message' => "Please, check data and try again!"
        ));
        exit();
    }

    // Prepare SQL statement with placeholders
    $check_valid_account = "SELECT * FROM nguoi_dung WHERE email = ?";
    $check_stmt = $mysqli->prepare($check_valid_account);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    // Check if user exists and password matches
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($pwd, $user['password'])) {
            session_start();
            $_SESSION['user'] = array(
                'username' => $user['ho_ten'],
                'email' => $email
            );
            echo json_encode(array(
                'status' => 200,
                'message' => "Login successful"
            ));
            exit();
        }
    }

    // Authentication failed
    echo json_encode(array(
        'status' => 404,
        'message' => "Account doesn't exist!"
    ));
    exit();
}
