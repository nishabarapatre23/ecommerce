<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
?>

<?php   
    if(isset($_GET['edit_cat'])){
        $edit_id=$_GET['edit_cat'];
        $edit_cat="select * from categories where cat_id='$edit_id'";
        $run_edit=mysqli_query($con,$edit_cat);
        $row_edit=mysqli_fetch_array($run_edit);
        $c_id=$row_edit['cat_id'];
        $c_title=$row_edit['cat_title'];
        $c_desc=$row_edit['cat_descri'];
    }
    ?>
    <div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-pencil"></i>
                Dashboard/Edit Category
            </li>
            </ol>
    </div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
            <div class="panel-heading"><!--panel heading start-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-w"></i> Edit Category
                </h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                    <label class="col-md-3 control-label">Category Title</label>
                        <div class="col-md-6">
                        <input type="text" name="cat_title" class="form-control" value="<?php echo $c_title ?>">
                    </div>
         </div>
         <div class="form-group">
                        <label class="col-md-3 control-label">Category Discription</label>

                        <div class="col-md-6">
                            <textarea type="text" name="cat_desc" class="form-control"><?php echo $c_desc ?></textarea>
             </div>
         </div>
         <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
<input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
                        </div>
                        </div>
                        </form>
            </div>
</div>
</div>
</div>
<?php 
if(isset($_POST['update'])){
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_descri'];

    $update_cat="update categories set cat_title='$cat_title',cat_descri='$cat_desc' where cat_id='$c_id' ";
    $run_cat = mysqli_query($con,$update_cat);

    if($run_cat){
        echo "<script> alert('Product category Updated Successfully') </script>";

    echo "<script> window.open('index.php?view_categories','_self') </script>";
}
}

?>
<?php } ?>

























