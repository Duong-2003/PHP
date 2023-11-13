<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyfQk8J2U6m9T4WjDlJ6oKxvzr1Qs3Z1N7hjFIvmwV4C0S8F1HT6Y4gXx9Gh7I8D" crossorigin="anonymous"></script>
    <title>{{ $tittle }} </title> -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">">
<style>
    li {
        list-style: none;

    }

    #middle-header {
        z-index: 10000;
        top: 0;
        position: sticky;
        transition: 0.5s;
        box-shadow: 0px 6px 4px rgba(0,0,0,0.3);


    }

    #middle-header {
        /* background-image: linear-gradient(to bottom, #bfa4a4, #9b9be1); */
        background-image: url(../Public/img/bg-breadcrumb.webp);

    }



    /* CSS styles for hidden-middle-header class */
    .hidden-middle-header {
        opacity: 0;
    }

    #button {
        margin-top: 13px;
        margin-right: 48px;
        font-size: 20px;
        border: none;
        background-image: linear-gradient(to bottom, #ffffff, #c3b58c);
        border-radius: 20%;
        color: #6c8399;
    }

    .dropdown-menu {
        display: none;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>
</head>

<body>

    <script>
        window.onscroll = function() {
            var middle = document.getElementById("middle-header");

            var scrollTop = window.pageYOffset
            // || document.documentElement.scrollTop;
            if (scrollTop > 100) {
                middle.classList.add("hidden-middle-header");
            } else {
                middle.classList.remove("hidden-middle-header");
            }
        };
    </script>




    <div class="middle-header" id="middle-header">
        <div class="container">
            <div class="row align-items-center">


                <div class="col-xl-3 col-lg-3 col-md-3 block-logo">
                    <a href="web.php" class="logo">
                        <img src="../Public/img/logo (2).webp" alt="">
                    </a>
                </div>




                <div class="col-xl-5 col-lg-4 col-md-4 block-search">
                    <div class="search" id="search">
                        <form style="display:flex;background: darkgrey;" action="/search" method="get" class="" role="search">
                            <input type="text" name="query" class="search-auto form-control" placeholder="Search product" autocomplete="off">

                            <input type="hidden" name="type" value="product">
                            <button class="btn btn-default" type="submit" aria-label="Tìm kiếm">

                                <a href="" style="color:aliceblue;"><i class="fa-solid fa-magnifying-glass"></i></a>


                            </button>
                        </form>
                        <div class="results-box" style="display: block;">
                            <div class="search-results"></div>
                        </div>
                    </div>
                </div>





                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-12 header-right">
                    <div class="header-page-link">
                        <ul class="group-account" style="display:flex;justify-content: space-between;">
                            <li class="hotline" style="background: #9c8350;font-size: 22px;border-radius: 15px; margin-top: 14px;">
                                <a href="tel:19006750" title="123456789">
                                    <strong style="color:white;font-family:'cursive';">
                                        Hotline: 123456789

                                        </span>
                                </a>
                            </li>





                            <div class="dropdown">
                                <button type="button" id="button">
                                    USERS

                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a style="color:black" href="login_web.php"><button class="dropdown-item" type="button">LOG IN </button></a></li>
                                    <li> <a href="register_web.php"><button class="dropdown-item" type="button">REGISTER </button></a></li>
                                    <hr>
                                    <li> <a href="#"><button class="dropdown-item" type="button">OTHER</button></a></li>
                                </ul>
                            </div>

                            </li>
                        </ul>


                    </div>
                </div>

            </div>
        </div>
    </div>



    
