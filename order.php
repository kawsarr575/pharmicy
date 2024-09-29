<?php
    include_once "part/header.php";

    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
    }


    $product_info = $obj->product->product_order_page($product_id);
    foreach($product_info as $data);

    if(isset($_POST['order_now'])){

        $product_name = $data['product_name'];

        $product_price = $data['product_price'];
        $product_quantity = $_POST['product_quantity'];
        
        $total_price = $product_price * $product_quantity; 

        $product_id = $product_id;
        $customer_id = $user_id;
        $vendor_id = $data['user_id'];

        $prescription_img  =   $_FILES['prescription_img']["name"];
        $prescription_img_tmp  =   $_FILES['prescription_img']["tmp_name"];

        $tokra = explode('.', $prescription_img);
        $ext = end($tokra);
        $valid_image_format = array('jpg','png','jpeg');
        $image_format = in_array($ext , $valid_image_format);

        $imageu = time().$prescription_img;

        if($data['product_restricted'] == 'on'){

            if(empty($prescription_img)){

                $message = 'You should add doctors prescription otherwise could not sale this medicine';
                $msg = error_msg($message);
    
            }elseif( $image_format == false){
    
                $message = 'File supported only jpg, png and jpeg';
                $msg = error_msg($message);
    
            }else{
    
                $obj->orders->create_order($product_name,$product_price,$product_quantity,$total_price,$imageu,$product_id,$customer_id,$vendor_id);
                move_uploaded_file($prescription_img_tmp , 'assets/upload/'.$imageu);
                $message = 'Product has been added successfully';
                $msg = success_msg($message);
    
            }
        }else {
            $obj->orders->create_order($product_name,$product_price,$product_quantity,$total_price,$imageu,$product_id,$customer_id,$vendor_id);
        }
        
    }

?>


    <div class="hero-area inner-page">
        <div class="form">
        <div class="form-conent">
            <h2><?php echo $data['user_name'];?></h2>
        </div>
        </div>
    </div>

    <div class="product-list order-page">
        <div class="container">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-img">
                                <img src="assets/product/<?php echo $data['product_img'];?>" alt="product-img">
                                <p class="product-des mt-4">Description : <?php echo $data['product_des'];?>  </p>
                            </div>
                        </div>
                        
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <span><?php if(isset($msg)){echo $msg; } ?></span>
                            <div class="product-content">
                                <p class="product-name">Name : <?php echo $data['product_name'];?></p>
                                <p class="product-price">Price : <?php echo $data['product_price'];?> TK.</p>
                                <div class="row  mb-1">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantity</label>
                                            
                                            <input id="myInput" type="number" required name="product_quantity" class="form-control">
                                            <p class="mt-2">Sub-Total Price: <span id="result"></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4" style="display:<?php if($data['product_restricted'] != 'on'){echo 'none'; } ?>">
                                    <label>Add doctor's prescription image ( JPG, PNG, JPEG )</label>
                                    <input type="file" name="prescription_img" <?php if($data['product_restricted'] == 'on'){echo 'required'; } ?> class="form-control-file" oninvalid="this.setCustomValidity('Please add prescription to purchase this medicine')" onchange="this.setCustomValidity('')" >
                                </div>
                                
                                <button type="submit" name="order_now" class="btn btn-primary" >Buy Now</button>
                                <a href="tel:<?php echo $data['user_phone'];?>" class="btn btn-secondary"> Call Now <?php echo $data['user_phone'];?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>


 

<?php
    include_once "part/footer.php";
?>

    <script>

        $('#myInput').on('keyup', function(){
            var number = $(this).val();
            var m = <?php echo $data['product_price'];?> * number;
            $('#result').html(m);
        });

    </script>