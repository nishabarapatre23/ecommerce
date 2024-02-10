<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
    <title>E-commerce Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width" , initial-scale=1>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .img-responsive {
            width: 100%;
            height: 150px;
            object-fit: contain;
        }

        .product {
            width: 300px;
        }

        .slider_image {
            width: 100%;
            height: 100px;
            object-fit: contain;

        }
    </style>
</head>

<body>

    <div id="top"> <!-- top bar start -->

        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome Guest";
                    } else {
                        echo "welcome: " . $_SESSION['customer_email'] . "";
                    }
                    ?>
                </a>
                <a href="#">Shopping Cart Total Price: INR <?php totalPrice() ?>, Total Items <?php item();  ?> </a>
            </div>

            <div class="col-md-6 ">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php'>My Account</a>";
                        } else {
                            echo "<a href='customer/my_account.php?my_order'> My Account</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Go to Cart</a>
                    </li>
                    <li>
                        <a href="login.php">
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>Login</a> ";
                            } else {
                                echo "<a href='logout.php'>Logout</a> ";
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="navbar navbar-default" id="navbar"><!--navbar start-->
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/images1.jpg" alt="" class="hidden-xs" width="100" height="60">
                    <img src="images/logo1.png" alt="shoppinggirl" class="visible-xs" width="100" height="60">
                </a>


                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <!-- <input type="search" name="search" id="" aria-label="search" class=""> -->
                <button type="button" class="navbar-toggle" data-toggle="navbar-toggle" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="Shop.php">Shop</a>
                        </li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_order'> My Account</a>";
                            }
                            ?> </li>
                        <li>
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <!-- <li>
                            <a href="about.php">About Us</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li> -->
                        <li>
                            <a href="contactus.php">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <!-- 
                <div class="navbar-collapse collapse right" style="display: flex;">
                    <input type="text" name="user_query" placeholder="Search" class="form-control bg-light" style="width: 150px;" required="required">
                    <button class="btn navbar-btn btn-primary" type="submit" data-toggle="collapse" data-target="search">
                        
                    <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div> -->
                <div>
                    <div class="d-flex align-items-center justify-content-center">
                        <form class="d-flex" action="search_product.php" method="get">
                            <input class="form-control me-2" style="width: 300px;" type="search" name="search_data" placeholder="Search" aria-label="Search">
                            <button type="submit" name="search_data_product" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php item(); ?> items In Cart</span>
                    </a>
                </div>

            </div>
        </div>

        <div class="container" id="slider">
            <div class="col-md-12">
                <div class="carousel slide" id="myCarousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="myCarousel" data-slide-to="0" class="action"></li>
                        <li data-target="myCarousel" data-slide-to="1"></li>
                        <li data-target="myCarousel" data-slide-to="2"></li>
                        <li data-target="myCarousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner"> <!--carousel-inner start-->
                        <?php
                        $get_slide = "SELECT * FROM slide LIMIT 0,1";
                        $run_slide = mysqli_query($con, $get_slide);
                        while ($row = mysqli_fetch_array($run_slide)) {
                            $slide_name = $row['slide_name']; // Removed the extra $ sign before 'slide_name'
                            $slide_image = $row['slide_image'];
                            $slide_url = $row['slide_url'];
                            // Removed the extra $ sign before 'slide_image'
                            echo "<div class='item active'>
                    <a href='$slide_url'><img src='./admin_area/slider_images/$slide_image' class='slider_image'></a>
                    </div>";
                        }
                        ?>

                        <?php
                        $get_slide = "SELECT * FROM slide LIMIT 1,3";
                        $run_slide = mysqli_query($con, $get_slide);
                        while ($row = mysqli_fetch_array($run_slide)) {
                            $slide_name = $row['slide_name']; // Removed the extra $ sign before 'slide_name'
                            $slide_image = $row['slide_image'];
                            $slide_url = $row['slide_url']; // Removed the extra $ sign before 'slide_image'
                            echo "<div class='item'>
                <a href='$slide_url'><img src='admin_area/slider_images/$slide_image' class='slider_image'></a>
                </div>";
                        }
                        ?>



                    </div><!--carousel-inner end-->
                    <a href="#myCarousel" class="left carousel-control" data-slide="Prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#myCarousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>

        <div id="advantage">
            <div class="container">
                <div class="same-height-row">

                    <?php
                    $get_boxes = "select * from boxes_section";

                    $run_box = mysqli_query($con, $get_boxes);
                    while ($row = mysqli_fetch_array($run_box)) {
                        $box_id = $row['box_id'];
                        $box_title = $row['box_title'];
                        $box_desc = $row['box_desc'];

                    ?>

                        <div class="col-sm-4">
                            <div class="box same-height">
                                <div class="icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <h3><a href="#"> <?php echo $box_title ?> </h3>
                                <P><?php echo $box_desc ?></P>
                            </div>
                        </div>

                    <?php  }  ?>

                </div>
            </div>
        </div>

        <div id="hot">
            <div class="box">
                <div class="container">
                    <div class="col-md-12">
                        <h2>Latest this week</h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="content" class="container">
            <div class="row">
                <?php
                getPro();
                ?>
            </div>
        </div>



        <!--footer start-->
        <?php
        include("includes/footer.php");
        ?>
        <!--footer end-->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>