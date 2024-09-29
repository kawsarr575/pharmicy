

<!-- Sidebar -->
<?php 
    include_once "part/sidebar.php";
    include_once "part/header.php";

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
                        <table class="table table-bordered order" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                    $product = $obj->orders->show_all_order_admin_page();
                                    foreach($product as $data):
                                        
                                ?>
                                <tr>
                                    <td><?php echo $data['order_id']; ?></td>
                                    <td><?php echo $data['created_at']; ?></td>
                                    <td><?php echo $data['o_product_name']; ?></td>
                                    <td><?php echo $data['o_quantity']; ?></td>
                                    <td><?php echo $data['o_sub_total'] ?></td>
                                    <td>
                                        
                                        <input type="button" class="btn <?php if($data['o_status'] == 'Pending'){echo 'btn-warning'; }else{ echo 'btn-primary';} ?>" name="update_order_staus" value="<?php echo $data['o_status']; ?>" data-toggle="tooltip" data-placement="top" title="<?php if($data['o_status'] == 'Pending'){echo 'Are you want to complete this order?'; }else{ echo 'Order is completed';} ?>">
                                       
                                    </td>
                                    <td>
                                        <a href="order-details.php?page=orders&id=<?php echo $data['order_id']; ?>"><i class="far fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="<?php echo $data['order_id']; ?>" class="delete-btn"><i class="far fa-trash-alt"></i></a>
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