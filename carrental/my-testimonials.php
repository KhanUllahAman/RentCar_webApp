<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>
  <!--Header-->
  <?php include('includes/header.php'); ?>
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

    .shadow {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    }

    .profile-tab-nav {
      min-width: 250px;
    }

    .tab-content {
      flex: 1;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .nav-pills a.nav-link {
      padding: 15px 20px;
      border-bottom: 1px solid #ddd;
      border-radius: 0;
      color: #333;
    }

    .nav-pills a.nav-link i {
      width: 20px;
    }

    .img-circle img {
      height: 100px;
      width: 100px;
      border-radius: 100%;
      border: 5px solid #fff;
    }

    .test1 {
      background-color: transparent;
      color: red;
      border: 2px solid red;
      padding: 7px 7px 7px 7px;
      border-radius: 6px;
    }

    .test1:hover {
      background-color: red;
      color: #FFFFFF;
      transition: 0.5s;
    }

    .test2 {
      background-color: transparent;
      color: green;
      border: 2px solid green;
      padding: 7px 7px 7px 7px;
      border-radius: 6px;
    }

    .test2:hover {
      background-color: green;
      color: #FFFFFF;
      transition: 0.5s;
    }
  </style>
  <!-- Breadcrumb End -->
  <div class="breadcrumb-option set-bg" data-setbg="img/for-4.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>My Testimonails</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Begin -->
  <?php
  $useremail = $_SESSION['login'];
  $sql = "SELECT * from tblusers where EmailId=:useremail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
      <section class="py-5 my-5" style="background-color: #FFFFFF;">
        <div class="container">
          <h1 class="mb-5 text-center" style="font-family: 'Courgette', cursive;">Account Settings</h1>
          <div class="shadow rounded-lg d-block d-sm-flex" style="background-color: #E9EAEC;">
            <div class="profile-tab-nav border-right">
              <div class="p-4">
                <div class="img-circle text-center mb-3">
                  <?php
                  // Check if $result->ProfilePicture is not empty or not set
                  if (!isset($result->ProfilePicture) || empty($result->ProfilePicture)) {
                    $profilePicture = 'img/profile_images/default_profile.webp';
                  } else {
                    $profilePicture = htmlentities($result->ProfilePicture);
                  }
                  ?>
                  <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="shadow">
                </div>
                <h4 class="text-center"><?php echo htmlentities($result->FullName); ?></h4>
                <p class="text-center"><?php echo htmlentities($result->Address); ?> |
                  <?php echo htmlentities($result->City); ?> | <?php echo htmlentities($result->Country); ?></p>
                <?php include('includes/sidebar.php'); ?>
              </div>

            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                <h3 class="mb-4" style="	font-family: 'Courgette', cursive; color: #FE5115; font-weight: 600;">My Testimonials</h3>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                  <?php
                  $useremail = $_SESSION['login'];
                  $sql = "SELECT * from tbltestimonial where UserEmail=:useremail";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);

                  if ($cnt = $query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                      <div class="col">
                        <div class="card">
                          <!-- <img src="" class="card-img-top" alt="..."> -->
                          <div class="card-body" style="background-color: #FFFFFF;">
                            <span class="card-text">
                              <b>Your Testimonail :</b> <?php echo htmlentities($result->Testimonial); ?>
                              <br>
                              <b>Posting Date:</b> <?php echo htmlentities($result->PostingDate); ?>
                              <br>
                            </span>
                            <div class="float-end">
                              <?php if ($result->status == 1) { ?>
                                <button type="button" class="test2">Testimonial Activate</button>
                              <?php } else { ?>
                                <button type="button" class="test1">Waiting for approval</button>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
              <?php }
          } ?>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!--/my-vehicles-->
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
    <?php } ?>