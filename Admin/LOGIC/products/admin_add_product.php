

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
    $product_code  = $_POST['product_code']; // sử dụng biến tự tăng để làm dữ liệu cột STT
    $category_name =$_POST['category_name'];
    $product_name =$_POST['product_name'];
    $product_price =$_POST['product_price'];
    $product_description =$_POST['product_description'];
    $product_description_details =$_POST['product_description_details'];
    $product_image =$_POST['product_image'];
    $product_quantity =$_POST['product_quantity'];


   $created_at =$_POST['created_at'];
    $updated_at =$_POST['updated_at'] ;
  $sqlInsert = "INSERT INTO products (product_code, category_name, product_price, product_description, product_description_details,product_image,product_quantity,created_at,updated_at) 
                VALUES ('$product_code', '$category_name', '$product_price', '$product_description', '$product_description_details','$product_image','$product_quantity','$created_at','$updated_at')";
  
  mysqli_query($connect, $sqlInsert);

  mysqli_close($connect);

  // header('location: admin_users.php');
}
?>

<!-- Button Thêm mới -->
<button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <i class="fas fa-plus"></i>
  Thêm sản phẩm
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sản phẩm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="admin_add_user.php" method="POST">
          <div class="">
            <h4>category_name</h4>
            <input type="text" name="category_name" required>
          </div>
          <div class="">
            <h4>product_name</h4>
            <input type="text" name="product_name" required>
          </div>

          <div class="">
            <h4>product_price</h4>
            <input type="number" name="product_price" required>
          </div>
          <div class="">
            <h4>product_description</h4>
            <input type="text" name="product_description">
          </div>

          <div class="">
            <h4>product_description_details</h4>
            <input type="text" name="product_description_details">
          </div>


          <div class="">
            <h4>ADDRESS</h4>
            <input type="text" name="address">
          </div>
          
          <div class="">
            <h4>product_image</h4>
            <input type="text" name="product_image">
          </div>
          
          <div class="">
            <h4>product_quantity</h4>
            <input type="text" name="product_quantity">
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