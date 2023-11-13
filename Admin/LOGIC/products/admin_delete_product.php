
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
$product_code=$_GET['product_code'];
// echo $id;

$delete_product="DELETE FROM products WHERE product_code=$product_code" ;
mysqli_query($connect, $delete_product);  
echo "<h1>Xóa thành công</h1>";
// header("Location:Admin/FONT/admin_users.php");
?>

