

<!-- Sidebar -->
<?php 
    include_once "part/sidebar.php"; 
    include_once "part/header.php";

    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
    }

    if(isset($_POST['update_product'])){

        $product_name  =   $_POST['product_name'];
        $regular_price  =   $_POST['regular_price'];
        $sale_price  =   $_POST['sale_price'];
        $product_category  =   $_POST['product_category'];
        $product_des  =   $_POST['product_des'];

        
        // $product_img  =   $_FILES['product_img']["name"];
        // $product_img_tmp  =   $_FILES['product_img']["tmp_name"];

        // $tokra = explode('.', $product_img);
        // $ext = end($tokra);
        // $valid_image_format = array('jpg','png','gif');
        // $image_format = in_array($ext , $valid_image_format);

        // $imageu = time().$product_img;

        if(empty($product_name)){
            $message = 'Name must not be empty';
            $msg = error_msg($message);

        }elseif(empty($regular_price)){
            $message = 'Regular price must not be empty';
            $msg = error_msg($message);

        }elseif(empty($product_category)){
            $message = 'Category must not be empty';
            $msg = error_msg($message);

        }else {

            $obj->product->update_product($product_name,$regular_price,$sale_price,$product_category,$product_des, $user_id,$product_id);
            
            $message = 'Product has been updated successfully';
            $msg = success_msg($message);
        }
    }

    /**
     * Product image update query
     */
    if(isset($_POST['update_product_img'])){

        $product_img  =   $_FILES['product_img']["name"];
        $product_img_tmp  =   $_FILES['product_img']["tmp_name"];

        $tokra = explode('.', $product_img);
        $ext = end($tokra);
        $valid_image_format = array('jpg','png','gif');
        $image_format = in_array($ext , $valid_image_format);
        $imageu = time().$product_img;

        if($image_format == false){
            $message = 'File support only ( jpg, png, gif) ';
            $imsg = error_msg($message);
        }else{
            $obj->product->update_product_img( $imageu ,$product_id);
            move_uploaded_file($product_img_tmp , '../assets/product/' . $imageu);
            $message = 'Image has been updated successfully';
            $imsg = success_msg($message);
        }
        
    }
    /**
     * End Product image update query
     */

    $product = $obj->product->show_product_id_wise($product_id);

    foreach($product as $pro);
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add New</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
           <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                    </div>
                    <div class="card-body">
                        <span><?php if(isset($msg)){echo $msg; } ?></span>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="product_name">Product Name <span class="req">*</span></label>
                                <input type="text" name="product_name" value="<?php echo $pro['product_name']; ?>" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Regular Price <span class="req">*</span></label>
                                        <input type="text" value="<?php echo $pro['product_price']; ?>" name="regular_price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Sale Price</label>
                                        <input type="text" name="sale_price" value="<?php echo $pro['product_sale_price']; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="product_name">Category <span class="req">*</span></label>
                                <select name="product_category" class="form-control" required>
                                    <option value="<?php echo $pro['cat_id']; ?>"><?php echo $pro['cat_name']; ?></option>
                                    <?php 
                                        $cat = $obj->category->show_category();
                                        foreach($cat as $data):
                                    ?>
                                    <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label for="product_name">Description</label>
                                <textarea name="product_des" value="<?php echo $pro['product_des']; ?>" class="form-control"><?php echo $pro['product_des']; ?></textarea>
                            </div>

                            <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                            <a href="all-products.php?page=product" class="btn btn-success">Go Back</a>
                        </form>
                    </div>
                </div>
            </div>
       
           <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Image</h6>
                    </div>
                    <div class="card-body">
                        <span><?php if(isset($imsg)){echo $imsg; } ?></span>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <img src="../assets/product/<?php echo $pro['product_img'] ?>" alt="" class="product-thumb">
                            </div>
                            <div class="form-group">
                                <input type="file" value="<?php echo $pro['product_img'] ?>" name="product_img" required class="form-control">
                            </div>

                            <button type="submit" name="update_product_img" class="btn btn-primary">Update Image</button>
                        </form>
                    </div>
                </div>
           </div>

        </div>

        
    </div>
    <!-- /.container-fluid -->

            <!-- Footer -->
<?php include_once 'part/footer.php'; ?>