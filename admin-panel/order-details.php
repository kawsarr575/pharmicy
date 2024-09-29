

<!-- Sidebar -->
<?php 
    include_once "part/sidebar.php"; 
    include_once "part/header.php";

    if(isset($_GET['id'])){
        $order_id = $_GET['id'];
    }


    $order = $obj->orders->show_order_id_wise_admin_page($order_id);
    foreach($order as $o);

    $customer = $obj->users->show_customer_details_in_order_detals_page($o['o_customer_id']);
    foreach($customer as $cus);

    $vendor = $obj->users->show_vendor_details_in_order_detals_page($o['o_vendor_id']);
    foreach($vendor as $ven);

 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
           <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Vendor Details</h6>
                    </div>
                    <div class="card-body">
                        <p><b>Pharmacy Name :</b> <?php echo $ven['user_name']; ?> </p>
                        <p><b>Email Address :</b> <?php echo $ven['user_email']; ?></p>
                        <p><b>Phone :</b> <?php echo $ven['user_phone']; ?></p>
                        <p><b>Address :</b> <?php echo $ven['location_name']; ?></p>

                        <!-- <button type="submit" name="update_product" class="btn btn-primary">Update Product</button> -->
                        <a href="orders.php?page=orders" class="btn btn-success">Go Back</a>
                        
                    </div>
                </div>
            </div>
       
           <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
                    </div>
                    <div class="card-body">
                        <p><b>Product ID :</b> <?php echo $o['order_id']; ?> </p>
                        <p><b>Product Name :</b> <?php echo $o['o_product_name']; ?></p>
                        <p><b>Quantity :</b> <?php echo $o['o_quantity']; ?></p>
                        <p><b>Price :</b> <?php echo $o['o_price']; ?></p>
                        <p><b>Total Price :</b> <?php echo $o['o_sub_total']; ?></p>
                        <p><b>Status :</b> <?php echo $o['o_status']; ?></p>
                    </div>
                </div>
           </div> 
           
           <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Customer Details</h6>
                    </div>
                    <div class="card-body">
                        <p><b>Pharmacy Name :</b> <?php echo $cus['user_name']; ?> </p>
                        <p><b>Email Address :</b> <?php echo $cus['user_email']; ?></p>
                        <p><b>Phone :</b> <?php echo $cus['user_phone']; ?></p>
                        <p><b>Address :</b> <?php echo $cus['user_address']; ?></p>
                    </div>
                </div>
           </div>

        </div>

        
    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>