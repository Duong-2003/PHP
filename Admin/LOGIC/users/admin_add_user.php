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




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $role = $_POST["role"];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    // Thực hiện câu truy vấn INSERT INTO
    $insert_query = "INSERT INTO users (username, email, password, address, role, created_at, updated_at) VALUES ('$username', '$email', '$password', '$address', '$role', '$created_at', '$updated_at')";
    $insert_result = mysqli_query($connect, $insert_query);

    if ($insert_result) {
       ("Thêm người dùng thành công!");
    } else {
        echo "Lỗi khi thêm người dùng: " . mysqli_error($connect);
    }
    
}
?>



<!-- Form thêm người dùng -->


<form method="POST" action="../LOGIC/users/admin_add_user.php">
    <div class="form-group">
        <label for="username">Tên người dùng</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
        <label for="role">Vai trò</label>
        <select class="form-control" id="role" name="role" required>
            <option value="user">Người dùng</option>
            <option value="admin">Quản trị viên</option>
        </select>
    </div>
    <input type="submit" value="Thêm thành viên" class="btn btn-primary">
</form>