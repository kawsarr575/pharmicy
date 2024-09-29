

<!-- Sidebar -->
<?php 
    include_once "part/sidebar.php";
    include_once "part/header.php";

    if(isset($_POST['update_order_staus'])){
        $order_id = $_POST['order_id'];

        $obj->orders->update_order_status($order_id);
    }
?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Order</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
           <div class="col-md-12">
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lists</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered product" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Prescription</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Prescription</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                    $product = $obj->orders->show_order_vendor_wise($user_id);
                                    foreach($product as $data):
                                        $customer_id = $data['o_customer_id'];

                                    foreach( $obj->users->get_customer_info($customer_id) as $cus);
                                ?>
                                <tr>
                                    <td><?php echo $data['order_id']; ?></td>
                                    <td><?php echo show_date($data['created_at']); ?></td>
                                    <td><?php echo $data['o_product_name']; ?></td>
                                    <td><?php echo $data['o_sub_total'] ?></td>
                                    <td><?php echo $cus['user_name']; ?></td>
                                    <td><?php echo $cus['user_email']; ?></td>
                                    <td><?php echo $cus['user_phone']; ?></td>
                                    <td><?php echo $cus['user_address']; ?></td>
                                    <td>
                                        <?php if(empty($data['o_prescription_img'])):?>
                                            N \ A 
                                        <?php else:?>
                                            <a href="../assets/upload/<?php echo $data['o_prescription_img']; ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="View Customer Medicine Prescription">
                                                <img src="../assets/upload/<?php echo $data['o_prescription_img']; ?>" class="table-img" alt="">
                                            </a>
                                            
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
                                            <input type="submit" class="btn <?php if($data['o_status'] == 'Pending'){echo 'btn-warning'; }else{ echo 'btn-primary';} ?>" name="update_order_staus" value="<?php echo $data['o_status']; ?>" data-toggle="tooltip" data-placement="top" title="<?php if($data['o_status'] == 'Pending'){echo 'Are you want to complete this order?'; }else{ echo 'Order is completed';} ?>">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           </div>

        </div>

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>