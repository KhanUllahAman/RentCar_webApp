<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  $error = '';
  $msg = '';

  if (isset($_POST['submit'])) {
    $testimonial = trim($_POST['testimonial']);
    $email = $_SESSION['login'];

    if (empty($testimonial)) {
      $error = "Testimonial field is required. Please fill it before submitting.";
    } else {
      $sql = "INSERT INTO tbltestimonial(UserEmail, Testimonial) VALUES(:email, :testimonial)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':testimonial', $testimonial, PDO::PARAM_STR);
      $query->bindParam(':email', $email, PDO::PARAM_STR);

      if ($query->execute()) {
        $msg = "Testimonial submitted successfully";
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

    .is-invalid {
      border-color: #dc3545 !important;
      box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
    }

    .is-valid {
      border-color: #28a745 !important;
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25) !important;
    }
  </style>
  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->
  <!-- Breadcrumb End -->
  <div class="breadcrumb-option set-bg" data-setbg="img/for-4.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Post Testimonial</h2>
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
                <h3 class="mb-4" style="	font-family: 'Courgette', cursive; color: #FE5115; font-weight: 600;">Post Testimonial</h3>
                <?php if ($error) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-triangle-exclamation"></i></strong> <?php echo htmlentities($error); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } else if ($msg) { ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-circle-check"></i></strong> <?php echo htmlentities($msg); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                <form method="post" name="testimonialForm" id="testimonialForm">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Testimonail</label>
                        <textarea class="form-control" name="testimonial" rows="4" onblur="validateForm()"></textarea>
                      </div>
                    </div>
                  </div>
              <?php }
          } ?>
              <div>
                <button class="btn col-12" type="submit" name="submit">Save Changes</button>
              </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>



      <!--Footer -->
      <?php include('includes/footer.php'); ?>
      <!-- /Footer-->
      <script>
        document.getElementById("testimonialForm").addEventListener("submit", function(event) {
          var testimonial = document.forms["testimonialForm"]["testimonial"].value.trim();
          var errorElement = document.getElementById("error-message");
          var successElement = document.getElementById("success-message");
          var testimonialInput = document.forms["testimonialForm"]["testimonial"];

          if (testimonial === "") {
            testimonialInput.classList.add("is-invalid");
            testimonialInput.classList.remove("is-valid");
            errorElement.style.display = "block";
            successElement.style.display = "none";
            event.preventDefault(); // Prevent form submission
          } else {
            testimonialInput.classList.remove("is-invalid");
            testimonialInput.classList.add("is-valid");
            errorElement.style.display = "none";
            successElement.style.display = "block";
          }
        });

        document.forms["testimonialForm"]["testimonial"].addEventListener("blur", function() {
          var testimonial = this.value.trim();
          var testimonialInput = this;

          if (testimonial === "") {
            testimonialInput.classList.remove("is-valid");
            testimonialInput.classList.add("is-invalid");
          } else {
            testimonialInput.classList.remove("is-invalid");
            testimonialInput.classList.add("is-valid");
          }
        });
      </script>
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