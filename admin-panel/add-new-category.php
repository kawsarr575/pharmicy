<!-- Sidebar -->
<?php include_once "part/sidebar.php"; ?>
<!-- End of Sidebar -->

    <!-- Topbar -->
    <?php include_once "part/header.php"; ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
    
        if(isset($_POST['add_category'])){
            $category_name  =   $_POST['category_name'];
            if(empty($category_name)){
                $message = 'Category Field is empty';
                $msg = error_msg($message);
            }else {
                $obj->category->create_category($category_name,$user_id);
                $message = 'Category has been added successfully';
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
                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                </div>
                <div class="card-body">
                    <p><?php if(isset($msg)){echo $msg; } ?></p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>

                        <button type="submit" name="add_category" class="btn btn-primary">Add New</button>
                    </form>
                </div>
            </div>
           </div>

        </div>

        

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>