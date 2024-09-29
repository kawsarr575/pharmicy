<?php


class location extends MainController{
	
	//$locationUrl = BASE_URL;
	public function __construct(){
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->table = 'location';
        $this->users = 'users';
    }

    public function create_location($location_name){

    	$sql = "INSERT INTO $this->table (location_name) VALUES ('$location_name')";
    	return $data = $this->db->query($sql);
    } 
    
    public function show_location(){

    	$sql = "SELECT * FROM $this->table";
    	$data = $this->db->query($sql);
        return $data;
    }

    public function show_location_id_wise($location_id){

        $sql = "SELECT * FROM $this->table WHERE location_id = '$location_id'";
    	return $data = $this->db->query($sql);
    }

    public function update_location($location_name, $location_id){
        $sql = "UPDATE $this->table SET location_name = '$location_name' WHERE location_id = '$location_id'";
    	return $data = $this->db->query($sql);
        
    }

    public function delete_location($deleteId){

        $sql = "DELETE FROM $this->table WHERE location_id = {$deleteId}";
        return $data = $this->db->query($sql);
    }

    public function show_vendor_location_wise($location_id){
        $users = $this->users = 'users';

        $sql = "SELECT * FROM $this->table
        INNER JOIN $users ON $this->table.location_id = $users.user_address
        WHERE $this->table.location_id = '$location_id' ";
        return $data = $this->db->query($sql);
    }


    public function search_location($search){
        $sql = "SELECT * FROM $this->table WHERE location_name LIKE '%$search%'";
        $data = $this->db->query($sql);
        $count = $data->rowCount();
        
        if($count <= 0){
           echo " <h3 style='color:red;text-align:center;background:#f8f9fa;padding: 8px 0px;'>Opps! location not found</h3>  ";
           
        }else{
           
           ?>

           <div class="row">
               <div class="col-md-12 text-center">
                   <h5 style="color:#fff; background:#17a2b8; padding: 5px 0px;">Search Result <span>(<?php echo $count; ?>)</span></h5>
                   <p id="t"></p>
               </div>
               <?php 
                   // $all_icon = $obj->icon->select_icon();
                   foreach($data as $key => $location):
               ?>

                <div class="col-md-3">
                    
                    <div class="city-content">
                        <a href="vendors.php?page=vendor&id=<?php echo $location['location_id']; ?>">
                            <img src="assets/img/dhaka_city.jpg" alt="city-image">
                        </a>
                        <p>
                            <a href="vendors.php?page=vendor&id=<?php echo $location['location_id']; ?>"><?php echo $location['location_name'];?> <i class="far fa-arrow-alt-circle-right"></i></a>
                        </p>
                    </div>
                       
                </div>

           <?php endforeach; ?>
               <div style="height: 3px; width: 97%; margin: 0 auto 30px; background-color: #e9ecef;"></div>    
           </div>

           <?php
        }
   }  //End search icon function

}