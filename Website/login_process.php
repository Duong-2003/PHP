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
    session_start();
    ob_start();
    // Đặt bộ mã hóa cho kết nối với cơ sở dữ liệu
    mysqli_set_charset($connect, 'utf8');

    // Lấy dữ liệu từ form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra xem dữ liệu đã được nhập đầy đủ hay chưa
    if ($email != '' && $password != '') {
        // Kiểm tra sự khớp của email và mật khẩu trong cơ sở dữ liệu
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                
               // Đăng nhập thành công, chuyển hướng người dùng vào trang web.php
            header("Location: web.php");
            echo '<i class="fas fa-user"></i>';
                exit;
            } else {
                $error = 'Mật khẩu không đúng';
                header("Location: login_web.php?error=$error");
                exit;
            }
        } else {
            $error = 'Email không tồn tại';
            header("Location: login_web.php?error=$error");
            exit;
        }
    } else {
        $error = 'Vui lòng nhập đầy đủ thông tin';
        header("Location: login_web.php?error=$error");
        exit;
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($connect);
} else {
    // Nếu không có dữ liệu gửi từ form, chuyển hướng về trang đăng nhập
    header("Location: login_web.php");
    exit;
}
?>