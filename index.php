<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap-min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body class="body">
    
<div class="three-login-panel">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <h5 class="card-title"></i> Customer Login</h5>
                        </div>
                        <p class="card-text">You can create an account as a customer <a href="register.php">Create</a></p>
                        <a href="login.php?user=customer">Login Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="alert alert-secondary" role="alert">
                            <h5 class="card-title">Pharmacy Login</h5>
                        </div>
                        <p class="card-text">You can login as a Vendor to add your product and sell from here</p>
                        <a href="login.php?user=vendor">Login Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <h5 class="card-title">Admin Login</h5>
                        </div>
                        
                        <p class="card-text">You can login as an Admin to manage everything</p>
                        <a href="login.php?user=admin">Login Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jquery-min.js" ></script>
<script src="assets/js/fontawesome.min.js"></script>
<script src="assets/js/bootstrap-min.js"></script>
</body>
</html>