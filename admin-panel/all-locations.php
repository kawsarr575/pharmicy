<!-- Sidebar -->
<?php include_once "part/sidebar.php"; ?>
<!-- End of Sidebar -->

    <!-- Topbar -->
    <?php include_once "part/header.php"; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Location</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="col-md-2"></div>
           <div class="col-md-8">
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Location List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered location" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $loc = $obj->location->show_location();

                                    foreach($loc as $data):
                                ?>
                                <tr>
                                    <td><?php echo $data['location_name']; ?></td>
                                    <td>
                                        <a href="edit-location.php?page=location&id=<?php echo $data['location_id']; ?>"><i class="far fa-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="<?php echo $data['location_id']; ?>" class="delete-btn"><i class="far fa-trash-alt"></i></a>
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