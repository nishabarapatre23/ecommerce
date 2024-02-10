<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php   
    if(isset($_GET['edit_p_cat'])){
        $edit_p_cat_id=$_GET['edit_p_cat'];
        $edit_p_cat_query="select * from product_categories where p_cat_id='$edit_p_cat_id'";
        $run_edit=mysqli_query($con,$edit_p_cat_query);
        $row_edit=mysqli_fetch_array($run_edit);
        $p_cat_id=$row_edit['p_cat_id'];
        $p_cat_title=$row_edit['p_cat_title'];
        $p_cat_desc=$row_edit['p_cat_descri'];

    }

    ?>

<div class="row"><!--breadcrumb row start-->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-pencil"></i>
                Dashboard/Edit Product Category
            </li>
</ol>
    </div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
            <div class="panel-heading"><!--panel heading start-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-w"></i> Edit Product Category
                </h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Title</label>
                        <div class="col-md-6">
                        <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title ?>">
                    </div>
         </div>
         <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Discription</label>

                        <div class="col-md-6">
                            <textarea type="text" name="p_cat_desc" class="form-control"><?php echo $p_cat_desc ?></textarea>
             </div>
         </div>
    
         <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
<input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        </div>
                        </div>
                </form>
            </div>
</div>
</div>
</div>

<?php 
if(isset($_POST['update'])){
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_descri'];

    $update_p_cat="update product_categories set p_cat_title='$p_cat_title',p_cat_descri='$p_cat_desc' where p_cat_id='$p_cat_id' ";
    $run_p_cat = mysqli_query($con,$update_p_cat);

    if($run_p_cat){
        echo "<script> alert('Product category Updated Successfully') </script>";

    echo "<script> window.open('index.php?view_product_cat','_self') </script>";
}
}

?>
<?php } ?>



















