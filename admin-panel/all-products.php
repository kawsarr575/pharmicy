

<!-- Sidebar -->
<?php 
    include_once "part/sidebar.php";
    include_once "part/header.php"; 
?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Products</h1>
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
                                    $product = $obj->product->show_product();
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