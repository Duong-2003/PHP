<?php
include("admin_web.php");

$dbHost = "localHost";
$dbUser = "root";
$dbPass = "";
$dbName = "tbl_shop_vpp";

$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if ($connect) {
  $setLang = mysqli_query($connect, "SET NAMES 'utf8'");
} else {
  die("Kết nối thất bại" . mysqli_connect_error());
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $delete_sql = "DELETE FROM users WHERE id = $id";
  $result = mysqli_query($connect, $delete_sql);
  if ($result) {
    echo "Đã xóa thành viên thành công.";
    // Redirect to the current page after deleting the user
    echo '<script>window.location.href = "admin_view_users.php";</script>';
  } else {
    echo "Đã xảy ra lỗi khi xóa thành viên: " . mysqli_error($connect);
  }
}

// Đóng kết nối
$connect->close();
?>