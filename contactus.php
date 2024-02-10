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
        <a href="#">Shopping Cart Total Price: INR <?php totalPrice() ?>, Total Items <?php item();  ?> </a>
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
                    ?>            </li>     
            <li>
                <a href="cart.php">Go to Cart</a>
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
            <li>
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
                    ?>            </li>
            <li>
                <a href="cart.php">Shopping Cart</a>
            </li>
            <!-- <li>
                <a href="about.php">About Us</a>
            </li>
            <li>
                <a href="services.php">Services</a>
            </li> -->
            <li class="active">
                <a href="contactus.php">Contact Us</a>
            </li>
        </ul>
    </div>

<a href="cart.php" class="btn btn-primary navbar-btn right">
    <i class="fa fa-shopping-cart"></i>
    <span><?php item();  ?>  items In Cart</span>
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
                Contact us
            </li>
        </ul>
    </div> <!--col-md-12. end-->
    

<div class="col-md-9"><!--col-md-9 start-->
    <div class="box"><!--box start-->
        <div class="box-header"><!--box box-header start-->
        <center>
            <h2>Contact Us</h2>
            <p class="text-muted">If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>
        </center>
        </div><!--box-header end-->
    <form action="contactus.php" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required="">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required="">
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="submit" class="form-control" required="">
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="message"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="fa fa-user-md"></i> Send Message
            </button>
        </div>
    </form>
    </div><!--box end-->
</div><!--col-md-9 end-->



















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

<?php  
if(isset($_POST['submit'])){
    $senderName=$_POST['name'];
    $senderEmail=$_POST['email'];
    $senderSubject=$_POST['subject'];
    $senderMassage=$_POST['massage'];
    $receiverEmail="spiderindus@gmail.com";
    mail($receiverEmail,$senderName, $senderSubject,$senderMassage,$receiverEmail);
    //customer mail
    $email=$_POST['email'];
    $subject="welcome to our website";
    $msg="I shall get you soon, thanks for sending email...!";
    $from="spiderindus@gmail.com";
    mail($email,$subjec,$msg,$from);  
    echo "<h2 align='center'>Your mail sent</h2>";
}

?>