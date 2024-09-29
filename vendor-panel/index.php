

<!-- Sidebar -->
<?php include_once 'part/sidebar.php'; ?>
<!-- End of Sidebar -->

    <!-- Topbar -->
    <?php 
        include_once 'part/header.php';
        $data = $obj->common->count_total_customer_vendor_product($user_id);
    ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Vendor</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">9000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Product</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['product']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-th-large fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pharmacy</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['vendor']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Customer</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['customer']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

           <div class="col-md-12">
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered product" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Vendor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Vendor</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $product = $obj->product->show_product_vendor_wise($user_id);
                                    foreach($product as $data):
                                ?>
                                <tr>
                                    <td><img src="../assets/product/<?php echo $data['product_img']; ?>" class="table-img" alt="Product"></td>
                                    <td><?php echo $data['product_name']; ?></td>
                                    <td><?php echo $data['product_price']; ?></td>
                                    <td><?php if($data['product_sale_price'] == 0){ echo 'N \ A'; }else{ echo $data['product_sale_price']; } ?></td>
                                    <td><?php echo $data['cat_name']; ?></td>
                                    <td><?php echo $data['user_name']; ?></td>
                                    <td>
                                        <a href="edit-product.php?page=product&id=<?php echo $data['product_id']; ?>"><i class="far fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="<?php echo $data['product_id']; ?>" class="delete-btn"><i class="far fa-trash-alt"></i></a>
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