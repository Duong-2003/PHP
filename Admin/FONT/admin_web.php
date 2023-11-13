
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="../Public/img/favicon3.jpg" type="x-icon">
    <title> Stationery Website Admin Page </title>
</head>
<body>
    
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">LIST </h5>
       
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin_home.php">HOME</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="admin_users.php">USERS</a>
           
          </li>
          <li class="nav-item">
          <a class="nav-link" href="admin_products.php">PRODUCTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_orders.php">ORDERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_register.php">REGISTER ADMIN</a>
          </li>
         
        </ul>
        
        
      </div>
    </div>
    <!-- <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form> -->
    <a class="navbar-brand" href="admin_web.php">TRANG QUẢN TRỊ ADMIN </a>
  </div>
</nav>






<?php 
include("admin_web.php");
?>

<div class="content-wrapper" style="min-height: 365px;">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Trang chủ</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Admin</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3>150</h3>

							<h4>CHUYÊN MỤC</h4>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3>53<sup style="font-size: 20px">%</sup></h3>

							<h4>BÀI VIẾT</h4>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>44</h3>

							<h4 style="color: #fff">THÀNH VIÊN</h4>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>65</h3>

							<h4>BÌNH LUẬN</h4>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
		</div>
	</section>
</div>











</body>
<script>
 
</script>