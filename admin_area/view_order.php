<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row">
    <div col-lg-12>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order No:</th>
                                <th>Customer Email:</th>
                                <th>Invoice No:</th>
                                <th>Product Title</th>
                                <th>Product Qty</th>
                                <th>Product Size</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Delete Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i=0;
                            $get_orders="select * from customer_order";
                            $run_orders=mysqli_query($con,$get_orders);
                            while ($row=mysqli_fetch_array($run_orders)){
                                $order_id=$row['order_id'];
                                $c_id=$row['customer_id'];
                                $invoice_no=$row['invoice_no'];
                                $product_id=$row['product_id'];
                                $due_amount=$row['due_amount'];

                                $qty=$row['qty'];
                                $size=$row['size'];
                                $order_date=$row['order_date'];
                                $order_status=$row['order_status'];
                               
                                $get_product="select * from product where product_id='$product_id'";
                                $run_product=mysqli_query($con,$get_product);
$row_product=mysqli_fetch_array($run_product);
$product_title=$row_product['product_title'];
                                $i++;
                               ?>
                        <tr>
                        
                        <td><?php echo $i ?></td>

                        <td>
                        <?php 
                        $get_customer="select * from customers where customer_id='$c_id'";
                            $run_customer=mysqli_query($con,$get_customer);
                            $row_customer=mysqli_fetch_array($run_customer);
                            $customer_email=$row_customer['customer_email'];
                            echo $customer_email;
                            ?>

                        </td>
                        <td bgcolor="yellow"><?php echo $invoice_no ?></td>
                        <td><?php echo $product_title ?></td>
                        <td><?php echo $qty ?></td>
                        <td><?php echo $size ?></td>
                        <td><?php echo $order_date ?></td>
                        <td>INR <?php echo $due_amount ?></td>
<td>
    <?php
    if($order_status=='pending'){
        echo $order_status='pending';
    }
    else{
        echo $order_status='complete';

    }

    ?>
</td>
<td>
                 <a href="index.php?order_delete=<?php echo $order_id  ?>">
               <i class="fa fa-trash-o"></i> Delete
               </a>
   </td>

                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
</div>
</div>
</div>
</div>

<?php  }  ?>


















