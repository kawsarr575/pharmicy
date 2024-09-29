<?php


class common extends MainController{
	
	//$locationUrl = BASE_URL;
	public function __construct(){
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->location = 'location';
        $this->users = 'users';
        $this->product = 'product';
    }

    // public function create_location($location_name){

    // 	$sql = "INSERT INTO $this->table (location_name) VALUES ('$location_name')";
    // 	return $data = $this->db->query($sql);
    // } 
    
    /**
     * Page name: vendor dashboard
     * Count total customer, total vendor and product for dashboard page vendor id wise
     */
    public function count_total_customer_vendor_product($user_id){

        $customer = "SELECT * FROM $this->users WHERE user_role='customer'";
        $vendor = "SELECT * FROM $this->users WHERE user_role='vendor'";
        $product = "SELECT * FROM $this->product WHERE vendor_id = '$user_id'";
        $cus = $this->db->query($customer);
        $ven = $this->db->query($vendor);
        $pro = $this->db->query($product);

    	$data = array( 'customer' => $cus->rowCount(), 'vendor' => $ven->rowCount(), 'product' => $pro->rowCount() );
    	
        return $data;
    }

   /**
     * Page name: admin dashboard
     * Count total customer, total vendor and product for dashboard page
     */
    public function count_total_customer_vendor_product_for_admin(){

        $customer = "SELECT * FROM $this->users WHERE user_role='customer'";
        $vendor = "SELECT * FROM $this->users WHERE user_role='vendor'";
        $product = "SELECT * FROM $this->product";
        $cus = $this->db->query($customer);
        $ven = $this->db->query($vendor);
        $pro = $this->db->query($product);

    	$data = array( 'customer' => $cus->rowCount(), 'vendor' => $ven->rowCount(), 'product' => $pro->rowCount() );
    	
        return $data;
    }


}