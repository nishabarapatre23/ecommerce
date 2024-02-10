<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row">
    <div col-lg-12>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Payments
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panell-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Payments
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Payment No:</th>
                                <th>Invoice No:</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Reference No:</th>
                                <th>Payment Date</th>
                                <th>Delete Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i=0;
                            $get_payments="select * from payments";
                            $run_payments=mysqli_query($con,$get_payments);
                            while ($row_Payments=mysqli_fetch_array($run_payments)){
                                $payment_id=$row_Payments['payment_id'];
                                $invoice_id=$row_Payments['invoice_id'];
                                $amount=$row_Payments['amount'];
                                $payment_mode=$row_Payments['payment_mode'];
                                $ref_no=$row_Payments['ref_no'];
                                $payment_date=$row_Payments['payment_date'];
                               $i++;
                               ?>
                        <tr>
                                <td><?php echo $i ?></td>
                                <td bgcolor="yellow"><?php echo $invoice_id ?></td>
                                <td>INR <?php echo $amount ?></td>
                                <td><?php echo $payment_mode ?></td>
                                <td><?php echo $ref_no ?></td>
                                <td><?php echo $payment_date ?></td>
                                <td>
                                    <a href="index.php?payment_delete=<?php echo $payment_id  ?>">
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



<?php } ?>



















