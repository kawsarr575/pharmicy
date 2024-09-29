<?php
    include_once "part/header.php";

    if(isset($_GET['id'])){
        $order_id = $_GET['id'];
    }

    $order_details = $obj->orders->order_detils_thank_you_page($order_id);
    foreach($order_details as $data);


?>

    <div class="thank-you-page" style="margin:150px 0px 100px">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                Thank you for purchasing the product! Your order is processing to deliver to you as soon
                            </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Purchase ID</td>
                                        <td><?php echo $data['order_id'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td><?php echo $data['o_product_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td><?php echo $data['o_quantity'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Product Price</td>
                                        <td><?php echo $data['o_price'];?> TK.</td>
                                    </tr>
                                    <tr>
                                        <td>Total Price</td>
                                        <td><?php echo $data['o_sub_total'];?> TK.</td>
                                    </tr>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


 

<?php
    include_once "part/footer.php";
?>
