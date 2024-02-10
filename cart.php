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
                    ?>                       
                </li>     
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
                    ?>                      
              </li>
            <li class="active">
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
                Cart
            </li>
        </ul>
    </div> <!--col-md-12. end-->
    
        <div class="col-md-9" id="cart"><!--col-md-9 start-->
            <div class="box">
                <form action="cart.php" method="POST" enctype="multipart/form-data">
                   
                <h1>Shopping Cart</h1>

                        <?php 
                        $ip_add=getUserIP();
                        $select_cart="select * from cart where ip_add='$ip_add' ";
                        $run_cart=mysqli_query($con,$select_cart);
                        $count=mysqli_num_rows($run_cart);

                        ?>

                    <p class="text-muted">Currently You have <?php echo $count ?> item(s) in your cart.</p>
                    <div class="table.responsive"><!--table.responsive start-->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="1">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php     
                                $total=0;
                                while($row=mysqli_fetch_array($run_cart)){
                                    $pro_id=$row['p_id'];
                                    $pro_size=$row['size'];
                                    $pro_qty=$row['qty'];
                                    $get_product="select * from product where product_id='$pro_id' ";
                                    $run_product=mysqli_query($con,$get_product);
                                    while($row=mysqli_fetch_array($run_product)){
                                        $p_title=$row['product_title'];
                                        $p_img1=$row['product_img1'];
                                        $p_price=$row['product_price'];
                                        $sub_total=$row['product_price']*$pro_qty;
                                        $total+=$sub_total; //$total=$total+$sub_total;
                                   
                                ?>
                                <tr>
                                    <td><img src="admin_area/product_images/<?php echo $p_img1  ?>" alt=""></td>
                                    <td><?php  echo $p_title ?></td>
                                    <td><?php  echo $pro_qty ?></td>
                                    <td><?php  echo $p_price ?></td>
                                    <td><?php  echo $pro_size ?></td>
                                    <td><input type="checkbox" name="remove[]" value="<?php  echo $pro_id ?>"></td>
                                    <td><?php  echo $sub_total ?></td>
                                </tr>
                                <?php        
                                }  }
                                ?>
                            
                            </tfoot>
                        </table>
                    </div> <!--table.responsive end-->

                    <div class="box-footer">
                        <div class="pull-left"><!--pull-left" start-->
                            <h4>Total Price</h4>
                        </div><!--pull-left" end-->
                        <div class="pull-right">
                            <h4>INR <?php echo $total; ?></h4>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="pull-left"><!--pull-left" start-->
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i>Continue Shopping
                            </a>
                        </div><!--pull-left" end-->
                        <div class="pull-right">
                            <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                <i class="fa fa-refresh">Update cart</i>
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                                Proceed to checkout<i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <?php  
            function update_cart(){
                global $con;
                if(isset($_POST['update'])){
                    foreach($_POST['remove'] as $remove_id){
                        $delete_product="delete from cart where p_id='$remove_id' ";
                        $run_del=mysqli_query($con,$delete_product);
                        if($run_del){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo @$up_cart= update_cart();
            ?>

            <div id="row same-height-row"> <!--row same-height-row start-->
        <div class="col-md-3 col-sm-6">
            <div  class="box same-height headline ">
                <h3 class="text-center">You also Like These Products</h3>
            </div>
        </div>
        <div class="center-responsive col-md-3"><!-- center-responsive start-->
            <div class="product same-height">
                <a href="">
                    <img src="admin_area/product_images/9.jpg" class="img-responsive" alt="">
                </a>
                <div class="text">
                    <h3><a href="details.php">Made with 100% Cotton and this Hoodie will prove to be the perfect companion making it fashionable and essential both in equal parts. </a></h3>
               <p class="price"><?php  echo $total ?></p>
                </div>
            </div>
        </div><!--center center-responsive end-->

        <div class="center-responsive col-md-3"><!--center center-responsive start-->
            <div class="product same-height">
                <a href="">
                    <img src="admin_area/product_images/8.jpg" class="img-responsive" alt="">
                </a>
                <div class="text">
                    <h3><a href="details.php">Made with 100% Cotton and this Hoodie will prove to be the perfect companion making it fashionable and essential both in equal parts. </a></h3>
               <p class="price"><?php  echo $total ?></p>
                </div>
            </div>
        </div><!--center center-responsive end-->

        <div class="center-responsive col-md-3"><!--center center-responsive start-->
            <div class="product same-height">
                <a href="">
                    <img src="admin_area/product_images/11.jpg" class="img-responsive" alt="">
                </a>
                <div class="text">
                    <h3><a href="details.php">Made with 100% Cotton and this Hoodie will prove to be the perfect companion making it fashionable and essential both in equal parts. </a></h3>
               <p class="price"><?php  echo $total ?></p>
                </div>
            </div>
        </div><!--center center-responsive end-->

    </div> <!--row same-height-row end-->
        </div><!--col-md-9 end-->

        <div class="col-md-3"><!--col-md-3 start-->
        <div class="box" id="order-summary">
            <div class="box-header">
                <h3>Order summary</h3>
            </div>
            <p class="text-muted">
                Shipping and additional costs are calculated based on the values you have entered
            </p>
            <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Order Subtotal</td>
                        <th><?php echo $total ?></th>
                    </tr>
                    <tr>
                        <td>Shipping and handling</td>
                        <td>INR 0</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>INR 0</td>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <th><?php echo $total ?></th>
                    </tr>
                </tbody>
            </table>

            </div>
        </div>
        </div><!--col-md-3 end-->



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
