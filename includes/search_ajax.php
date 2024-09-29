<?php

    include_once "functions.php";
    include_once "maincontroller.php";
    $obj = new MainController();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
		$search = $_POST['search'];
		$obj->location->search_location($search);
	} 

?>