    <?php require_once APPROOT . '/views/inc/header.php' ?>

    <!-- ? slider starts -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../PICS/Background_1.jfif" alt="First slide" />
                <div class="carousel-caption">
                    <h1>WildCampers</h1>
                    <h3>In The Wild We Camp, Join Us.</h3>
                    <a class="btn btn-outline-light btn-lg"
                        href="<?php echo URLROOT;?>users/login"
                        role="button" style="border-radius: 0px;">Log In</a>
                    <a class="btn btn-success btn-lg"
                        href="<?php echo URLROOT;?>users/signup"
                        role="button" style="border-radius: 0px;">Sign
                        Up</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../public/PICS/Background_2.jpg" alt="Second slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../public/PICS/Background_3.jpg" alt="Third slide" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- ? slider ends -->
    <?php require_once APPROOT . '/views/inc/socialmedia.php';?>
    <?php require_once APPROOT . '/views/inc/footer.php';
