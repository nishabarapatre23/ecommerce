<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
   
if(isset($_GET['pro_id'])){
     $pro_id=$_GET['pro_id'];
    $get_product="select * from product where product_id='$pro_id' ";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
    $pro_cat_id=$row_product['p_cat_id'];
    
    $pro_title=$row_product['product_title'];
    $pro_price=$row_product['product_price'];
    $p_descri=$row_product['product_descri'];
    $p_img1=$row_product['product_img1'];
    $p_img2=$row_product['product_img2'];
    $p_img3=$row_product['product_img3'];
    $get_p_cat="select * from product_categories where p_cat_id=$pro_cat_id ";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_id=$row_p_cat['p_cat_id'];
    $p_cat_title=$row_p_cat['p_cat_title'];
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
                <a href="./customer/my_account.php">My Account</a>
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
            <li class="active">
                <a href="Shop.php">Shop</a>
            </li>
            <li>
            <a href="./customer/my_account.php">My Account</a>
            </li>
            <li>
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li>
                <a href="about.php">About Us</a>
            </li>
            <li>
                <a href="services.php">Services</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
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

<div id="content">
<div class="container"> <!--container start-->
    <div class="col-md-12"><!--col-md-12. start-->
        <ul class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li>
                Shop
            </li>
            <li>
                <a href="shop.php?p_cat=<?php echo $pro_cat_id; ?>"> <?php echo $pro_title; ?> </a>
                  </li>
            <li>
                <?php echo $pro_title ?> </li>
            
            
        </ul>
    </div> <!--col-md-12. end-->
    <div class="col-md-3"> <!--col-md-3 start-->
    <?php
        include("includes/sidebar.php");
    ?>
    </div><!--col-md-3 end-->

<div class="col-md-9">
    <div class="row" id="productmain">
        <div class="col-sm-6"> <!--col-sm-6 start-->
            <div id="mainimage">
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1"></li>
                        <li data-target="#mycarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner"><!--inner start-->
                        <div class="item active">
                            <center>
                                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                            </center>
                        </div>
                        <div class="item">
                        <center>
                                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive" width="200" height="200">
                            </center>
                        </div>
                        <div class="item">
                        <center>
                                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive" width="200" height="200">
                            </center>
                        </div>
                    </div><!--inner end-->
                    <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#mycarousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> <!--col-sm-6 end-->

        <div class="col-sm-6"><!--col-6 start-->
            <div class="box"><!--box start-->
                <h1 class="text-center"><?php echo $pro_title ?></h1>

                <?php   
                addCart();
                ?>

                <form action="details.php?add_cart=<?php echo $pro_id ?>" method="POST" class="form-horizontal">
                    <div class="form-group"><!--form-group start-->
                        <label class="col-md-5 control-label">Product Quantity</label>
                        <div class="col-md-7"><!--col-7 start-->
                            <select name="product_qty" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div><!--col-7 end-->
                    </div><!--form-group end-->
               
                <div class="form-group">
                    <label class="col-md-5 control-label">Product Size</label>
                    <div class="col-md-7">
                        <select name="product_size" class="form-control">
                            <option>Select a Size</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                        </select>
                    </div>
                </div>
               <p class="price">INR <?php  echo $pro_price ?></p>
                <p class="text-center buttons">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                </p>
            </form>
            </div> <!--box end-->
        <div class="col-xs-4">
            <a href="#" class="thmb">
                <img src="admin_area/product_images/13.jpg" class="img-responsive">
            </a>
        </div>
        <div class="col-xs-4">
            <a href="#" class="thmb">
                <img src="admin_area/product_images/12.jpg" class="img-responsive">
            </a>
        </div>
        <div class="col-xs-4">
            <a href="#" class="thmb">
                <img src="admin_area/product_images/11.jpg" class="img-responsive">
            </a>
        </div>
          </div><!--col-6 end-->
    </div>

<div class="box" id="details">
    <h4>Product Details</h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
         a type specimen book. It has survived not only five centuries, but 
        also the leap into electronic typesetting, remaining essentially unchanged. It was popularised</p>

    <h4>Size</h4>
    <ul>
        <li>Small</li>
        <li>Medium</li>
        <li>Large</li>
        <li>Extra Large</li>
    </ul>
</div>
    <div id="row same-height-row"> <!--row same-height-row start-->
        <div class="col-md-3 col-sm-6">
            <div class="box same-height headline">
                <h3 class="text-center">You also Like These Products</h3>
            </div>
        </div>

        <?php  
        $get_product="select * from product order by 1 LIMIT 0,3";
        $run_product=mysqli_query($con,$get_product);
        while($row=mysqli_fetch_array($run_product)){
            $pro_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_price=$row['product_price'];
            $product_img1=$row['product_img1'];

            echo "
            <div class='center-responsive col-md-3 col-sm-6'>
            <div class='product same-height'>
            <a href='details.php?pro_id=$pro_id'>
            <img src='admin_area/product_images/$product_img1' class='img-responsive'>
            </a>
            <div class='text'>
            <h3><a href='details.php?pro_id'>$product_title</a></h3>
            <p class='price'>$product_price</p>
            </div>
            </div>
            </div>
            ";
        }

        ?>

    </div> <!--row same-height-row end-->
    
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
