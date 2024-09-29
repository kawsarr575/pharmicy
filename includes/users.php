<?php


class users extends MainController{
	
	//$locationUrl = BASE_URL;
	public function __construct(){
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->table = 'users';
        $this->location = 'location';
    }

    public function get_data_using_session_id($user_id){
        $location  = $this->location = 'location';
        
        $sql = "SELECT * FROM $this->table
        LEFT JOIN $location
        ON $this->table.user_address = $location.location_id
        WHERE $this->table.user_id='$user_id'";

        $data = $this->db->query($sql);
        return $data;
    }

    public function create_account($user_role, $user_email, $user_pass, $user_name, $user_phone, $user_address){

    	$sql = "INSERT INTO $this->table (user_role, user_email, user_pass, user_name, user_phone, user_address) VALUES ('$user_role', '$user_email', '$user_pass', '$user_name', '$user_phone','$user_address')";
    	return $data = $this->db->query($sql);
    }

    public function show_all_accounts(){

        $sql = "SELECT * FROM $this->table";

        $data = $this->db->query($sql);
        return $data;
    }

    public function show_all_vendor(){

        $location = $this->location = 'location';

        $sql = "SELECT * FROM $this->table
        LEFT JOIN $location
        ON $this->table.user_address = $location.location_id
        WHERE $this->table.user_role='vendor'";

        $data = $this->db->query($sql);
        return $data;

    }


    public function delete_vendor($deleteId){
        $sql = "DELETE FROM $this->table WHERE user_id = {$deleteId}";
        return $data = $this->db->query($sql);
    }

	public function select_users(){
		$sql = "SELECT user_email FROM $this->table";
		$data = $this->db->query($sql);
		
		foreach($data as $email){
			return $email['user_email'];
		}
	}

    public function user_login( $login_email, $login_pass, $user_role ){

        $sql = "SELECT * FROM $this->table WHERE user_email='$login_email' && user_pass='$login_pass' && user_role='$user_role'";
        $data = $this->db->query($sql);
        return $rowcount = $data->rowCount();
    }
    
    public function user_login_data( $login_email, $login_pass, $user_role ){

        $sql = "SELECT * FROM $this->table WHERE user_email='$login_email' && user_pass='$login_pass' && user_role='$user_role'";
        $data = $this->db->query($sql);
        return $data;
    }

    public function create_vendor($user_name,$user_email,$user_phone,$user_location,$user_password,$imageu){

        $sql = "INSERT INTO $this->table ( 
            user_name, 
            user_email,
            user_img, 
            user_role, 
            user_pass, 
            user_phone, 
            user_address) VALUES (
            '$user_name', 
            '$user_email', 
            '$imageu',
            'vendor',
            '$user_password',
            '$user_phone',
            '$user_location')";

    	return $data = $this->db->query($sql);

    }

    public function show_user_id_wise($user_id){

        $location = $this->location = 'location';

        $sql = "SELECT * FROM $this->table
        LEFT JOIN $location
        ON $this->table.user_address = $location.location_id
        WHERE $this->table.user_id='$user_id'";

        $data = $this->db->query($sql);
        return $data;
    }

    public function update_vendor($user_name, $user_phone, $user_location, $user_password, $vendor_id){

        $sql = "UPDATE $this->table SET

            user_name = '$user_name',
            user_pass = '$user_password',
            user_phone = '$user_phone',
            user_address = '$user_location' WHERE user_id = '$vendor_id' ";

        $data = $this->db->query($sql);
        return $data;
    }


    public function show_all_customer(){
        
        $location = $this->location = 'location';

        $sql = "SELECT * FROM $this->table
        LEFT JOIN $location
        ON $this->table.user_address = $location.location_id
        WHERE $this->table.user_role='customer'";

        $data = $this->db->query($sql);
        return $data;
    }

    public function show_customer_id_wise($customer_id){
        $location = $this->location = 'location';

        $sql = "SELECT * FROM $this->table
        LEFT JOIN $location
        ON $this->table.user_address = $location.location_id
        WHERE $this->table.user_id='$customer_id'";

        $data = $this->db->query($sql);
        return $data;
    }

    public function update_customer($user_name, $user_phone, $user_location, $user_password, $customer_id){

        $sql = "UPDATE $this->table SET
            user_name = '$user_name',
            user_pass = '$user_password',
            user_phone = '$user_phone',
            user_address = '$user_location' WHERE user_id = '$customer_id' ";

        $data = $this->db->query($sql);
        return $data;
    }
    
    /**
     * show vendor image on product list page
     */
    public function get_vendor_data_to_product_list_page($vendor_id){

        $sql = "SELECT * FROM $this->table WHERE $this->table.user_id='$vendor_id'";

        $data = $this->db->query($sql);
        return $data;
    }

    /**
     * Customer profile data
     */

    public function get_customer_profile_data($customer_id){

        $location = $this->location = 'location';

        $sql = "SELECT * FROM $this->table
        LEFT JOIN $location
        ON $this->table.user_address = $location.location_id
        WHERE $this->table.user_id='$customer_id'";

        //$sql = "SELECT * FROM $this->table WHERE user_id='$customer_id'";

        $data = $this->db->query($sql);
        return $data;
    }

    /**
     * Page name: vendor order page
     */
    public function get_customer_info($customer_id){

        $sql = "SELECT * FROM $this->table WHERE user_id='$customer_id'";

        $data = $this->db->query($sql);
        return $data;
    }

    /**
     * Page Name : Admin order details page
     */
    public function show_vendor_details_in_order_detals_page($vendor_id){
        $location = $this->location = 'location';

        $sql = "SELECT * FROM $this->table
        INNER JOIN $location ON $this->table.user_address = $location.location_id
        WHERE user_id='$vendor_id'";

        $data = $this->db->query($sql);
        return $data;
    } 
    
    /**
     * Page Name : Admin order details page
     */
    public function show_customer_details_in_order_detals_page($customer_id){

        $sql = "SELECT * FROM $this->table WHERE user_id='$customer_id'";

        return $data = $this->db->query($sql);
        
    }

    

    /**
     * Page Name: vendor.ph
     * Search Pharmacy
     */

     public function search_pharmacy($search_pharmacy){

        $search = $search_pharmacy;
        $sql = "SELECT * FROM $this->table WHERE user_name LIKE '%$search%'";
        $data = $this->db->query($sql);
        $count = $data->rowCount();
        
        if($count <= 0){
           echo " <h3 style='color:red;text-align:center;background:#f8f9fa;padding: 8px 0px;'>Opps! Pharmacy not found</h3>  ";
           
        }else{
           
           ?>

           <div class="row">
               <div class="col-md-12 text-center">
                   <h5 style="color:#fff; background:#17a2b8; padding: 5px 0px;">Search Result <span>(<?php echo $count; ?>)</span></h5>
                   <p id="t"></p>
               </div>
               <?php 
                   // $all_icon = $obj->icon->select_icon();
                   foreach($data as $key => $phar):
               ?>

                <div class="col-md-3">
                    <div class="city-content">
                        <a href="product-list.php?id=<?php echo $phar['user_id']; ?>">
                            <img src="assets/upload/<?php echo $phar['user_img'];?>" alt="vendor-img">
                        </a>
                        <p>
                            <a href="product-list.php?id=<?php echo $phar['user_id']; ?>"><?php echo $phar['user_name'];?> <i class="far fa-arrow-alt-circle-right"></i></a>
                        </p>
                    </div>
                </div>

                <?php endforeach; ?>
               <div style="height: 3px; width: 97%; margin: 0 auto 30px; background-color: #e9ecef;"></div>    
           </div>

           <?php
        }
     }




}