<?php
// Kiểm tra xem có dữ liệu được gửi từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kết nối cơ sở dữ liệu
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "tbl_shop_vpp";

    $connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$connect) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Đặt bộ mã hóa cho kết nối với cơ sở dữ liệu
    mysqli_set_charset($connect, 'utf8');

    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Kiểm tra xem dữ liệu đã được nhập đầy đủ hay chưa
    if ($username != '' && $password != '' && $email != '') {
        // Kiểm tra sự trùng lặp dữ liệu
        $query = "SELECT * FROM users WHERE  email = '$email'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $error = 'Email đã tồn tại';
            header("Location: register_web.php?error=$error");
            exit;
        }

        // Mã hóa mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Thêm người dùng vào cơ sở dữ liệu
        $insert_query = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        $insert_result = mysqli_query($connect, $insert_query);

        if ($insert_result) {
            $notifi = 'Đăng ký thành công';
            header("Location: login_web.php?notifi=$notifi");
            exit;
        } else {
            $error = 'Lỗi đăng ký! Vui lòng thử lại sau';
            header("Location: register_web.php?error=$error");
            exit;
        }
    } else {
        $error = 'Vui lòng nhập đầy đủ thông tin';
        header("Location: register_web.php?error=$error");
        exit;
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($connect);
} else {
    // Nếu không có dữ liệu gửi từ form, chuyển hướng về trang đăng ký
    header("Location: register_web.php");
    exit;
}
?>