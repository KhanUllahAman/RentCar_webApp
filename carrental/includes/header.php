<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Superious" />
    <meta name="keywords" content="Superious, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SUPRIOUS</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/logo1.png" style="height: 20vh; width: 50vh;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="./assest/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="./assest/css/style.css" type="text/css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <style>
        .ko:hover {
            color: #000000;
            text-decoration: none;
        }

        /* Override Bootstrap's default active item color */
        .dropdown-item.active,
        .dropdown-item:active {
            background-color: #FE5115 !important;
            color: #000000 !important;
        }
    </style>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper" style="background-color: #fe5115;">
        <div class="offcanvas__widget">
            <div class="offcanvas__logo">
                <a href="index.php"><img src="./img/mobilelogo.png" alt="" /></a>
            </div>
            <!-- <a href="#"><i class="fa fa-cart-plus"></i></a> -->
            <?php if (strlen($_SESSION['login']) == 0) {
            ?>
                <button style="margin-bottom: 5vh;" class="btn primary-btn4" href="#loginform" data-toggle="modal" data-dismiss="modal">Login / Register</button>
            <?php } else {
            } ?>
            <a href="#" style="text-decoration: none; margin-left: 3.5vh;" class="dropdown-toggle primary-btn4" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-circle"></i>
                <?php
                $email = $_SESSION['login'];
                $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {

                        echo htmlentities($result->FullName);
                    }
                } ?>
            </a>
            <ul class="dropdown-menu ss" aria-labelledby="dropdownMenuButton1">
                <?php if ($_SESSION['login']) { ?>
                    <li><a class="dropdown-item" href="profile.php">Profile Setting</a></li>
                    <li><a class="dropdown-item" href="update-password.php">Update Password</a></li>
                    <li><a class="dropdown-item" href="my-booking.php">My Bookings</a></li>
                    <li><a class="dropdown-item" href="post-testimonial.php">Post a Testimonial</a></li>
                    <li><a class="dropdown-item" href="my-testimonials.php">My Testimonial</a></li>
                    <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                <?php } else { ?>
                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                <?php } ?>
            </ul>

        </div>
        <div id="mobile-menu-wrap"></div>
        <!-- <ul class="offcanvas__widget__add">

        </ul> -->
        <div class="offcanvas__phone__num">
            <i class="fa fa-phone"></i>
            <span>(+92) 11-222-3344</span>
            <br>
            <i class="fa fa-clock-o"></i>
            <span>Week day: 08:00 am to 18:00 pm</span>
            <i class="fa fa-envelope-o"></i>
            <span> ABC@gmail.com</span>
        </div>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->

    <header class="header" style="background-color: #000000;">
        <div class="header__top" style="background-color: #E9EAEC">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul class="header__top__widget">
                            <li class="">
                                <i class="fa fa-clock-o"></i> Week day: 08:00 am to 18:00 pm
                            </li>
                            <li class="">
                                <i class="fa fa-envelope-o"></i> ABC@gmail.com
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="header__top__right">
                            <div class="header__top__phone">
                                <i class="fa fa-phone"></i>
                                <span class="">(+92) 11-222-3344</span>
                            </div>
                            <div class="header__top__social">
                                <a href="#"><i class="fa fa-facebook text-dark"></i></a>
                                <a href="#"><i class="fa fa-twitter text-dark"></i></a>
                                <a href="#"><i class="fa fa-google text-dark"></i></a>
                                <a href="#"><i class="fa fa-instagram text-dark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="index.php"><img src="./img/Rideklogo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__nav">
                        <nav class="header__menu">
                            <ul>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="index.php" style="text-decoration: none;">Home</a></li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'cars.php') echo 'class="active"'; ?>><a href="cars.php" style="text-decoration: none;">Cars</a></li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'gallary.php') echo 'class="active"'; ?>>
                                    <a href="gallary.php" style="text-decoration: none;">Gallary</a>
                                </li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'aboutus.php') echo 'class="active"'; ?>><a href="aboutus.php" style="text-decoration: none;">About</a></li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'contact-us.php') echo 'class="active"'; ?>><a href="contact-us.php" style="text-decoration: none;">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="header__nav__widget">
                            <a href="#" style="text-decoration: none;" class="primary-btn dropdown-toggle ko" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-circle"></i>
                                <?php
                                $email = $_SESSION['login'];
                                $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':email', $email, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {

                                        echo htmlentities($result->FullName);
                                    }
                                } ?>
                            </a>
                            <ul class="dropdown-menu ss" aria-labelledby="dropdownMenuButton1">
                                <?php if ($_SESSION['login']) { ?>
                                    <li><a class="dropdown-item" href="profile.php">Profile Setting</a></li>
                                    <li><a class="dropdown-item" href="update-password.php">Update Password</a></li>
                                    <li><a class="dropdown-item" href="my-booking.php">My Bookings</a></li>
                                    <li><a class="dropdown-item" href="post-testimonial.php">Post a Testimonial</a></li>
                                    <li><a class="dropdown-item" href="my-testimonials.php">My Testimonial</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
                                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
                                    <li><a class="dropdown-item" href="#loginform" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                                <?php } ?>
                            </ul>
                            <?php if (strlen($_SESSION['login']) == 0) {
                            ?>
                                <button class="btn primary-btn2" href="#loginform" data-toggle="modal" data-dismiss="modal">Login / Register</button>
                            <?php } else {
                            } ?>


                            <!-- <a href="#" class="primary-btn" id="dropdownMenuButton1">Login/</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>
    <!-- Header Section End -->