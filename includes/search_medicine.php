<?php

    include_once "functions.php";
    include_once "maincontroller.php";
    $obj = new MainController();

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
		$search_medicine = $_POST['search_medicine'];
		$obj->product->search_pharmacy($search_medicine);
	}

  

?>