<?php
//error_reporting(0);
if (isset($_POST['signup'])) {
  $fname = $_POST['fullname'];
  $email = $_POST['emailid'];
  $mobile = $_POST['mobileno'];
  $password = md5($_POST['password']);
  $sql = "INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>
    toastr['success']('Your Registration Successfully Now you can Login', 'Success');
  </script>";
  } else {
    echo "<script>
    toastr['error']('Something went wrong', 'Error');
  </script>";
  }
}

?>


<script>
  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailid=' + $("#emailid").val(),
      type: "POST",
      success: function(data) {
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
</script>
<script type="text/javascript">
  function valid() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
      alert("Password and Confirm Password Field do not match  !!");
      document.signup.confirmpassword.focus();
      return false;
    }
    return true;
  }

  // function showValidationIcon(inputId, isValid) {
  //   const validationIcon = document.getElementById(`${inputId}-icon`);
  //   validationIcon.innerHTML = isValid ? '<i class="fas fa-check-circle success"></i>' : '<i class="fas fa-times-circle"></i>';
  //   validationIcon.style.display = 'block';
  // }

  function validateFullName() {
    const fullNameInput = document.getElementById("fullname");
    const fullNameError = document.getElementById("fullname-error");
    const fullName = fullNameInput.value.trim();

    if (fullName.length === 0) {
      fullNameError.textContent = "Full Name is required.";
      fullNameInput.style.borderColor = "red";
    } else if (fullName.length > 20) {
      fullNameError.textContent = "Full Name should be less than or equal to 20 characters.";
      fullNameInput.style.borderColor = "red";
    } else {
      fullNameError.textContent = "";
      fullNameInput.style.borderColor = "green";
    }
  }

  function validateMobileNo() {
    const mobileNoInput = document.getElementById("mobileno");
    const mobileNoError = document.getElementById("mobileno-error");
    const mobileNo = mobileNoInput.value.trim();

    if (mobileNo.length !== 10) {
      mobileNoError.textContent = "Mobile Number should be 10 digits.";
      mobileNoInput.style.borderColor = "red";
    } else {
      mobileNoError.textContent = "";
      mobileNoInput.style.borderColor = "green";
    }
  }

  function validateEmail() {
    const emailInput = document.getElementById("emailid");
    const emailError = document.getElementById("emailid-error");
    const email = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
      emailError.textContent = "Invalid Email Address.";
      emailInput.style.borderColor = "red";
    } else {
      emailError.textContent = "";
      emailInput.style.borderColor = "green";
    }
  }



  function validatePasswordd() {
    const passwordInput = document.getElementById("passwordd");
    const passwordError = document.getElementById("password-errorr");
    const password = passwordInput.value.trim();

    if (password.length < 6) {
      passwordError.textContent = "Password should be at least 6 characters.";
      passwordInput.style.borderColor = "red";
      showValidationIcon('passwordd', false);
    } else {
      passwordError.textContent = "";
      passwordInput.style.borderColor = "green";
      showValidationIcon('passwordd', true);
    }
  }

  function validateConfirmPassword() {
    const passwordInput = document.getElementById("passwordd");
    const confirmPasswordInput = document.getElementById("confirmpassword");
    const confirmPasswordError = document.getElementById("confirmpassword-error");
    const confirmPassword = confirmPasswordInput.value.trim();
    const password = passwordInput.value.trim();

    if (confirmPassword !== password) {
      confirmPasswordError.textContent = "Password and Confirm Password do not match.";
      confirmPasswordInput.style.borderColor = "red";
      showValidationIcon('confirmpassword', false);
    } else {
      confirmPasswordError.textContent = "";
      confirmPasswordInput.style.borderColor = "green";
      showValidationIcon('confirmpassword', true);
    }
  }

  function valid() {
    // Run all validation functions before form submission
    validateFullName();
    validateMobileNo();
    validateEmail();
    validatePasswordd();
    validateConfirmPassword();

    // Check if any validation errors exist
    const validationErrors = document.querySelectorAll(".validation-message");
    for (const error of validationErrors) {
      if (error.textContent !== "") {
        return false; // Don't submit the form if there are validation errors
      }
    }

    return true; // All fields are valid, so allow form submission
  }

  function togglePasswordVisibilityy(inputId) {
    const passwordInputt = document.getElementById(inputId);
    const eyeIconn = document.getElementById(`${inputId}-eye-icon`);

    if (passwordInputt.type === "password") {
      passwordInputt.type = "text";
      eyeIconn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
      passwordInputt.type = "password";
      eyeIconn.innerHTML = '<i class="fas fa-eye"></i>';
    }
  }
</script>



<style>
  /* ... (your existing CSS code) ... */

  .validation-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    display: none;
  }

  .validation-message {
    color: red;
    font-size: 12px;
  }

  /* Add success styles */
  .validation-icon.success {
    color: green;
  }

  .validation-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 16px;
    display: none;
  }

  .validation-message {
    color: red;
    font-size: 12px;
  }

  /* Add success styles */
  .validation-icon.success {
    color: green;
  }

  /* ... (your existing CSS code) ... */
</style>
<!-- ... (your existing HTML code) ... -->
<div class="modal fade" id="signupform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #E9EAEC;">
      <div class="modal-header">
        <h5 class="modal-title mo_t" id="exampleModalLabel">Sign Up</h5>
      </div>
      <div class="modal-body">
        <form method="post" name="signup">

          <!-- ... (your existing HTML code) ... -->

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="fullname" placeholder="Enter your Full Name" name="fullname" required="required" onblur="validateFullName()">
            <label for="fullname">Full Name</label>
            <div class="validation-icon" id="fullname-icon"></div>
            <div class="validation-message" id="fullname-error"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="mobileno" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required" onblur="validateMobileNo()">
            <label for="mobileno">Mobile Number</label>
            <div class="validation-icon" id="mobileno-icon"></div>
            <div class="validation-message" id="mobileno-error"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required" onblur="validateEmail()">
            <label for="emailid">Email</label>
            <span id="user-availability-status" style="font-size: 12px;"></span>
            <div class="validation-icon" id="emailid-icon"></div>
            <div class="validation-message" id="emailid-error"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="passwordd" placeholder="Password" required="required" onblur="validatePasswordd()">
            <label for="password">Password</label>
            <div class="eye-icon" id="password-eye-icon" onclick="togglePasswordVisibilityy('passwordd')">
              <i class="fas fa-eye"></i>
            </div>
            <div class="validation-icon" id="password-iconn"></div>
            <div class="validation-message" id="password-errorr"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required="required" onblur="validateConfirmPassword()">
            <label for="confirmpassword">Confirm Password</label>
            <div class="eye-icon" id="confirmpassword-eye-icon" onclick="togglePasswordVisibilityy('confirmpassword')">
              <i class="fas fa-eye"></i>
            </div>
            <div class="validation-icon" id="confirmpassword-icon"></div>
            <div class="validation-message" id="confirmpassword-error"></div>
          </div>
          <!-- ... (your existing HTML code) ... -->


          <div class="d-grid gap-2 mt-3">
            <button class="btn" type="submit" name="signup" id="submit">Sign Up</button>
          </div>
        </form>
      </div>
      <div class="modal-footer ff">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal" class="gg">Login Here</a></p>
        <br>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" class="ggg">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>

<!-- ... (your existing HTML code) ... -->