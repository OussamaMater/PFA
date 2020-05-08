<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Oussama Mater, Mohamed Trabelsi">
    <meta name="description"
        content="WildCampers is a website where you can find yourself a spot, and start your adventure" />
    <meta name="keywords" content="camping, tents, nature, fire" />
    <title>WildCampers</title>
    <!-- ? BootstrapCss -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <!-- ? FontAwesomeLink -->
    <script src="https://kit.fontawesome.com/650a15de6e.js" crossorigin="anonymous"></script>
    <!-- ? CustomCssLink -->
    <link rel="stylesheet" href="../CSS/style.css" />

</head>

<body>
    <!-- ? navbar starts -->

    <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top" id="navbar">
        <div class="container-fluid" id="containerF">
            <a class="navbar-brand"
                href="<?php echo URLROOT;?>pages/index">
                <h3>WildCampers</h3>
            </a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto" id="navbarAuto">
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>pages/index"
                            class="nav-link" id="navcustom_1"><i class="fas fa-campground"></i>Home</a>
                    </li>
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>locations/nearme"
                            class="nav-link" id="navcustom_2"><i class="fas fa-fire"></i>Near Me</a></li>
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>pages/about"
                            class="nav-link" id="navcustom_3"><i class="fas fa-tree"></i>About</a></li>
                    <?php if (isLoggedIn()) : ?>
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>users/profile"
                            class="nav-link" id="navcustom_4">Profile</a></li>
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>users/logout"
                            class="nav-link" id="navcustom_6">Log Out</a></li>
                    <?php else : ?>
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>users/login"
                            class="nav-link" id="navcustom_4">Log In</a></li>
                    <li class="nav-item"><a
                            href="<?php echo URLROOT;?>users/signup"
                            class="
                            nav-link" id="navcustom_5">Sign Up</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ? navbar ends -->