<?php


class category extends MainController{
	
	//$locationUrl = BASE_URL;
	public function __construct(){
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->table = 'category';
    }

    public function create_category($category_name, $user_id){

    	$sql = "INSERT INTO $this->table (cat_name, cat_user_id) VALUES ('$category_name', '$user_id')";
    	return $data = $this->db->query($sql);
    } 
    
    /**
     * Show category in admin categores.php page
     */
    public function show_category(){
        
    	$sql = "SELECT * FROM $this->table";
    	return $data = $this->db->query($sql);
    }

    /**
     * Show category id wise for editing the category
     */
    public function show_category_id_wise($cat_id){

        $sql = "SELECT * FROM $this->table WHERE cat_id = '$cat_id'";
    	return $data = $this->db->query($sql);
    }

    public function update_category($category_name, $cat_id){
        $sql = "UPDATE $this->table SET cat_name = '$category_name' WHERE cat_id = '$cat_id'";
    	return $data = $this->db->query($sql);
        
    }

    /**
     * Page name: all-categories.php in vendor dashboard
     * Showing category vendor wise
     */
    public function show_category_vendor_id_wise($user_id){
        $sql = "SELECT * FROM $this->table WHERE cat_user_id = '$user_id'";
    	return $data = $this->db->query($sql);
    }

    

    public function delete_category($deleteId){

        $sql = "DELETE FROM $this->table WHERE cat_id = {$deleteId}";
        return $data = $this->db->query($sql);
    }


}