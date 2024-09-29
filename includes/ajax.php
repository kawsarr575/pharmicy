<?php

    include_once "functions.php";
    include_once "maincontroller.php";
    $obj = new MainController();

    if(isset($_POST['cat_id'])) {  
        $cat_id = $_POST['cat_id']; 
        $obj->category->delete_category($cat_id);
    }  
    
    if(isset($_POST['user_id'])) {  
        $user_id = $_POST['user_id']; 
        $obj->users->delete_vendor($user_id);
    } 

    if(isset($_POST['product_id'])) {  
        $product_id = $_POST['product_id']; 
        $obj->product->delete_product($product_id);
    } 

    if(isset($_POST['location_id'])) {  
        $location_id = $_POST['location_id']; 
        $obj->location->delete_location($location_id);
    }

    if(isset($_POST['order_id'])) {
        $order_id = $_POST['order_id']; 
        $obj->orders->delete_order($order_id);

    }

?>