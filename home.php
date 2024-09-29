<?php
    include_once "part/header.php";
?>

    <div class="hero-area">
        <div class="form">
        <div class="form-conent">
        <h2>Find Your Medicine</h2>
            <form class="form-inline my-2 my-lg-0 hero-search-bar">
                <input class="form-control mr-sm-2" type="search" placeholder="Type your location ... Mirpur" id="locationsearch" aria-label="Search">
            </form>
        </div>
        </div>
    </div>

  <div class="search-result">
    <div class="container">
        <div class="row">
            <div id="statuslive"></div>
        </div>
    </div>
  </div>

    <div class="all-city-section">
        <div class="container">
            <h2>Select Your Nearest Location</h2>
            <div class="row">
                <?php 
                    $locatin = $obj->location->show_location();
                    foreach($locatin as $loc):
                ?>
                <div class="col-md-3">
                    
                    <div class="city-content">
                        <a href="vendors.php?page=vendor&id=<?php echo $loc['location_id']; ?>">
                            <img src="assets/img/dhaka_city.jpg" alt="city-image">
                        </a>
                        <p>
                            <a href="vendors.php?page=vendor&id=<?php echo $loc['location_id']; ?>"><?php echo $loc['location_name'];?> <i class="far fa-arrow-alt-circle-right"></i></a>
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

