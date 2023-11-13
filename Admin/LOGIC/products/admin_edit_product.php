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




$sql="SELECT * FROM products";
$query=mysqli_query($connect,$sql);

$shop_Row = mysqli_fetch_array($query, MYSQLI_ASSOC); // 1 record

// Nếu không tìm thấy dữ liệu -> thông báo lỗi
if(empty($shop_Row)) {
    echo "Giá trị id: $product_code không tồn tại. Vui lòng kiểm tra lại.";
    die;
}




if (isset($_POST['btnSave'])) {
    $product_code = $_POST['product_code'];
    $category_name = $_POST['category_name'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_description_details = $_POST['product_description_details'];
    $product_image = $_FILES['product_image']['name'];
    $product_quantity = $_POST['product_quantity'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];

    $sql = "UPDATE products SET 
                product_code='$product_code', 
                category_name='$category_name', 
                product_name='$product_name', 
                product_price='$product_price', 
                product_description='$product_description', 
                product_description_details='$product_description_details',
                product_image='$product_image', 
                product_quantity='$product_quantity', 
                created_at='$created_at', 
                updated_at='$updated_at' 
            WHERE product_code='$product_code'";

    // Thực thi truy vấn UPDATE
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Cập nhật sản phẩm thành công.";
        
    } else {
        echo "Có lỗi xảy ra khi cập nhật sản phẩm: " . mysqli_error($connect);
    }
}






?>



<!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sản phẩm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="admin_edit_product.php" method="POST"enctype="multipart/form-data">
        <div class="">
            <h4>product_code</h4>
            <input type="text" name="product_code" value="<?php echo $shop_Row['product_code'] ?>" >
          </div>
          <div class="">
            <h4>category_name</h4>
            <input type="text" name="category_name" value="<?php echo $shop_Row['category_name'] ?>">
          </div>
          <div class="">
            <h4>product_name</h4>
            <input type="text" name="product_name"value="<?php echo $shop_Row['product_name'] ?>">
          </div>

          <div class="">
            <h4>product_price</h4>
            <input type="number" name="product_price" value="<?php echo $shop_Row['product_price'] ?>">
          </div>
          <div class="">
            <h4>product_description</h4>
            <input type="text" name="product_description"value="<?php echo $shop_Row['product_description'] ?>">
          </div>

          <div class="">
            <h4>product_description_details</h4>
            <input type="text" name="product_description_details"value="<?php echo $shop_Row['product_description_details'] ?>">
          </div>


          
          
          <div class="">
            <h4>product_image</h4>
            <input type="file" name="product_image"value="<?php echo $shop_Row['product_image'] ?>">
          </div>
          
          <div class="">
            <h4>product_quantity</h4>
            <input type="text" name="product_quantity"value="<?php echo $shop_Row['product_quantity'] ?>">
          </div>

          <div class="">
            <h4>created_at</h4>
            <input type="text" name="created_at"value="<?php echo $shop_Row['created_at'] ?>">
          </div>

          <div class="">
            <h4>updated_at</h4>
            <input type="text" name="updated_at"value="<?php echo $shop_Row['updated_at'] ?>">
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



