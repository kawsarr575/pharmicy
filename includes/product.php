<?php


class product extends MainController{
	
	//$locationUrl = BASE_URL;
	public function __construct(){
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->table = 'product';
        $this->category = 'category';
        $this->users = 'users';
    }

    public function create_product($product_name,$regular_price,$sale_price,$product_category,$product_des,$imageu,$product_restricted, $user_id){

    	$sql = "INSERT INTO $this->table (product_name,product_price,product_sale_price,product_cagetory,vendor_id, product_img,product_des, product_restricted) VALUES ('$product_name','$regular_price','$sale_price','$product_category', '$user_id', '$imageu','$product_des','$product_restricted')";

    	return $data = $this->db->query($sql);
    } 
    
    public function show_product(){

        $category = $this->category = 'category';
        $users = $this->users = 'users';

    	$sql = "SELECT * FROM $this->table
        LEFT JOIN $category ON $this->table.product_cagetory = $category.cat_id
        LEFT JOIN $users ON $this->table.vendor_id = $users.user_id";

    	return $data = $this->db->query($sql);
    }

    public function show_product_id_wise($product_id){

        $category = $this->category = 'category';
        $users = $this->users = 'users';

    	$sql = "SELECT * FROM $this->table
        LEFT JOIN $category ON $this->table.product_cagetory = $category.cat_id
        LEFT JOIN $users ON $this->table.vendor_id = $users.user_id WHERE product_id='$product_id'";
    	return $data = $this->db->query($sql);

    }

    public function update_product($product_name,$regular_price,$sale_price,$product_category,$product_des, $product_restricted, $user_id,$product_id){

        $sql = "UPDATE $this->table SET product_name = '$product_name', product_price='$regular_price', product_sale_price= '$sale_price',product_cagetory='$product_category', vendor_id='$user_id', product_des= '$product_des', product_restricted='$product_restricted' WHERE product_id = '$product_id'";
    	return $data = $this->db->query($sql);
        
    }  
    
    public function update_product_img( $imageu ,$product_id){

        $sql = "UPDATE $this->table SET product_img = '$imageu' WHERE product_id = '$product_id'";
    	return $data = $this->db->query($sql);
        
    }

    public function delete_product($deleteId){

        $sql = "DELETE FROM $this->table WHERE product_id = {$deleteId}";
        return $data = $this->db->query($sql);
    }

    public function show_product_vendor_wise($user_id){

        $category = $this->category = 'category';
        $users = $this->users = 'users';

    	$sql = "SELECT * FROM $this->table
        LEFT JOIN $category ON $this->table.product_cagetory = $category.cat_id
        LEFT JOIN $users ON $this->table.vendor_id = $users.user_id
        WHERE $this->table.vendor_id = $user_id";

    	return $data = $this->db->query($sql);
    }

    /**
     * page name : product-list.php
     * Show product to customer page for purchasing
     */
    public function show_product_vendor_wise_to_customer($vendor_id){
        $category = $this->category = 'category';
        $users = $this->users = 'users';

    	$sql = "SELECT * FROM $this->table
        INNER JOIN $category ON $this->table.product_cagetory = $category.cat_id
        INNER JOIN $users ON $this->table.vendor_id = $users.user_id
        WHERE $this->table.vendor_id = $vendor_id";

        return $data = $this->db->query($sql);
    }

    /**
     * page name : order.php
     * Show product details to order page
     */
    public function product_order_page($product_id){

        $category = $this->category = 'category';
        $users = $this->users = 'users';

    	$sql = "SELECT * FROM $this->table
        INNER JOIN $category ON $this->table.product_cagetory = $category.cat_id
        INNER JOIN $users ON $this->table.vendor_id = $users.user_id
        WHERE $this->table.product_id = $product_id";

        return $data = $this->db->query($sql);
    }

    /**
     * Page Name: Product-list.php
     * 
     * Search medicine
     */
    public function search_pharmacy($search_medicine){
        $search = $search_medicine;
        $sql = "SELECT * FROM $this->table WHERE product_name LIKE '%$search%'";
        $data = $this->db->query($sql);
        $count = $data->rowCount();
        
        if($count <= 0){
           echo " <h3 style='color:red;text-align:center;background:#f8f9fa;padding: 8px 0px;'>Opps! medicine not found</h3>  ";
           
        }else{
           
           ?>
        <div class="product-list">
           <div class="container">
               <div class="col-md-12 text-center">
                   <h5 style="color:#fff; background:#17a2b8; padding: 5px 0px;">Search Result <span>(<?php echo $count; ?>)</span></h5>
                   <p id="t"></p>
               </div>
               <?php 
                   // $all_icon = $obj->icon->select_icon();
                   foreach($data as $key => $pro):
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
               <div style="height: 3px; width: 97%; margin: 0 auto 30px; background-color: #e9ecef;"></div>    
           </div>
        </div>

           <?php
        }
    }



}