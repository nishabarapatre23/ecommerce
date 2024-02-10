<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard/Insert Product Categories
            </li>
        </ol>
    </div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading"><!--panel heading start-->
            <h3 class="panel-title">
                    <i class="fa fa-money fa-w"></i> Insert Product Category
                </h3>
            </div>
            <div class="panel-body">
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Title</label>
                        <div class="col-md-6">
                        <input type="text" name="p_cat_title" class="form-control" required="">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Product Category Description</label>
                        <div class="col-md-6">
<textarea name="text" name="p_cat_desc" class="form-control"></textarea>
</div>
<div class="form-group">
                        <label class="col-md-3 control-label"></label>

    <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">

</div>
</div>
            </form>
            </div>
</div>
</div>
</div>

    <?php 
        if (isset($_POST['submit'])){
            $p_cat_title = $_POST['p_cat_title'];
            $p_cat_desc = $_POST['p_cat_descri'];

        $insert_p_cat="insert into product_categories (p_cat_title,p_cat_descri) values ('$p_cat_title','$p_cat_desc')";

        $run_p_cat=mysqli_query($con,$insert_p_cat);

        if($run_p_cat){
            echo "<script>alert('New Product Category has been Inserted Successfully')</script>";
    echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }
        }
    ?>

<?php } ?>









