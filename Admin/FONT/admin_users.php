<?php
include("admin_web.php");

?>

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

// include("connect.php");
// Truy vấn dữ liệu thành viên
$query = "SELECT * FROM users";
$result = $connect->query($query);
?>




<div class="container ">
      <div class="row" style="margin: 100px 0px;">
        <h3> Quản lý thành viên</h3>
        
        <table class="table table-success">
        <button class="btn btn-primary">Thêm thành viên</button>
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


          
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . md5($row['password']) . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['updated_at'] . "</td>";
                        echo "<td><a href='chinh-sua-thanh-vien.php?id=" . $row['id'] . "'>Sửa</a> <a href='xoa-thanh-vien.php?id=" . $row['id'] . "'>Xóa</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Không có thành viên nào.</td></tr>";
                }
                ?>


          </tbody>
        </table>
      </div>
    </div>
    
    <?php
// Đóng kết nối
$connect->close();



?>
