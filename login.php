<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-min.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>
<?php

    if(isset($_GET['user'])){
        $user_role = $_GET['user'];
    }
     include_once "includes/functions.php";
     include_once "includes/maincontroller.php";
     $obj = new MainController();

     if(isset($_POST['login'])){

        $login_email =  $_POST['login_email'];
        $login_pass =  $_POST['login_pass'];

        if(empty($login_email) || empty($login_pass)){
            $message = 'Email or Password must not be empty';
            $msg = error_msg($message);
        }else {

            $user_row_count = $obj->users->user_login($login_email, $login_pass, $user_role);
            if($user_row_count == 1 ){

                $user_log = $obj->users->user_login_data( $login_email, $login_pass, $user_role );

                foreach($user_log as $data){

                    $user_id = $data['user_id'];

                    $_SESSION['user_id'] = $user_id;

                    if($user_role == 'customer'){

                        header('location:home.php');

                    }elseif($user_role == 'vendor'){
                        
                        header('location:vendor-panel');

                    }elseif($user_role == 'admin') {
                       
                        header('location:admin-panel');

                    }
                }
        
                
            }else {
                $message = 'Email and Password does not match Or you are not ' . $user_role;
                $msg = error_msg($message);
            }
        }

        


     }
?>
<div class="login-page">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p><?php if(isset($msg)){echo $msg; } ?></p>
                <h2>Login as a <?php if( $user_role == 'vendor'){ echo 'Pharmacy';}else{echo $user_role; }; ?></h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email or User</label>
                        <input type="email" name="login_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="login_pass" class="form-control" id="exampleInputPassword1" placeholder="********">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login Now</button>
                </form>
            </div>
            <span>Don't have account <a href="index.php">Go Back</a> create an account</span>
        </div>
    </div>
</div>


<script src="assets/js/jquery-min.js" ></script>
<script src="assets/js/fontawesome.min.js"></script>
<script src="assets/js/bootstrap-min.js"></script>
</body>
</html>