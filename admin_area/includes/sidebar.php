<?php  
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav"><!--nav bar right top start-->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"> </i> <?php echo $admin_name ?>
            </a>
            
            <ul class="dropdown-menu">
        <li>
            <a href="index.php?user_profile?id=<?php echo $admin_id ?>">
                <i class="fa fa-fw-user"></i> Profile
            </a>
        </li>
        <li>
            <a href="index.php?view_product">
                <i class="fa fa-fw-envelope"></i> Products
                <span class="badge"><?php echo $count_pro ?></span>
            </a>
        </li>
        <li>
            <a href="index.php?view_customer">
                <i class="fa fa-fw-users"></i> Customer
                <span class="badge"><?php echo $count_cust ?></span>
            </a>
        </li>
        <li>
            <a href="index.php?pro_cat">
                <i class="fa fa-fw-gear"></i> Product Categories
                <span class="badge"><?php echo $count_p_cat ?></span>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="logout.php">Logout
                <i class="fa fa-fw fa-power-off"></i>
            </a>
        </li>
        
    </ul>

        </li>
    </ul><!--nav bar right top end-->
   
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav sidebar-nav">
        <li>
            <a href="index.php?dashboard">
               <i class="fa fa-fw fa-dashboard"></i>Dashboard
            </a>
        </li>
        <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#products"><i class="fa fa-fw fa-table"></i>Product</a><i class="fa fa-fw fa-caret-down"></i>
        
        <ul id="products" class="collapse">
            <li>
                <a href="index.php?insert_product">Insert Product</a>
            </li>
            <li>
                <a href="index.php?view_product">View Product</a>
            </li>
        </ul>
        </li><!--end here-->

        <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#product_cat"><i class="fa fa-fw fa-table"></i>Product Categories</a><i class="fa fa-fw fa-caret-down"></i>
        
        <ul id="product_cat" class="collapse">
            <li>
                <a href="index.php?insert_product_cat">Insert Product Categories</a>
            </li>
            <li>
                <a href="index.php?view_product_cat">View Product Categories</a>
            </li>
        </ul>
        </li><!--end here-->

        <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#categories"><i class="fa fa-fw fa-table"></i>Categories</a><i class="fa fa-fw fa-caret-down"></i>
        
        <ul id="categories" class="collapse">
            <li>
                <a href="index.php?insert_categories">Insert Categories</a>
            </li>
            <li>
                <a href="index.php?view_categories">View Categories</a>
            </li>
        </ul>
        </li><!--end here-->

        <li>
            <a href="#" data-toggle="collapse" data-target="#boxes">
            <i class="fa fa-fw fa-arrows"></i> Boxes Section
            <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="boxes" class="collapse">
                <li>
                    <a href="index.php?insert_box">Insert Box</a>
                </li>
                <li>
                    <a href="index.php?view_box">View Box</a>
                </li>
            </ul>
        </li>

        <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#slider"><i class="fa fa-fw fa-table"></i>Slider</a><i class="fa fa-fw fa-caret-down"></i>
        
        <ul id="slider" class="collapse">
            <li>
                <a href="index.php?insert_slider">Insert slider</a>
            </li>
            <li>
                <a href="index.php?view_slider">View slider</a>
            </li>
        </ul>
        </li><!--end here-->
        
        <li>
            <a href="index.php?view_customer"><i class="fa fa-fw fa-edit"></i>View Customer</a>
        </li>
        <li>
            <a href="index.php?view_order"><i class="fa fa-fw fa-list"></i>View Order</a>
        </li>
        <li>
            <a href="index.php?view_payment"><i class="fa fa-fw fa-pencil"></i>View Payments</a>
        </li>
        
        <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-table"></i>Users</a><i class="fa fa-fw fa-caret-down"></i>
        
        <ul id="users" class="collapse">
            <li>
                <a href="index.php?insert_users">Insert Users</a>
            </li>
            <li>
                <a href="index.php?view_users">View Users</a>
            </li>
            <li>
                <a href="index.php?user_profile?id=<?php echo $admin_id ?>">Edit Profile</a>
            </li>
        </ul>
        </li><!--end here-->
    </ul>
</div>

</nav>

<?php  }  ?>















