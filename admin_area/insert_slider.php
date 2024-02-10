<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
?>

<div class="row"><!--breadcrumb row start-->
    <div class="col-lg-12">
    <ol class="breadcrumb">
        <li class="active">
                <i class="fa fa-dashboard"></i>
                Dashboard/Insert Slide
            </li>
</ol>
    </div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
            <div class="panel-heading"><!--panel heading start-->
                <h3 class="panel-title">
                <i class="fa fa-money fa-w"></i> Insert Slide
                </h3>
            </div>
            <div class="panel-body">
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Name:</label>
                        <div class="col-md-6">
                        <input type="text" name="slide_name" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Url:</label>
                        <div class="col-md-6">
                        <input type="text" name="slide_url" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Slide Image:</label>
                        <div class="col-md-6">
                            <input type="file" name="slide_image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        </div>
                    </div>
            </form>
            </div>
</div>
</div>
</div>

<?php  
if(isset($_POST['submit'])){
$slide_name=$_POST['slide_name'];
$slide_url=$_POST['slide_url'];
$slide_image=$_FILES['slide_image']['name'];

$temp_name=$_FILES['slide_image']['tmp_image'];

$view_slides="select * from slide";

$view_run_slides= mysqli_query($con,$view_slides);

$count=mysqli_num_rows($view_run_slides);

if ($count<10){

    move_uploaded_file($temp_name,"slider_images/$slide_image");

    $insert_slide="insert into slide (slide_name,slide_image,slide_url) values ('$slide_name','$slide_image','$slide_url')";

    $run_slide=mysqli_query($con,$insert_slide);

    echo "<script>alert('New Slide has been Inserted')</script>";

    echo "<script>window.open('index.php?view_slider','_self')</script>";
}
else{
    echo "<script>alert('You have already Inserted 10 slides')</script>";

}
}

?>

<?php } ?>



















