<!-- Sidebar -->
<?php include_once "part/sidebar.php"; ?>
<!-- End of Sidebar -->

    <!-- Topbar -->
    <?php include_once "part/header.php"; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
    
        if(isset($_POST['add_vendor'])){

            $user_name  =   $_POST['user_name'];
            $user_email  =   $_POST['user_email'];
            $user_phone  =   $_POST['user_phone'];
            $user_location  =   $_POST['user_location'];
            $user_password  =   $_POST['user_password'];

            $user_img  =   $_FILES['user_img']["name"];
            $user_img_tmp  =   $_FILES['user_img']["tmp_name"];

            $tokra = explode('.', $user_img);
			$ext = end($tokra);
			$valid_image_format = array('jpg','jpeg','png','gif');
			$image_format = in_array($ext , $valid_image_format);
            $imageu = md5(time().$user_img).'.'.$ext;

            $email_exist = $obj->users->select_users();

            if(empty($user_name)){
                $message = 'Name must not be empty';
                $msg = error_msg($message);

            }elseif( $email_exist == $user_email ){
                $message = 'Email already exist';
                $msg = error_msg($message);

            }elseif( $image_format == false ){
                $message = 'File supported only jpg, jpeg, png and gif';
                $msg = error_msg($message);

            }elseif(empty($user_email)){
                $message = 'Email must not be empty';
                $msg = error_msg($message);

            }elseif(empty($user_phone)){
                $message = 'Phone must not be empty';
                $msg = error_msg($message);

            }elseif(empty($user_password)){
                $message = 'Password must not be empty';
                $msg = error_msg($message);
            }else {

                $obj->users->create_vendor($user_name,$user_email,$user_phone,$user_location,$user_password,$imageu);
                move_uploaded_file($user_img_tmp , '../assets/upload/'.$imageu);
                $message = 'Pharmacy has been added successfully';
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
                    <h6 class="m-0 font-weight-bold text-primary">Pharmacy</h6>
                </div>
                <div class="card-body">
                    <span><?php if(isset($msg)){echo $msg; } ?></span>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pharmacy Name <span class="req">*</span></label>
                                    <input type="text" name="user_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pharmacy Email <span class="req">*</span></label>
                                    <input type="email" name="user_email" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Pharmacy Image</label>
                            <input type="file" name="user_img" class="form-control">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pharmacy Phone <span class="req">*</span></label>
                                    <input type="text" name="user_phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pharmacy Location <span class="req">*</span></label>
                                    <select name="user_location" class="form-control" required>
                                        <option value="">Select Location</option>
                                        <?php
                                            $location = $obj->location->show_location();
                                            foreach($location as $loc):
                                        ?>
                                        <option value="<?php echo $loc['location_id'] ?>"><?php echo $loc['location_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password <span class="req">*</span></label>
                            <input type="password" required name="user_password" class="form-control">
                        </div>

                        <button type="submit" name="add_vendor" class="btn btn-primary">Add New Pharmacy</button>
                    </form>
                </div>
            </div>
           </div>

        </div>

        

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>