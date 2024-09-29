<?php


class orders extends MainController{
	
	//$locationUrl = BASE_URL;
	public function __construct(){
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->table = 'orders';
        $this->category = 'category';
        $this->users = 'users';
    }

    public function create_order($product_name,$product_price,$product_quantity,$total_price,$imageu,$product_id,$customer_id,$vendor_id){

    	$sql = "INSERT INTO $this->table (
            o_product_name,
            o_price,
            o_sub_total,
            o_quantity,
            o_vendor_id,
            o_customer_id,
            o_product_id,
            o_status,
            o_prescription_img) 
            VALUES (
            '$product_name',
            '$product_price',
            '$total_price',
            '$product_quantity',
            '$vendor_id',
            '$customer_id',
            '$product_id',
            'Pending',
            '$imageu')";

    	$data = $this->db->query($sql);

        $last_id = $this->db->lastInsertId();

        header("location:thank-you.php?id=$last_id");
    } 
    
    /**
     * Page name: thank-you page
     */
    public function order_detils_thank_you_page($order_id){

        $category = $this->category = 'category';
        $users = $this->users = 'users';

    	$sql = "SELECT * FROM $this->table WHERE order_id = '$order_id'";

    	return $data = $this->db->query($sql);
    }

    /**
     * Page name: Customer Profile page order tab
     */
    public function order_details_customer_profile($user_id){

        $sql = "SELECT * FROM $this->table WHERE o_customer_id = '$user_id' ORDER BY order_id DESC";

    	return $data = $this->db->query($sql);
    }

    /**
     * Page name: Vendor order page, show order all order vendor wise
     */
    public function show_order_vendor_wise($user_id){

        $sql = "SELECT * FROM $this->table WHERE o_vendor_id = '$user_id' ORDER BY order_id DESC";

    	return $data = $this->db->query($sql);
    }

    /**
     * Update order status vendor order page
     */
    public function update_order_status($order_id){

        $sql = "SELECT o_product_name, o_status FROM $this->table WHERE order_id = '$order_id'";

    	$data = $this->db->query($sql);

        foreach($data as $stu);

        if($stu['o_status'] == 'Pending'){
            $stu_update = 'Completed';
        }elseif($stu['o_status'] == 'Completed'){
            $stu_update = 'Pending';
        }

        $sql1 = "UPDATE $this->table SET o_status='$stu_update' WHERE order_id = '$order_id'";
        return $data = $this->db->query($sql1);
    }

    /**
     * Show all order in admin order page
     */
     public function show_all_order_admin_page(){

        $sql = "SELECT * FROM $this->table";
        return $data = $this->db->query($sql);

     }

    /**
    * Delete order admin page order page
    */
    public function delete_order($deleteId){
        $sql = "DELETE FROM $this->table WHERE order_id = {$deleteId}";
        return $data = $this->db->query($sql);
    }

    /**
    * Show order details admin order page
    */
    public function show_order_id_wise_admin_page($order_id){
        $sql = "SELECT * FROM $this->table WHERE order_id='$order_id'";
        return $data = $this->db->query($sql);
    }
    


}