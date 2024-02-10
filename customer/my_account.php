<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}
else{
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
        <a href="#" class="btn btn-success btn-sm">Welcome Guest</a>
        <a href="#">Shopping Cart Total Price: INR 100, Total Items-2</a>
    </div>

    <div class="col-md-6 ">
        <ul class="menu">
            <li>
                <a href="../customer_registration.php">Register</a>
            </li>     
            <li>
                <a href="my_account.php">My Account</a>
            </li>     
            <li>
                <a href="../cart.php">Go to Cart</a>
            </li>     
            <li>
            <a href="login.php">
                <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a> ";
                }
                else{
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
        <a class="navbar-brand home" href="../index.php">
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
            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
                <a href="../Shop.php">Shop</a>
            </li>
            <li class="active">
                <a href="my_account.php">My Account</a>
            </li>
            <li>
                <a href="../cart.php">Shopping Cart</a>
            </li>
            <!-- <li>
                <a href="../about.php">About Us</a>
            </li>
            <li>
                <a href="../services.php">Services</a>
            </li> -->
            <li>
                <a href="../contactus.php">Contact Us</a>
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
                My Account
            </li>
        </ul>
    </div> <!--col-md-12. end-->
    <div class="col-md-3"> <!--col-md-3 start-->
    <?php
        include("includes/sidebar.php");
    ?>
    </div><!--col-md-3 end-->

    <div class="col-md-9">
        <!--including my order.php page start-->
        <?php
            if(isset($_GET['my_order'])){
                include("my_order.php");
            }
        ?>
        <!--including my order.php page end-->

          <!--including payoffline.php page start-->
            <?php
            if(isset($_GET['pay_offline'])){
                include("pay_offline.php");
            }
            ?>
               <!--including payoffline.php page end-->

               <!--including editaccount.php page start-->
               <?php
            if(isset($_GET['edit_acc'])){
                include("edit_acc.php");
            }
            ?>
             <!--including editaccount.php page end-->

                 <!--including chngpass.php page start-->
                 <?php
            if(isset($_GET['change_pass'])){
                include("change_pass.php");
            }
            ?>
                  <!--including chngpass.php page end-->

            <!--including deleteacc.php page start-->
            <?php
            if(isset($_GET['delete_acc'])){
                include("delete_acc.php");
            }
            ?>
            <!--including deleteacc.php page end-->



    </div>







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

<?php    } ?>