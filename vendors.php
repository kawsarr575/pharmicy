<?php
    include_once "part/header.php";

    if(isset($_GET['id'])){
        $location_id = $_GET['id'];
    }
?>

    <div class="hero-area">
        <div class="form">
        <div class="form-conent">
        <h2>Find Your Medicine</h2>
            <form class="form-inline my-2 my-lg-0 hero-search-bar">
                <input class="form-control mr-sm-2" id="pharmacySearch" type="search" placeholder="Type Pharmacy Name.. Lazz Pharma" aria-label="Search">
            </form>
        </div>
        </div>
    </div>

    <div class="search-result">
        <div class="container">
            <div class="row">
                <div id="pharmacyResultShow"></div>
            </div>
        </div>
    </div>

    <div class="all-city-section">
        <div class="container">
            <h2>Select Your Nearest Pharmacy</h2>
            <div class="row">
                <?php 
                    $locatin = $obj->location->show_vendor_location_wise($location_id);
                    foreach($locatin as $vendor):
                ?>
                <div class="col-md-3">
                    <div class="city-content">
                        <a href="product-list.php?id=<?php echo $vendor['user_id']; ?>">
                            <img src="assets/upload/<?php echo $vendor['user_img'];?>" alt="vendor-img">
                        </a>
                        <p>
                            <a href="product-list.php?id=<?php echo $vendor['user_id']; ?>"><?php echo $vendor['user_name'];?> <i class="far fa-arrow-alt-circle-right"></i></a>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>



<?php
    include_once "part/footer.php";
?>