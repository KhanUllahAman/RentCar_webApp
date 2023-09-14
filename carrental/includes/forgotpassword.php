<?php
if (isset($_POST['update'])) {
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $newpassword = md5($_POST['newpassword']);
  $sql = "SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    echo "<script>
    toastr['success']('Your Password was successfully changed', 'Success');
  </script>";
  } else {
    echo "<script>
    toastr['error']('You are not our user please first Register', 'Error');
  </script>";
  }
}

?>
<!-- <script type="text/javascript">
  function valid() {
    if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
      alert("New Password and Confirm Password Field do not match  !!");
      document.chngpwd.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script> -->
<style>
  /* Add new styles for invalid and valid states */
  .is-invalid {
    border-color: #dc3545 !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
  }

  .is-valid {
    border-color: #28a745 !important;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25) !important;
  }

  .error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
  }

  /* Add new styles for eye icon positioning */
  .position-relative {
    position: relative;
  }
</style>
<div class="modal fade" id="forgotpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #E9EAEC;">
      <div class="modal-header">
        <h5 class="modal-title mo_t" id="exampleModalLabel">Password Recovery</h5>
      </div>
      <div class="modal-body">
        <form name="chngpwd" method="post">

          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" placeholder="Your Email address*" id="floatingInputt">
            <label for="floatingInputt">Email</label>
            <div id="email-errorr" class="error-message"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="number" name="mobile" class="form-control" placeholder="Your Reg. Mobile*" id="floatingMobileno">
            <label for="floatingMobileno">Mobile Number</label>
            <div id="Mobile-errorr" class="error-message"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="newpassword" class="form-control" placeholder="New Password*" id="floatingPasswor">
            <label id="floatingPasswor">New Password</label>
            <span class="eye-icon" onclick="togglePasswordVisibilit()">
              <i class="fas fa-eye"></i>
            </span>
            <div id="password-erro" class="error-message"></div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" id="floatingconfirm">
            <label for="floatingconfirm">Confirm Password</label>
            <span class="eye-icon" onclick="togglePasswordVisibili()">
              <i class="fas fa-eye"></i>
            </span>
            <div id="confirm-error" class="error-message"></div>
          </div>

          <div class="d-grid gap-2 mt-3">
            <button class="btn r1" type="submit" name="update">Reset My Password</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <p class="gray_text">For security reasons we don't store your password. Your password will be reset and a new one will be send.</p>
        <p><a href="#loginform" style="text-decoration: none; color: #FE5115;" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
      </div>
    </div>
  </div>
</div>
<script>
  // Function to validate email format
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Function to validate mobile number format
  function isValidMobile(mobile) {
    const mobileRegex = /^\d{10}$/;
    return mobileRegex.test(mobile);
  }

  // Function to validate password length
  function isValidPassword(newpassword) {
    return newpassword.length >= 6;
  }

  // Function to validate confirm password
  function isValidConfirmPassword(confirmpassword) {
    const newPassword = document.chngpwd.newpassword.value;
    return confirmpassword === newPassword;
  }

  // Function to handle input events and validate fields
  function validateInputField(inputId, errorId, validationFunction) {
    const inputField = document.getElementById(inputId);
    const errorElement = document.getElementById(errorId);
    const inputValue = inputField.value.trim();

    if (!inputValue) {
      errorElement.textContent = "This field is required";
      inputField.classList.add('is-invalid');
      inputField.classList.remove('is-valid');
      return false;
    } else if (!validationFunction(inputValue)) {
      errorElement.textContent = "Invalid input";
      inputField.classList.add('is-invalid');
      inputField.classList.remove('is-valid');
      return false;
    } else {
      errorElement.textContent = "";
      inputField.classList.remove('is-invalid');
      inputField.classList.add('is-valid');
      return true;
    }
  }

  document.getElementById('floatingInputt').addEventListener('input', function() {
    validateInputField('floatingInputt', 'email-errorr', isValidEmail);
  });

  document.getElementById('floatingMobileno').addEventListener('input', function() {
    validateInputField('floatingMobileno', 'Mobile-errorr', isValidMobile);
  });

  document.getElementById('floatingPasswor').addEventListener('input', function() {
    validateInputField('floatingPasswor', 'password-erro', isValidPassword);
    // Show eye icon when password input is valid and non-empty
    const eyeIcon = document.querySelector('.eye-icon');
    if (isValidPassword(this.value)) {
      eyeIcon.style.visibility = 'visible';
    } else {
      eyeIcon.style.visibility = 'hidden';
    }
  });

  document.getElementById('floatingconfirm').addEventListener('input', function() {
    validateInputField('floatingconfirm', 'confirm-error', isValidConfirmPassword);
  });
  // Validate the entire form before submission
  document.getElementById('forgotpassword').addEventListener('submit', function(event) {
    const isEmailValidd = validateInputField('floatingInputt', 'email-errorr', isValidEmail);
    const isMobileValid = validateInputField('floatingMobileno', 'Mobile-errorr', isValidMobile);
    const isPasswordValidd = validateInputField('floatingPasswor', 'password-erro', isValidPassword);
    const isConfirmpValid = validateInputField('floatingconfirm', 'confirm-error', isValidConfirmPassword);

    if (!isEmailValidd || !isMobileValid || !isPasswordValidd || !isConfirmpValid) {
      event.preventDefault(); // Prevent form submission
    }
  });
  // Function to toggle password visibility
  function togglePasswordVisibilit() {
    const passwordInputt = document.getElementById('floatingPasswor');
    const eyeIconn = document.querySelector('.eye-icon i');

    if (passwordInputt.type === 'password') {
      passwordInputt.type = 'text';
      eyeIconn.classList.remove('fa-eye');
      eyeIconn.classList.add('fa-eye-slash');
    } else {
      passwordInputt.type = 'password';
      eyeIconn.classList.remove('fa-eye-slash');
      eyeIconn.classList.add('fa-eye');
    }
  }

  // Function to toggle confirm password visibility
  function togglePasswordVisibili() {
    const passwordInputtt = document.getElementById('floatingconfirm');
    const eyeIconnn = document.querySelector('.eye-icon i');

    if (passwordInputtt.type === 'password') {
      passwordInputtt.type = 'text';
      eyeIconnn.classList.remove('fa-eye');
      eyeIconnn.classList.add('fa-eye-slash');
    } else {
      passwordInputtt.type = 'password';
      eyeIconnn.classList.remove('fa-eye-slash');
      eyeIconnn.classList.add('fa-eye');
    }
  }
</script>