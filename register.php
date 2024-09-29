<?php
include_once "includes/functions.php";
include_once "includes/maincontroller.php";
$obj = new MainController();
    
    if(isset($_POST['create_account'])){
        $message;
        $user_role = 'customer';
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        

        $email = $obj->users->select_users();
        //echo $email;
        if(empty($user_email) || empty($user_pass)){
            $message = 'Email or Password must not be empty';
            $msg = error_msg($message);
        }elseif($email == $user_email){
            $message = 'Email Already exits';
            $msg = error_msg($message);
        }else {
            $obj->users->create_account($user_role, $user_email, $user_pass, $user_name, $user_phone, $user_address);
            $message = 'Successfully created account';
            $msg = success_msg($message);
        }

        
    }
?>

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

<div class="login-page">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p><?php if(isset($msg)){echo $msg; } ?></p>
                <h2>Create an account</h2>
                <form action="" method="POST">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name *</label>
                                <input type="text" required name="user_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone *</label>
                                <input type="text" name="user_phone" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email *</label>
                                <input type="email" name="user_email" required class="form-control" placeholder="example@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location *</label>
                                <input type="text" name="user_address" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password *</label>
                        <input type="password" name="user_pass" required class="form-control" id="exampleInputPassword1" placeholder="********">
                    </div>

                    <button type="submit" name="create_account" class="btn btn-primary">Create Account</button>
                </form>
            </div>
            <span>Have an account <a href="login.php?user=customer">Login Now</a></span>

            
        </div>
    </div>
</div>


<script src="assets/js/jquery-min.js" ></script>
<script src="assets/js/fontawesome.min.js"></script>
<script src="assets/js/bootstrap-min.js"></script>
</body>
</html>