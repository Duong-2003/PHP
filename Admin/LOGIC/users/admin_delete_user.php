
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
$id=$_GET['id'];
// echo $id;

$delete_users="DELETE FROM users WHERE id=$id" ;
mysqli_query($connect, $delete_users);  
echo "<h1>Xóa thành công</h1>";
// header("Location:Admin/FONT/admin_users.php");
?>

<!-- value="<?php echo $shop_suppliersRow['id'] ?>" -->