<?php

    include_once "functions.php";
    include_once "maincontroller.php";
    $obj = new MainController();

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
		$search_pharmacy = $_POST['search_pharmacy'];
		$obj->users->search_pharmacy($search_pharmacy);
	}

  

?>