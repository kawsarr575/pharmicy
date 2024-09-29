<!-- Sidebar -->
<?php 

    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
    }
    include_once "part/sidebar.php";
    include_once "part/header.php";

?>

 

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
    
        if(isset($_POST['update_category'])){
            $category_name  =   $_POST['category_name'];
            if(empty($category_name)){
                $message = 'Category Field is empty';
                $msg = error_msg($message);
            }else {
                $obj->category->update_category($category_name, $cat_id);
                $message = 'Category has been updated successfully';
                $msg = success_msg($message);
            }
        }

        $show = $obj->category->show_category_id_wise($cat_id);
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
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category_name" value="<?php if(isset($data['cat_name'])){ echo $data['cat_name']; } ?>" class="form-control">
                        </div>

                        <button type="submit" name="update_category" class="btn btn-primary">Update</button>
                        <a href="all-categories.php?page=category" class="btn btn-success">Go Back</a>
                    </form>
                </div>
            </div>
           </div>

        </div>

        

    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>