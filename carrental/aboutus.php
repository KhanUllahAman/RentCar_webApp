<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<?php
if (isset($_POST['emailsubscibe'])) {
    $subscriberemail = $_POST['subscriberemail'];
    $sql = "SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        $error = "This Email is Already Subscribe";
    } else {
        $sql = "INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Email Sent. Successfully";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
?>
<!--Header-->
<?php include('includes/header.php'); ?>
<style>
    a:hover {
        color: white;
    }

    a {
        text-decoration: none;
    }
</style>

<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="img/pxfuel.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>About Us</h2>
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home a"></i> Home</a>
                        <span class="text-light">About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->

<!-- About Us Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title about-title">
                    <h2>Wellcome To Superious Auto Online <br />We Provide Everything You Need To A Car</h2>
                    <p>First I will explain what contextual advertising is. Contextual advertising means the
                        advertising of products on a website according to<br /> the content the page is displaying.
                        For example if the content of a website was information on a Ford truck then the
                        advertisements</p>
                </div>
            </div>
        </div>
        <div class="about__feature">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="about__feature__item">
                        <img src="img/about/af_1.png" alt="">
                        <h5>Quality Assurance System</h5>
                        <p>It seems though that some of the biggest problems with the internet advertising trends
                            are the lack of</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="about__feature__item">
                        <img src="img/about/af-2.png" alt="">
                        <h5>Accurate Testing Processes</h5>
                        <p>Where do you register your complaints? How can you protest in any form against companies
                            whose</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="about__feature__item">
                        <img src="img/about/af-3.png" alt="">
                        <h5>Infrastructure Integration Technology</h5>
                        <p>So in final analysis: it’s true, I hate peeping Toms, but if I had to choose, I’d take
                            one any day over an</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="about__pic">
                    <img src="img/about/526591.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="about__item">
                    <h5>Our Mission</h5>
                    <p>Now, I’m not like Robin, that weirdo from my cultural anthropology class; I think that
                        advertising is something that has its place in our society; which for better or worse is
                        structured along a marketplace economy. But, simply because I feel advertising has a right
                        to exist, doesn’t mean that I like or agree with it, in its</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="about__item">
                    <h5>Our Vision</h5>
                    <p>Where do you register your complaints? How can you protest in any form against companies
                        whose advertising techniques you don’t agree with? You don’t. And on another point of
                        difference between traditional products and their advertising and those of the internet
                        nature, simply ignoring internet advertising is </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

<!-- Call Section Begin -->
<section class="call spad set-bg" data-setbg="img/about/call-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="call__text">
                    <div class="section-title">
                        <h2>Subscribe Newsletter</h2>
                        <p>Posters had been a very beneficial marketing tool because it had paved to deliver an
                            effective message that conveyed customer’s</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6">
                <?php if ($error) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong> <?php echo htmlentities($error); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } else if ($msg) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS!</strong> <?php echo htmlentities($msg); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <form method="post" class="call__form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="Email" placeholder="Enter Your Email Address" name="subscriberemail">
                        </div>
                    </div>
                    <button type="submit" name="emailsubscibe" class="site-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Call Section End -->

<!-- Team Section Begin -->
<section class="team spad" style="background-color: #FFFFFF;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title team-title">
                    <span>Our Team</span>
                    <h2>Meet Our Expert</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="team__item">
                    <div class="team__item__pic">
                        <img src="img/about/team-1.jpg" alt="">
                    </div>
                    <div class="team__item__text">
                        <h5>John Smith</h5>
                        <span>Marketing</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team__item">
                    <div class="team__item__pic">
                        <img src="img/about/team-2.jpg" alt="">
                    </div>
                    <div class="team__item__text">
                        <h5>Christine Wise</h5>
                        <span>C.E.O</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team__item">
                    <div class="team__item__pic">
                        <img src="img/about/team-3.jpg" alt="">
                    </div>
                    <div class="team__item__text">
                        <h5>Sean Robbins</h5>
                        <span>Manager</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team__item">
                    <div class="team__item__pic">
                        <img src="img/about/team-4.jpg" alt="">
                    </div>
                    <div class="team__item__text">
                        <h5>Lucy Myers</h5>
                        <span>Delivary</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->
<!-- Testimonial Section Begin -->
<section class="testimonial spad" style="background-color: #000000;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title testimonial-title">
                    <span>Testimonials</span>
                    <h2 class="text-light">What People Say About Us</h2>
                    <p style="color: #E9EAEC;">Our customers are our biggest supporters. What do they think of us?</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial__slider owl-carousel">
                <?php
                $tid = 1;
                $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':tid', $tid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {  ?>
                        <div class="col-lg-8">
                            <div class="testimonial__item">
                                <div class="testimonial__item__author">
                                    <div class="testimonial__item__author__pic">
                                        <img src="img/testimonial/testimonial-1.png" alt="">
                                    </div>
                                    <div class="testimonial__item__author__text">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5 class="text-light"><?php echo htmlentities($result->FullName); ?> | <span class="text-light"> Bank Manager</span>
                                        </h5>
                                    </div>
                                </div>
                                <p><?php echo htmlentities($result->Testimonial); ?></p>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->
<!-- Counter Begin -->
<div class="counter spad set-bg" data-setbg="img/counter-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <?php
                    $sql = "SELECT id from tblusers ";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $regusers = $query->rowCount();
                    ?>
                    <h2 class="counter-num"><?php echo htmlentities($regusers); ?></h2>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <?php
                    $sql1 = "SELECT id from tblvehicles ";
                    $query1 = $dbh->prepare($sql1);;
                    $query1->execute();
                    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                    $totalvehicle = $query1->rowCount();
                    ?>
                    <h2 class="counter-num"><?php echo htmlentities($totalvehicle); ?></h2>
                    <p>Listed Vehicles</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <?php
                    $sql2 = "SELECT id from tblbooking ";
                    $query2 = $dbh->prepare($sql2);
                    $query2->execute();
                    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                    $bookings = $query2->rowCount();
                    ?>
                    <h2 class="counter-num"><?php echo htmlentities($bookings); ?></h2>
                    <p>Total Bookings</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter__item">
                    <?php
                    $sql3 = "SELECT id from tblbrands ";
                    $query3 = $dbh->prepare($sql3);
                    $query3->execute();
                    $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                    $brands = $query3->rowCount();
                    ?>
                    <h2 class="counter-num"><?php echo htmlentities($brands); ?></h2>
                    <p>Total Brands</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter End -->

<!-- Clients Begin -->
<div class="clients spad" style="background-color: #E9EAEC;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title client-title">
                    <span>Partner</span>
                    <h2>Our Partner</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/audi.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/BMW.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/HONDA.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/lambo.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/Nissan.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/pngwing.com.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/suzuki.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="client__item">
                    <img src="img/clients/tayota.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Clients End -->
<!--Footer -->
<?php include('includes/footer.php'); ?>
<!-- /Footer-->
<!--Login-Form -->
<?php include('includes/login.php'); ?>
<!--/Login-Form -->

<!--Register-Form -->
<?php include('includes/registration.php'); ?>

<!--/Register-Form -->

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php'); ?>
<!--/Forgot-password-Form -->