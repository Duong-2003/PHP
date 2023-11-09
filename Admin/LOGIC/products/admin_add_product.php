 <!-- Button trigger modal -->
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

                 <form action="admin_add_user.php" method="post">
                     <div class="">
                         <h4> category_name</h4>
                         <input type="text" name="category_name" required>

                     </div>

                     <div class="">
                         <h4> product_name</h4>
                         <input type="text" product_name="" name="" product_name="" required>

                     </div>


                     <div class="">
                         <h4> product_price</h4>
                         <input type="number" name="product_price" required>

                     </div>



                     <div class="">
                         <h4> product_description</h4>
                         <input type="text" name="	product_description">

                     </div>



                     <div class="">
                         <h4> product_description_details</h4>
                         <input type="text" name="	product_description_details">

                     </div>





                     <div class="">
                         <h4> product_image</h4>
                         <input type="file" name="	product_image">

                     </div>




                     <div class="">
                         <h4> product_quantity</h4>
                         <input type="number" name="product_quantity">

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

   
    
  
    if(isset($_POST['btnSave']) && $_POST['product_image'] != '' && $_POST['	product_description_details'] != '' && $_POST['	product_name'] != '' && $_POST['	product_price'] != ''&& $_POST['product_quantity']!= ''){
        $name = $_POST['	product_name'];
        $price = $_POST['	product_price'];
        $describe = $_POST['sp_mota'];
        $describeDetail = $_POST['	product_description_details'];
        $quantity = $_POST['product_quantity'];
        $type = $_POST['productType'];
        $img = $_POST['product_image'];
        if(is_string($price)){
            $price = (float) str_replace(',', '', $price);
        }
        if($describe != ''){
            $query = "INSERT INTO sanpham (	product_name, 	product_price, sp_mota,	product_description_details, product_quantity,loai	product_name,product_image) 
            VALUES ('$name', '$price','$describe','$describeDetail','$quantity','$type','$img')";
        }
        else{
            $query = "INSERT INTO sanpham (	product_name, 	product_price, sp_mota,	product_description_details, product_quantity,loai	product_name,product_image) 
            VALUES ('$name', '$price',NULL,'$describeDetail','$quantity','$type','$img')";
        }
        if ($connect->query($query) === TRUE) {
            header("location:admin_products.php");
        }else {
            echo "Lỗi không thêm được sản phẩm: " . $connect->error;
        }
        $connect->close();
    }
    else{
        $connect->close();
        // header("location:./adminIndex.php");
        echo ("chưa nhập toàn bộ ");
        exit(); 
    }
    ?>


