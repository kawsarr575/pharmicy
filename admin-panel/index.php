

<!-- Sidebar -->
<?php include_once 'part/sidebar.php'; ?>
<!-- End of Sidebar -->

    <!-- Topbar -->
    <?php 
        include_once 'part/header.php'; 

        $data = $obj->common->count_total_customer_vendor_product_for_admin();

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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
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
                    <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Join Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Join Date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    $data = $obj->users->show_all_accounts();
                                    foreach($data as $user):
                                ?>
                                <tr>
                                    <td>
                                        <img src="../assets/upload/<?php echo $user['user_img']; ?>" class="table-img" alt="Profile">
                                    </td>
                                    <td><?php echo $user['user_name']; ?></td>
                                    <td><?php echo $user['user_email']; ?></td>
                                    <td><?php echo $user['user_role']; ?></td>
                                    <td><?php echo $user['user_phone']; ?></td>
                                    <td><?php echo show_date($user['created_at']); ?></td>
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