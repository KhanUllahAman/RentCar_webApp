<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['update'])) {
    $password = md5($_POST['password']);
    $newpassword = md5($_POST['newpassword']);
    $email = $_SESSION['login'];
    $sql = "SELECT Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
      $con = "update tblusers set Password=:newpassword where EmailId=:email";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();
      $msg = "Your Password succesfully changed";
    } else {
      $error = "Your current password is wrong";
    }
  }
?>
  <script type="text/javascript">
    function valid() {
      if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        alert("New Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
  </head>
  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->
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

    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }

    .input-group {
      position: relative;
    }

    .input-group-text {
      position: absolute;
      right: 10px;
      top: 55%;
      transform: translateY(-50%);
      cursor: pointer;
      background-color: transparent;
    }
  </style>
  <!-- Breadcrumb End -->
  <div class="breadcrumb-option set-bg" data-setbg="img/for-4.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Update Password</h2>
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
                <h3 class="mb-4" style="	font-family: 'Courgette', cursive; color: #FE5115; font-weight: 600;">Update Password</h3>
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
                <form method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Current Password</label>
                        <input class="form-control" id="password" name="password" type="password">
                        <span class="input-group-text" id="password-toggle">
                          <i class="fa fa-eye" id="togglePassword"></i>
                        </span>
                      </div>
                    </div>
                    <div id="current-password-error" class="error-message"></div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" id="newpassword" type="password" name="newpassword" required>
                        <span class="input-group-text" id="newpassword-toggle">
                          <i class="fa fa-eye" id="toggleNewPassword"></i>
                        </span>
                      </div>
                    </div>
                    <div id="new-password-error" class="error-message"></div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="mt-4">Confirm Password</label>
                        <input class="form-control" id="confirmpassword" type="password" name="confirmpassword" required>
                        <span class="input-group-text" id="confirmpassword-toggle">
                          <i class="fa fa-eye" id="toggleConfirmPassword"></i>
                        </span>
                      </div>
                    </div>
                    <div id="confirm-password-error" class="error-message"></div>
                  </div>
              <?php }
          } ?>
              <div>
                <button class="btn col-12 mt-2" type="submit" name="update" id="submit">Update Password</button>
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
        function validateForm() {
          var isValid = true;
          var currentPassword = document.getElementById('password').value;
          var newPassword = document.getElementById('newpassword').value;
          var confirmPassword = document.getElementById('confirmpassword').value;

          // Validate Current Password (same as previous)

          // Validate New Password
          if (newPassword.length <= 6) {
            document.getElementById('new-password-error').innerHTML = "New password must be at least 6 characters long";
            document.getElementById('newpassword').classList.add('error');
            isValid = false;
          } else {
            document.getElementById('new-password-error').innerHTML = "";
            document.getElementById('newpassword').classList.remove('error');
            document.getElementById('newpassword').classList.add('valid');
          }

          // Validate Confirm Password
          if (newPassword !== confirmPassword) {
            document.getElementById('confirm-password-error').innerHTML = "Passwords do not match";
            document.getElementById('confirmpassword').classList.add('error');
            isValid = false;
          } else {
            document.getElementById('confirm-password-error').innerHTML = "";
            document.getElementById('confirmpassword').classList.remove('error');
            document.getElementById('confirmpassword').classList.add('valid');
          }

          // If any field is invalid, prevent form submission
          if (!isValid) {
            return false;
          }

          // If all fields are valid, allow form submission
          return true;
        }

        // Add blur event listener to each input field to check for errors
        document.getElementById('password').addEventListener('blur', validateForm);
        document.getElementById('newpassword').addEventListener('blur', validateForm);
        document.getElementById('confirmpassword').addEventListener('blur', validateForm);

        // Existing JavaScript code

        // Function to toggle password visibility
        function togglePasswordVisibility(inputElement, eyeIcon) {
          const type = inputElement.getAttribute('type') === 'password' ? 'text' : 'password';
          inputElement.setAttribute('type', type);
          eyeIcon.classList.toggle('fa-eye-slash');
        }

        // Add input event listener to each input field
        function handleInputEvent(inputId, eyeIconId) {
          const inputField = document.getElementById(inputId);
          const eyeIcon = document.getElementById(eyeIconId);
          const inputValue = inputField.value.trim();
          eyeIcon.style.display = inputValue ? 'block' : 'none';
        }

        document.getElementById('password').addEventListener('input', function() {
          handleInputEvent('password', 'password-toggle');
        });

        document.getElementById('newpassword').addEventListener('input', function() {
          handleInputEvent('newpassword', 'newpassword-toggle');
        });

        document.getElementById('confirmpassword').addEventListener('input', function() {
          handleInputEvent('confirmpassword', 'confirmpassword-toggle');
        });

        // Add click event listener to eye icons
        document.getElementById('togglePassword').addEventListener('click', function() {
          const passwordInput = document.getElementById('password');
          togglePasswordVisibility(passwordInput, this);
        });

        document.getElementById('toggleNewPassword').addEventListener('click', function() {
          const newPasswordInput = document.getElementById('newpassword');
          togglePasswordVisibility(newPasswordInput, this);
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
          const confirmPasswordInput = document.getElementById('confirmpassword');
          togglePasswordVisibility(confirmPasswordInput, this);
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