<!-- Sidebar -->
<?php 

    if(isset($_GET['id'])){
        $location_id = $_GET['id'];
    }
    include_once "part/sidebar.php";
    include_once "part/header.php";

?>

 

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
    
        if(isset($_POST['update_location'])){
            $location_name  =   $_POST['location_name'];

            if(empty($location_name)){
                $message = 'Location Field is empty';
                $msg = error_msg($message);
            }else {
                $obj->location->update_location($location_name, $location_id);
                $message = 'Location has been updated successfully';
                $msg = success_msg($message);
            }
        }

        $show = $obj->location->show_location_id_wise($location_id);
        foreach($show as $data);

    ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update</h1>
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
                            <input type="text" name="location_name" value="<?php  echo $data['location_name']; ?>" class="form-control">
                        </div>

                        <button type="submit" name="update_location" class="btn btn-primary">Update</button>
                        <a href="all-locations.php?page=location" class="btn btn-success">Go Back</a>
                    </form>
                </div>
            </div>
           </div>

        </div>

        

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>