<?php
    include_once "part/header.php";

    if(isset($_GET['id'])){
        $vendor_id = $_GET['id'];
    }
    $vendor_info = $obj->users->get_vendor_data_to_product_list_page($vendor_id);
    foreach($vendor_info as $data);
?>


    <div class="hero-area inner-page">
        <div class="form">
            <div class="form-conent">
                <h2><?php echo $data['user_name'];?></h2>
                <form class="form-inline my-2 my-lg-0 hero-search-bar">
                    <input class="form-control mr-sm-2" type="search" placeholder="Type your Madicine ... Napa" id="medicinesearch" aria-label="Search">
                </form>
            </div>
        </div>
        <div id="statuslivemedicine"></div>
    </div>

    <div class="search-result-medicine">
        
        <div id="statuslivemedicine"></div>

    </div>

    <div class="product-list">
        <div class="container">
            <?php 
                $product = $obj->product->show_product_vendor_wise_to_customer($vendor_id);
                foreach($product as $pro):
            ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-img">
                                <img src="assets/product/<?php echo $pro['product_img'];?>" alt="product-img">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <p class="product-name">Name : <?php echo $pro['product_name'];?></p>
                                <p class="product-price">Price : <?php echo $pro['product_price'];?> TK.</p>
                                <p class="product-des">Description : <?php echo $pro['product_des'];?>  </p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="order-btn">
                                <a href="order.php?id=<?php echo $pro['product_id'];?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>



<?php
    include_once "part/footer.php";
?>