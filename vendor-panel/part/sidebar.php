<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    $user_id = $_SESSION['user_id'];

    if(empty($user_id)){
        header('location:../index.php');
    }
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    if(isset($_GET['res'])){
        $page_res = $_GET['res'];
    }

    include_once '../includes/maincontroller.php';
    include_once '../includes/functions.php';
    $obj = new MainController();

    $user_data = $obj->users->get_data_using_session_id($user_id);
    foreach($user_data as $u_data);

    /**
     * Page ventricted
     */
    if( $u_data['user_role'] != 'vendor' AND $page_res != 'res' ){
        header('location:../error.php');
    }

    
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if(isset($u_data['user_name'])){ echo $u_data['user_name']; }else{ echo "Pharmacy";} ?></title>

    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?res">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?php if(isset($u_data['user_name'])){ echo $u_data['user_name']; }else{ echo "Pharmacy";} ?> </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php?res">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            Interface
        </div> -->

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Products"
                aria-expanded="true" aria-controls="Products">
                <i class="fas fa-th-large"></i>
                <span>Products</span>
            </a>
            <div id="Products" class="collapse <?php if($page =='product'){echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="all-products.php?page=product&res">All Product</a>
                    <a class="collapse-item" href="add-new-product.php?page=product&res">Add New</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Categories"
                aria-expanded="true" aria-controls="Categories">
                <i class="fas fa-bars"></i>
                <span>Categories</span>
            </a>
            <div id="Categories" class="collapse <?php if($page == 'category'){echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="all-categories.php?page=category&res">All Category</a>
                    <a class="collapse-item" href="add-new-category.php?page=category&res">Add New</a>
                </div>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Orders"
                aria-expanded="true" aria-controls="Orders">
                <i class="fas fa-tachometer-alt"></i>
                <span>Orders</span>
            </a>
            <div id="Orders" class="collapse <?php if($page =='order'){echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="order.php?page=order&res">All Order</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Profile"
                aria-expanded="true" aria-controls="Profile">
                <i class="far fa-user-circle"></i>
                <span>Profile</span>
            </a>
            <div id="Profile" class="collapse <?php if($page =='profile'){echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="profile.php?page=profile&res">Profile</a>
                </div>
            </div>
        </li>

        

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


        </ul>

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
