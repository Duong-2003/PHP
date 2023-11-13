


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
$query = "SELECT * FROM products";
$result = $connect->query($query);
?>




<div class="container ">
    <div class="" style="margin:100px 0px">

        <h1>Danh sách sản phẩm</h1>

        <?php

        // // 2. Chuẩn bị câu truy vấn $sql
        // $sql = "select * from `tbl_shop_vpp`";



        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $data = [];
        $product_code = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'product_code' => $product_code, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'category_name' => $row['category_name'],
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price'],
                'product_description' => $row['product_description'],
                'product_description_details' => $row['product_description_details'],
                'product_image' => $row['product_image'],
                'product_quantity' => $row['product_quantity'],


                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            );
            $product_code++;
        }
        ?>

        <!-- Button Thêm mới -->
<!-- 
         <a href="../LOGIC/products/admin_add_product.php?<?php echo $row['product_code']; ?>"><button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="fas fa-plus"></i>
  Thêm sản phẩm
</button> </a> -->
        <?php
        include("../LOGIC/products/admin_add_product.php");
        ?>



        <table class="table table-bordered  table-success">
            <thead>
                <tr>
                    <th>product_code</th>
                    <th>category_name</th>
                    <th>product_name</th>
                    <th> product_price</th>
                    <th>product_description</th>
                    <th>product_description_details </th>
                    <th> product_image </th>
                    <th>product_quantity</th>
                    <th> created_at</th>
                    <th> updated_at</th>
                    <th>Chức năng</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>

                        <td><?php echo $row['product_code']; ?></td>
                        <td><?php echo  $row['category_name']; ?></td>
                        <td><?php echo  $row['product_name']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_description_details']; ?></td>
                        <td><img src="img/<?php echo $row['product_image']; ?>"></td>
                        <td><?php echo $row['product_quantity']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>
                        <td>
                            <!-- Button Sửa -->
                            <!-- <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">

                            <i class="fas fa-plus"></i>
                                Thêm sản phẩm
                    </button> -->
                    <a  href="../LOGIC/products/admin_edit_product.php?product_code=<?php echo $row['product_code']; ?>" id="btnDelete" class="btn btn-primary">
                <i class="fas fa-edit"></i>
              </a>
                            <?php
                            include("../LOGIC/products/admin_edit_product.php");
                            ?>



                            <!-- Button Xóa -->
                            <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không')" href="../LOGIC/products/admin_delete_product.php?product_code=<?php echo $row['product_code']; ?>" id="btnDelete" class="btn btn-danger">
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