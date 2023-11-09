

<?php
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







if (isset($_POST['btnSave'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $role = $_POST['role'];

  $sqlInsert = "INSERT INTO users (username, email, password, address, role) 
                VALUES ('$username', '$email', '$password', '$address', '$role')";
  
  mysqli_query($connect, $sqlInsert);

  mysqli_close($connect);
if(mysqli_query($connect,$sqlInsert)){
  header('location: admin_users.php');
}
}
?>

<!-- Button Thêm mới -->
<!-- <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <i class="fas fa-plus"></i>
  Thêm thành viên
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm thành viên</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="admin_add_user.php" method="POST">
          <div class="">
            <h4>USERNAME</h4>
            <input type="text" name="username" required>
          </div>
          <div class="">
            <h4>EMAIL</h4>
            <input type="email" name="email" required>
          </div>
          <div class="">
            <h4>PASSWORD</h4>
            <input type="password" name="password" required>
          </div>
          <div class="">
            <h4>ADDRESS</h4>
            <input type="text" name="address">
          </div>
          <div class="">
            <h4>ROLE</h4>
            <select name='role'>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="btnSave" class="btn btn-primary" value="Add new user">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>