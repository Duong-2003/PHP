
<?php 
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


?>

<body>

   
    <!-- Main content -->
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop bán hàng NetaShop</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    

    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM `users` WHERE id=$id;";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $result = mysqli_query($connect, $sqlSelect);
    $shop_Row = mysqli_fetch_array($result, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($shop_Row)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>
    

    <?php
    // 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
    if (isset($_POST['btnSave'])) {
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $role = $_POST['role'];
        $updated_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12

        // Câu lệnh UPDATE
        $sql = "UPDATE users SET username='$username', email='$email', password='$password', address='$address', updated_at='$updated_at' WHERE id=$id;";
        header('location:Admin/FONT/admin_users.php');
        // Thực thi UPDATE
        mysqli_query($connect, $sql);

        // Đóng kết nối
        mysqli_close($connect);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        // header('location:Admin/FONT/admin_users.php');
       
        // echo "<h1>Sửa thành công</h1>";
    }
    ?>

















    <!-- Main content -->
    <div class="container">
        <h1>Form Cập nhật Nhà cung cấp</h1>

        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id" id="id" class="form-control" value="<?php echo $shop_Row['id'] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>USERNAME</td>
                    <td><input type="text" name="username" id="username" class="form-control" value="<?php echo $shop_Row['username'] ?>" /></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input type="text" name="email" id="email" class="form-control" value="<?php echo $shop_Row['email'] ?>"  /></td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td><input name="password" id="password" class="form-control" value="<?php echo md5($shop_Row ['password']) ?>" ></td>
                </tr>
                <tr>
                    <td>ADRESS</td>
                    <td><input type="text" name="address" id="address" class="form-control" value="<?php echo $shop_Row['address'] ?>" /></td>
                </tr>

                <tr>
                    
                <div class="">
    <h5>ROLE</h5>
    <select type="text" name="role" id="role" class="form-control">
        <option value="admin" <?php if ($shop_Row['role'] === 'admin') echo 'selected' ?>>Admin</option>
        <option value="user" <?php if ($shop_Row['role'] === 'user') echo 'selected' ?>>User</option>
    </select>
</div>
                   
                </tr>

            
                <tr>
                    <td>UPDATED_AT</td>
                    <td><input type="text" name="updated_at" id="updated_at" class="form-control" value="<?php echo $shop_Row['updated_at'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Sửa thông tin</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>



   

    
</body>

</html>
    

    
</body>

</html>




<?php ?>