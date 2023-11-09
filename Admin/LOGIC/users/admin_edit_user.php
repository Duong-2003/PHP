
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
<?php
    // 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
    // if (isset($_POST['btnSave'])) {
    //     // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    //     $username = $_POST['username'];
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     $address = $_POST['address'];
    //     $role = $_POST['role'];
    //     $updated_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12

    //     // Câu lệnh UPDATE
    //     $sql = "UPDATE tbl_shop_vpp SET username='$username', email='$email', password='$password', address='$address', updated_at='$updated_at' WHERE id=$id;";
       
    //     // Thực thi UPDATE
    //     mysqli_query($connect, $sql);

    //     // Đóng kết nối
    //     mysqli_close($connect);

    //     // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    //     header('location:index.php');
    // }
    ?>


<body>

    <?php
   
    
    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    // $id = $_GET['id'];
    // $sqlSelect = "SELECT * FROM `tbl_shop_vpp` WHERE id=$id;";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    // $resultSelect = mysqli_query($connect, $sqlSelect);
    // $shop_suppliersRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    // if(empty($shop_suppliersRow)) {
    //     echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
    //     die;
    // }
    ?>
    
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
    
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($shop_suppliersRow)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>
    
    <!-- Main content -->
    <div class="container">
        <h1>Form Cập nhật Nhà cung cấp</h1>

        <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id" id="id" class="form-control" value="<?php echo $shop_suppliersRow[''] ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Mã nhà cung cấp</td>
                    <td><input type="text" name="supplier_code" id="supplier_code" class="form-control" value="<?php echo $shop_suppliersRow['supplier_code'] ?>" /></td>
                </tr>
                <tr>
                    <td>Tên nhà cung cấp</td>
                    <td><input type="text" name="supplier_name" id="supplier_name" class="form-control" value="<?php echo $shop_suppliersRow['supplier_name'] ?>"  /></td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td><textarea name="description" id="description" class="form-control" value="<?php echo $shop_suppliersRow['description'] ?>" ></textarea></td>
                </tr>
                <tr>
                    <td>Ảnh đại diện</td>
                    <td><input type="text" name="image" id="image" class="form-control" value="<?php echo $shop_suppliersRow['image'] ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>


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
       
        // Thực thi UPDATE
        mysqli_query($conn, $sql);

        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:index.php');
    }
    ?>

  

    

    
</body>

</html>




<?php ?>