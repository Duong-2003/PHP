<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn

    $dbHost = "localHost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "tbl_shop_vpp";

    $connect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if($connect){
        $setLang = mysqli_query($connect, "SET NAMES 'utf8'");
        // echo"kết nối thành công";
    }
    else{
        die("Kết nối thất bại" . mysqli_connect_error());
    }


// 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_shop_vpp` WHERE id=$id;";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);

// 4. Đóng kết nối
mysqli_close($connect);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:admin_users.php');