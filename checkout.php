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

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
<body>
        
        <div id="top">   <!-- top bar start -->

<div class="container">
    <div class="col-md-6 offer">
        <a href="#" class="btn btn-success btn-sm">
            <?php   
            if(!isset($_SESSION['customer_email'])){
                echo "Welcome Guest";
            }   else {
                echo "welcome: " .$_SESSION['customer_email'] . "";
            } 
             ?>
         </a>

        <a href="#">Shopping Cart Total Price: INR 100, Total Items-2</a>
    </div>

    <div class="col-md-6 ">
        <ul class="menu">
            <li>
                <a href="customer_registration.php">Register</a>
            </li>     
            <li>
            <?php    
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'>My Account</a>";
                    } else{
                        echo "<a href='customer/my_account.php?my_order'> My Account</a>";
                    }
                    ?>           
                </li>     
            <li>
                <a href="cart.php">Go to Cart</a>
            </li>     
            <li>
                <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a> ";
                }
                else{
                    echo "<a href='logout.php'>Logout</a> ";
                }
                ?>
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
            <!-- <div class="logo"><a href="#"><img src="images/images.jpg"></a> -->
        </a>


<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
    <span class="sr-only">Toggle Navigation</span>
    <i class="fa fa-align-justify"></i>
</button>
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
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'>My Account</a>";
                    } else{
                        echo "<a href='customer/my_account.php?my_order'> My Account</a>";
                    }
                    ?>  
            </li>
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

<a href="cart.php" class="btn btn-primary navbar-btn right">
    <i class="fa fa-shopping-cart"></i>
    <span>4 items In Cart</span>
</a>

    <div class="navbar-collapse collapse right">
    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="search">
        <span class="sr-only">Toggle Search</span>
        <i class="fa fa-search"></i>
    </button>
    </div>
    
            <div class="collapse clearfix" id="search">
                <form class="navbar-form" method="get" action="result.php">
                    <div class="input-group">
                        <input type="text" name="user_query" placeholder="Search" class="form-control" required="">
                    <span class="input-group-btn">
                        <button type="submit" value="Search" name="search" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
</div>
    </div>
</div>

<div id="content"><!--content start-->
<div class="container"> <!--container start-->
    <div class="col-md-12"><!--col-md-12. start-->
        <ul class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li>
                CheckOut
            </li>
        </ul>
    </div> <!--col-md-12. end-->
        <div class="col-md-3">
                <?php   
                    include("includes/sidebar.php");
                ?>
        </div>
    
    <div class="col-md-9"><!--col md 9 start-->
        <?php 
            if(!isset($_SESSION['customer_email'])){
            include('customer/customer_login.php');
            }
            else{
                include('payment_option.php');
            }
        ?>
    </div><!--col md 9 end-->









        </div> <!--container. end-->
</div> <!--content end-->



<!--footer start-->
<?php
include("includes/footer.php");
?>
<!--footer end-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </body>
</html>