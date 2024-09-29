<!-- Sidebar -->
<?php 

    if(isset($_GET['id'])){
        $customer_id = $_GET['id'];
    }
    include_once "part/sidebar.php";
    include_once "part/header.php";

?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
    
        if(isset($_POST['update_customer'])){

            $user_name  =   $_POST['user_name'];
            $user_phone  =   $_POST['user_phone'];
            $user_location  =   $_POST['user_location'];
            $user_password  =   $_POST['user_password'];

            
            if(empty($user_name)){
                $message = 'Name must not be empty';
                $msg = error_msg($message);

            }elseif(empty($user_phone)){
                $message = 'Phone must not be empty';
                $msg = error_msg($message);

            }elseif(empty($user_password)){
                $message = 'Password must not be empty';
                $msg = error_msg($message);
            }else {

                $obj->users->update_customer($user_name, $user_phone, $user_location, $user_password, $customer_id);
                //move_uploaded_file($user_img_tmp , '../assets/upload/'. $user_img);
                $message = 'Pharmacy has been updated successfully';
                $msg = success_msg($message);
            }
            
        }
        $location = $obj->location->show_location();
        
        $show = $obj->users->show_customer_id_wise($customer_id);
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
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="card-body">
                    <span><?php if(isset($msg)){echo $msg; } ?></span>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Name <span class="req">*</span></label>
                                    <input type="text" name="user_name" value="<?php echo $data['user_name'] ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Email <span class="req">*</span></label>
                                    <input type="email" disabled value="<?php echo $data['user_email'] ?>" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Phone <span class="req">*</span></label>
                                    <input type="text" name="user_phone" value="<?php echo $data['user_phone'] ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Location <span class="req">*</span></label>
                                    <select name="user_location" class="form-control" required>
                                        <option value="<?php echo $data['location_id'] ?>" > <?php echo $data['location_name'] ?></option>
                                        <?php foreach($location as $loc): ?>
                                        <option value="<?php echo $loc['location_id'] ?>"><?php echo $loc['location_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password <span class="req">*</span></label>
                            <input type="password" required name="user_password" value="<?php echo $data['user_pass'] ?>" class="form-control">
                        </div>

                        <button type="submit" name="update_customer" class="btn btn-primary">Update Customer</button>
                        <a href="all-customers.php?page=customer" class="btn btn-success">Go Back</a>
                    </form>
                 
                </div>
            </div>
           </div>

        </div>

        

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>