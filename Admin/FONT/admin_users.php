

<?php

include("admin_web.php");

?>

<?php

$dbHost = "localHost";
$dbUser = "root";
$dbPass = "";
$dbName = "tbl_shop_vpp";

$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if ($connect) {
  $setLang = mysqli_query($connect, "SET NAMES 'utf8'");
  // echo"kết nối thành công";
} else {
  die("Kết nối thất bại" . mysqli_connect_error());
}

// include("connect.php");
// Truy vấn dữ liệu thành viên
$list_sql = "SELECT * FROM users";
$result = mysqli_query($connect, $list_sql);

?>




<div class="container ">
  <div class="" style="margin:100px 0px">

    <h1>Danh sách thành viên và admin</h1>

    <?php

    // // 2. Chuẩn bị câu truy vấn $sql
    // $sql = "select * from `tbl_shop_vpp`";



    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $data = [];
    $rowNum = 1;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $data[] = array(
        'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
        'id' => $row['id'],
        'username' => $row['username'],
        'email' => $row['email'],
        'password' => $row['password'],
        'address' => $row['address'],
        'role' => $row['role'],
        'created_at' => $row['created_at'],
        'updated_at' => $row['updated_at'],
      );
      $rowNum++;
    }
    ?>

    <!-- Button Thêm mới -->

    <!-- <button type="button" class="btn btn-primary my-1"id="btnAdd" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <a href="../LOGIC/users/admin_add_user.php?id= <?php echo $row['id']; ?>">
  <i style="color: aliceblue;" class="fas fa-plus"></i>
</a> -->
<!-- <a href="../LOGIC/users/admin_add_user.php?id= <?php echo $row['id']; ?>" id="btnPlus" class="btn btn-primary">
                <i class="fas fa-plus"></i>
              </a> -->

    <?php
      include("../LOGIC/users/admin_add_user.php");
      ?>
    


    <table class="table table-bordered  table-success">
      <thead>
        <tr>
          <th>ID</th>
          <th>USERNAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>ADDRESS</th>
          <th>ROLE</th>
          <th>CREATED_AT</th>
          <th>UPDATED_AT</th>
          <th>Chức năng</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) : ?>
          <tr>

            <td><?php echo $row['id']; ?></td>
            <td><?php echo  $row['username']; ?></td>
            <td><?php echo  $row['email']; ?></td>
            <td><?php echo md5($row['password']); ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            <td>
              <!-- Button Sửa -->
              <a  href="../LOGIC/users/admin_edit_user.php?id=<?php echo $row['id']; ?>" id="btnEdit" class="btn btn-primary">
                <i class="fas fa-edit"></i>
              </a>
             
  

                  
                
                

              <!-- Button Xóa -->
              <a onclick="return confirm('Bạn có muốn xóa thành viên này không')" href="../LOGIC/users/admin_delete_user.php?id=<?php echo $row['id']; ?>" id="btnDelete" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
</body>

</html>
<?php
// Đóng kết nối
$connect->close();



?>
