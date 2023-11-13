<?php

$dbHost = "localHost";
$dbUser = "root";
$dbPass = "";
$dbName = "tbl_shop_vpp";

$connect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if($connect){
    $setLang = mysqli_query($connect, "SET NAMES 'utf8'");
    // echo "Kết nối thành công";
}
else{
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
   
    $product_code = $_POST['product_code'];
    $category_name = $_POST['category_name'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_description_details = $_POST['product_description_details'];
    $product_image = $_FILES['product_image']['name'];
    $product_quantity = $_POST['product_quantity'];
    
    // Thực hiện câu truy vấn INSERT INTO
    $insert_query = "INSERT INTO products (product_code, category_name, product_name, product_price, product_description, product_description_details, product_image, product_quantity) 
                    VALUES ($product_code, $category_name,$product_name, $product_price, $product_description, $product_description_details, $product_image, $product_quantity)";
    $insert_statement = mysqli_prepare($connect, $insert_query);

    
    
    if ($insert_result) {
        echo "Thêm sản phẩm thành công!";
    } else {
        echo "Lỗi khi thêm sản phẩm: " . mysqli_error($connect);
    }



    
}

?>

<!-- Form thêm sản phẩm -->
<form method="POST" action="../Admin/LOGIC/products/admin_add_product.php">
    <div class="form-group">
        <label for="product_code">Mã sản phẩm</label>
        <input type="text" class="form-control" id="product_code" name="product_code" required>
    </div>
    <div class="form-group">
        <label for="category_name">Tên danh mục</label>
        <input type="text" class="form-control" id="category_name" name="category_name" required>
    </div>
    <div class="form-group">
        <label for="product_name">Tên sản phẩm</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>
    <div class="form-group">
        <label for="product_price">Giá sản phẩm</label>
        <input type="number" class="form-control" id="product_price" name="product_price" required>
    </div>
    <div class="form-group">
        <label for="product_description">Mô tả sản phẩm</label>
        <textarea class="form-control" id="product_description" name="product_description" required></textarea>
    </div>
    <div class="form-group">
        <label for="product_description_details">Chi tiết mô tả sản phẩm</label>
        <textarea class="form-control" id="product_description_details" name="product_description_details" required></textarea>
    </div>
    <div class="form-group">
        <label for="product_image">Ảnh sản phẩm</label>
        <input type="file" class="form-control" id="product_image" name="product_image" required>
    </div>
    <div class="form-group">
        <label for="product_quantity">Số lượng sản phẩm</label>
        <input type="number" class="form-control" id="product_quantity" name="product_quantity" required>
    </div>
    <input type="submit" value="Thêm sản phẩm" class="btn btn-primary">
</form>