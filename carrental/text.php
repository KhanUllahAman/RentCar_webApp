<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['updateprofile'])) {
    $name = $_POST['fullname'];
    $mobileno = $_POST['mobilenumber'];
    $dob = $_POST['dob'];
    $adress = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_SESSION['login'];
    $sql = "update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':dob', $dob, PDO::PARAM_STR);
    $query->bindParam(':adress', $adress, PDO::PARAM_STR);
    $query->bindParam(':city', $city, PDO::PARAM_STR);
    $query->bindParam(':country', $country, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $msg = "Profile Updated Successfully";
    $error = "Something went wrong. Please try again";
  }
?>
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

    /* Styles for invalid fields */
    .form-group input.invalid,
    .form-group textarea.invalid {
      border: 2px solid red;
    }

    /* Styles for valid fields */
    .form-group input.valid,
    .form-group textarea.valid {
      border: 2px solid green;
    }

    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
  <!-- Breadcrumb End -->
  <div class="breadcrumb-option set-bg" data-setbg="img/for-4.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Profile</h2>
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
                  <img src="./img/about/team-2.jpg" alt="Image" class="shadow">
                </div>
                <h4 class="text-center"><?php echo htmlentities($result->FullName); ?></h4>
                <p class="text-center"><?php echo htmlentities($result->Address); ?> |
                  <?php echo htmlentities($result->City); ?> | <?php echo htmlentities($result->Country); ?></p>
                <?php include('includes/sidebar.php'); ?>
              </div>

            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                <h3 class="mb-4" style="	font-family: 'Courgette', cursive; color: #FE5115; font-weight: 600;">Account Settings</h3>
                <?php
                if ($msg) { ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS!</strong> <?php echo htmlentities($msg); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                <form method="post" onsubmit="return validateForm()">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Reg Date -</label>
                        <?php echo htmlentities($result->RegDate); ?>
                      </div>
                    </div>
                    <?php if ($result->UpdationDate != "") { ?>
                      <div class="col-md-12">

                        <div class="form-group">
                          <label class="control-label">Last Update at -</label>
                          <?php echo htmlentities($result->UpdationDate); ?>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo htmlentities($result->FullName); ?>" id="fullname">
                        <div class="error-message" id="fullname-error"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="<?php echo htmlentities($result->EmailId); ?>" name="emailid" id="email">
                        <div class="error-message" id="email-error"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo); ?>" id="phone-number">
                        <div class="error-message" id="phone-error"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="text" class="form-control" value="<?php echo htmlentities($result->dob); ?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date">
                        <div class="error-message" id="dob-error"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlentities($result->Country); ?>">
                        <div class="error-message" id="country-error"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlentities($result->City); ?>">
                        <div class="error-message" id="city-error"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="4" id="address"><?php echo htmlentities($result->Address); ?></textarea>
                        <div class="error-message" id="address-error"></div>
                      </div>
                    </div>
                  </div>
              <?php }
          } ?>
              <div>
                <button class="btn col-12" type="submit" name="updateprofile">Save Changes</button>
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
        // Function to validate Full Name
        function validateFullName() {
          var fullNameInput = document.getElementById("fullname");
          var fullNameError = document.getElementById("fullname-error");

          if (fullNameInput.value.trim() === "") {
            fullNameError.textContent = "Full Name is required.";
            fullNameInput.classList.remove("valid");
            fullNameInput.classList.add("invalid");
          } else {
            fullNameError.textContent = "";
            fullNameInput.classList.remove("invalid");
            fullNameInput.classList.add("valid");
          }
        }

        // Function to validate Email
        function validateEmail() {
          var emailInput = document.getElementById("email");
          var emailError = document.getElementById("email-error");
          var emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

          if (!emailInput.value.match(emailRegex)) {
            emailError.textContent = "Please enter a valid email address.";
            emailInput.classList.remove("valid");
            emailInput.classList.add("invalid");
          } else {
            emailError.textContent = "";
            emailInput.classList.remove("invalid");
            emailInput.classList.add("valid");
          }
        }

        // Function to validate Phone Number
        function validatePhoneNumber() {
          var phoneInput = document.getElementById("phone-number");
          var phoneError = document.getElementById("phone-error");
          var phoneRegex = /^\d{11}$/;

          if (!phoneInput.value.match(phoneRegex)) {
            phoneError.textContent = "Please enter a valid 11-digit phone number.";
            phoneInput.classList.remove("valid");
            phoneInput.classList.add("invalid");
          } else {
            phoneError.textContent = "";
            phoneInput.classList.remove("invalid");
            phoneInput.classList.add("valid");
          }
        }

        // Function to validate Date of Birth
        function validateDOB() {
          var dobInput = document.getElementById("birth-date");
          var dobError = document.getElementById("dob-error");
          var dobRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;

          if (!dobInput.value.match(dobRegex)) {
            dobError.textContent = "Please enter a valid date of birth (dd/mm/yyyy).";
            dobInput.classList.remove("valid");
            dobInput.classList.add("invalid");
          } else {
            dobError.textContent = "";
            dobInput.classList.remove("invalid");
            dobInput.classList.add("valid");
          }
        }

        // Function to validate Country
        function validateCountry() {
          var countryInput = document.getElementById("country");
          var countryError = document.getElementById("country-error");

          if (countryInput.value.trim() === "") {
            countryError.textContent = "Country is required.";
            countryInput.classList.remove("valid");
            countryInput.classList.add("invalid");
          } else {
            countryError.textContent = "";
            countryInput.classList.remove("invalid");
            countryInput.classList.add("valid");
          }
        }

        // Function to validate City
        function validateCity() {
          var cityInput = document.getElementById("city");
          var cityError = document.getElementById("city-error");

          if (cityInput.value.trim() === "") {
            cityError.textContent = "City is required.";
            cityInput.classList.remove("valid");
            cityInput.classList.add("invalid");
          } else {
            cityError.textContent = "";
            cityInput.classList.remove("invalid");
            cityInput.classList.add("valid");
          }
        }

        // Function to validate Address
        function validateAddress() {
          var addressTextarea = document.getElementById("address");
          var addressError = document.getElementById("address-error");

          if (addressTextarea.value.trim() === "") {
            addressError.textContent = "Address is required.";
            addressTextarea.classList.remove("valid");
            addressTextarea.classList.add("invalid");
          } else {
            addressError.textContent = "";
            addressTextarea.classList.remove("invalid");
            addressTextarea.classList.add("valid");
          }
        }

        // Attach event listeners to trigger validation on blur and input events
        document.getElementById("fullname").addEventListener("input", validateFullName);
        document.getElementById("fullname").addEventListener("blur", validateFullName);

        document.getElementById("email").addEventListener("input", validateEmail);
        document.getElementById("email").addEventListener("blur", validateEmail);

        document.getElementById("phone-number").addEventListener("input", validatePhoneNumber);
        document.getElementById("phone-number").addEventListener("blur", validatePhoneNumber);

        document.getElementById("birth-date").addEventListener("input", validateDOB);
        document.getElementById("birth-date").addEventListener("blur", validateDOB);

        document.getElementById("country").addEventListener("input", validateCountry);
        document.getElementById("country").addEventListener("blur", validateCountry);

        document.getElementById("city").addEventListener("input", validateCity);
        document.getElementById("city").addEventListener("blur", validateCity);

        document.getElementById("address").addEventListener("input", validateAddress);
        document.getElementById("address").addEventListener("blur", validateAddress);

        function validateForm() {
          var isValid = true;

          // Call all validation functions here
          validateFullName();
          validateEmail();
          validatePhoneNumber();
          validateDOB();
          validateCountry();
          validateCity();
          validateAddress();

          // Check if any field is invalid, and prevent form submission
          if (
            document.querySelectorAll('.form-control.invalid').length > 0 ||
            document.querySelectorAll('.error-message').some(error => error.textContent.trim() !== "")
          ) {
            isValid = false;
          }

          // If all fields are valid, allow form submission
          return isValid;
        }
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