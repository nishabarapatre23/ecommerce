<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="row">
    <div col-lg-12>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Product
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panell-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Products
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Product Keyword</th>
                                <th>Product Date</th>
                                <th>Product Delete</th>
                                <th>Product Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i=0;
                            $get_product="select * from product";
                            $run_p=mysqli_query($con,$get_product);
                            while ($row_product=mysqli_fetch_array($run_p)){
                                $pro_id=$row_product['product_id'];
                                $product_title=$row_product['product_title'];
                                $product_img1=$row_product['product_img1'];
                                $product_price=$row_product['product_price'];
                                $product_keyword=$row_product['product_keyword'];
                                $date=$row_product['date'];
                               $i++;
                               ?>
                        
                               <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $product_title ?></td>
                                <td><img src="product_images/<?php echo $product_img1 ?>" width="120" height="120"> </td>
                                <td><?php echo $product_price ?></td>
                                <td><?php echo $product_keyword ?></td>
                                <td><?php echo $date ?></td>
                                <td>
                                    <a href="index.php?delete_product=<?php echo $pro_id  ?>">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_product=<?php echo $pro_id  ?>">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                </td>
                               </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php } ?>