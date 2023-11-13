<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "tbl_shop_vpp";

$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if ($connect) {
    $setLang = mysqli_query($connect, "SET NAMES 'utf8'");
    // echo "Kết nối thành công";
} else {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

session_start();
ob_start();

if (isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['rePass'] != '') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rePass = $_POST['rePass'];
    $role = 0;
    $error = null;
    $notifi = null;

    if ($password != $rePass) {
        $connect->close();
        $error = 'Nhập lại mật khẩu sai';
        header("location: register.php?error=$error");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($email != '') {
        $hashed_email = password_hash($email, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, pass, role, email) VALUES ('$username', '$hashed_password', '$role', '$hashed_email')";
    } else {
        $query = "INSERT INTO users (name, pass, role, email) VALUES ('$username', '$hashed_password', '$role', NULL)";
    }

    if ($connect->query($query) === TRUE) {
        $connect->close();
        $notifi = 'Đăng ký thành công';
        header("location: login.php?notifi=$notifi");
    } else {
        $error = 'Lỗi đăng ký! ' . $connect->error;
        $connect->close();
        header("location: register.php?error=$error");
    }
    $connect->close();
} else {
    $connect->close();
    $error = 'Chưa nhập toàn bộ thông tin bắt buộc';
    header("location: register.php?error=$error");
}
?>