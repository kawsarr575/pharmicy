<!-- Sidebar -->
<?php include_once "part/sidebar.php"; ?>
<!-- End of Sidebar -->

    <!-- Topbar -->
    <?php include_once "part/header.php"; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
    
        if(isset($_POST['add_location'])){

            $location_name  =   $_POST['location_name'];
            if(empty($location_name)){
                $message = 'Location Field is empty';
                $msg = error_msg($message);
            }else {
                $obj->location->create_location($location_name);
                $message = 'Location has been added successfully';
                $msg = success_msg($message);
            }
            
        }
    ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add New</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="col-md-2"></div>
           <div class="col-md-8">
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Location</h6>
                </div>
                <div class="card-body">
                    <span><?php if(isset($msg)){echo $msg; } ?></span>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Location Name</label>
                            <input type="text" name="location_name" class="form-control">
                        </div>

                        <button type="submit" name="add_location" class="btn btn-primary">Add New</button>
                    </form>
                </div>
            </div>
           </div>

        </div>

        

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>