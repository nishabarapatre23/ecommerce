<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}
else{
include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
}
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
                <a href="../login.php">Login</a>
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
            <li>
                <a href="../about.php">About Us</a>
            </li>
            <li>
                <a href="../services.php">Services</a>
            </li>
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
    <div class="box">
        <h1 align="center">Please confirm your payment</h1>
        <form action="confirm.php?update_id=<?php echo $order_id ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Invoice Number</label>
                <input type="text" class="form-control" name="invoice_number" required="">
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="text" class="form-control" name="amount" required="">
            </div>
            <div class="form-group">
                <label>Select Payment Mode</label>
                <select class="form-control" name="payment_mode">
                    <option>Bank Transfer</option>
                    <option>Paypal</option>
                    <option>PayTm</option>
                    <option>PayuMoney</option>
                </select>
            </div>
            <div class="form-group">
                <label>Transection Number</label>
                <input type="text" class="form-control" name="trans_no" required="">
            </div>
            <div class="form-group">
                <label>Payment Date</label>
                <input type="date" class="form-control" name="date" required="">
            </div>
            <div class="text-center">
                <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
            </div>
        </form>

        <?php  
        if(isset($_POST['confirm_payment'])){
            $update_id=$_GET['update_id'];
            $invoice_number=$_POST['invoice_number'];
            $amount=$_POST['amount'];
            $payment_mode=$_POST['payment_mode'];
            $trans_no=$_POST['trans_no'];
            $date=$_POST['date'];
            $complete="Complete";
            $insert = "INSERT INTO payments (invoice_id, amount, payment_mode, ref_no, payment_date) 
            VALUES ('$invoice_number', '$amount', '$payment_mode', '$trans_no', '$date')";

            $run_insert = mysqli_query($con, $insert);


            $update_q="update customer_order set order_status='$complete' where order_id='$update_id' ";
            $run_insert=mysqli_query($con,$update_q);

            // $update_p="update pending_order set order_status = '$complete' where order_id='$update_id'";

            // $run_insert=mysqli_query($con,$update_p);

            echo "<script>alert('Your order has been received')</script>";
            echo "<script>window.open('my_account.php?order','_self')</script>";

            
        }
        ?>
    </div>
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

<?php }  ?>