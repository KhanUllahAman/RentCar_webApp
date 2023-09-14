<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];

  // Simple form validation check
  if (empty($name) || empty($email) || empty($contactno) || empty($message)) {
    $error = "Please fill in all the fields.";
  } else {
    $sql = "INSERT INTO tblcontactusquery(name, EmailId, ContactNumber, Message) VALUES(:name, :email, :contactno, :message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      $msg = "Query Sent. We will contact you shortly";
    } else {
      $error = "Something went wrong. Please try again";
    }
  }
}
?>

</head>
<style>
  .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }

  .succWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }

  .a:hover {
    color: white !important;
  }

  .a {
    text-decoration: none !important;
  }
</style>
<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->
<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="img/for-6.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>Contact Us</h2>
          <div class="breadcrumb__links">
            <a href="index.php" class="a"><i class="fa fa-home a"></i> Home</a>
            <span class="text-light">Contact Us</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Begin -->
<!-- Contact Section Begin -->
<section class="contact spad" style="background-color: #000000;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="contact__text">
          <div class="section-title">
            <h2>Let’s Work Together</h2>
            <p class="text-light">To make requests for further information, contact us via our social channels.</p>
          </div>
          <ul>
            <li><span>Weekday</span> 08:00 am to 18:00 pm</li>
            <li><span>Saturday:</span> 10:00 am to 16:00 pm</li>
            <li><span>Sunday:</span> Closed</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="contact__form">
          <!-- Add this after the <form> tag -->
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

          <form method="post">
            <div class="row">
              <div class="col-lg-6">
                <input type="text" placeholder="Full Name" name="fullname" id="fullname">
              </div>
              <div class="col-lg-6">
                <input type="text" placeholder="Email" name="email" id="emailaddress">
              </div>
            </div>
            <input type="number" placeholder="Phone Number" name="contactno" id="phonenumber">
            <textarea placeholder="Your Message" name="message"></textarea>
            <button type="submit" class="site-btn" name="send">Send Message</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Contact Section End -->

<!-- Contact Address Begin -->
<div class="contact-address">
  <div class="container">
    <div class="contact__address__text">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="contact__address__item">
            <h4>California Showroom</h4>
            <p>625 Gloria Union, California, United Stated Colorlib.california@gmail.com</p>
            <span>(+12) 456 678 9100</span>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="contact__address__item">
            <h4>New York Showroom</h4>
            <p>8235 South Ave. Jamestown, NewYork Colorlib.Newyork@gmail.com</p>
            <span>(+12) 456 678 9100</span>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="contact__address__item">
            <h4>Florida Showroom</h4>
            <p>497 Beaver Ridge St. Daytona Beach, Florida Colorlib.california@gmail.com</p>
            <span>(+12) 456 678 9100</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Address End -->
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