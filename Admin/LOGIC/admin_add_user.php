 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 
<i class="fas fa-plus"></i>
Thêm thành viên
      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">


            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm thành viên</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            
            <div class="modal-body">
            
             <form action="admin_add_user.php" method="post">
                  <div class="">
                    <h4> USERNAME</h4>
                    <input type="text" name="username"required>
                   
                  </div>

                  <div class="">
                  <h4> EMAIL</h4>
                    <input type="email" name="email"required>
                   
                  </div>


                  <div class="">
                  <h4>  PASSWORD</h4>
                    <input type="password" name="password" required>
                  
                  </div>



                  <div class="">
                  <h4>  ADDRESS</h4>
                    <input type="text" name="address">
                  
                  </div>

                  <div class="">
                  <h4>  ROLE</h4>
                   <select name='role'>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                   </select>
                  
                  </div>


             </form>
            </div>

           

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="btnSave" class="btn btn-primary" value="Add new user">Add</button>
            </div>
          </div>
        </div>
      </div>

      <?php
      session_start();
      ob_start();
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
    $query = "SELECT * FROM users";
    $result = $connect->query($query);
    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM `tbl_shop_vpp` WHERE id=$id;";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $result = mysqli_query($connect, $sqlSelect);
    $shop_suppliersRow = mysqli_fetch_array($result, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if(empty($shop_suppliersRow)) {
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
        $ROLE = $_POST['ROLE'];
        
        $updated_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12

        // Câu lệnh UPDATE
        $sql = "UPDATE tbl_shop_vpp SET username='$username', email='$email', address='$address', password='$password', ROLE='$ROLE', updated_at='$updated_at' WHERE id=$id;";

        // Thực thi UPDATE
        mysqli_query($connect, $sql);

        // Đóng kết nối
        mysqli_close($connect);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:admin_web.php');
    }

    
    ?>