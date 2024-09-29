<?php
    include_once "part/header.php";

  
    // $order_details = $obj->orders->order_detils_thank_you_page($order_id);
    // foreach($order_details as $data);


?>

<div class="thank-you-page" style="margin:150px 0px 100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div id="customer_profile_tab">
                            <ul>
                                <li><a href="#customer_profile">Profile</a></li>
                                <li><a href="#customer_order_list">Order</a></li>
                            </ul>

                            <div id="customer_profile">
                                <p>
                                    <img src="assets/img/gavater.png" alt="pro-file" class="customer-pro-img">
                                </p>
                                <p>Name : <?php echo $profile['user_name']; ?></p>
                                <p>Email : <?php echo $profile['user_email']; ?></p>
                                <p>Phone : <?php echo $profile['user_phone']; ?></p>
                                <p>Location : <?php echo $profile['user_address']; ?></p>
                            </div>

                            <div id="customer_order_list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order date</th>
                                            <th>Order ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $order = $obj->orders->order_details_customer_profile($user_id);
                                            foreach($order as $data):
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                   
                                                    echo show_date($data['created_at']);
                                                ?>
                                            </td>
                                            <td><?php echo $data['order_id']; ?></td>
                                            <td><?php echo $data['o_product_name']; ?></td>
                                            <td><?php echo $data['o_price']; ?> * </td>
                                            <td><?php echo $data['o_quantity']; ?></td>
                                            <td> = <?php echo $data['o_sub_total']; ?> Tk</td>
                                            <td><?php echo $data['o_status']; ?></td>
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
    </div>
</div>


 

<?php
    include_once "part/footer.php";
?>

<script>
  
        $( "#customer_profile_tab" ).tabs();
  
</script>
