<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['fname'] = $results[0]->FullName;
    $currentpage = $_SERVER['REQUEST_URI'];
    // echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    // echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js' integrity='sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";
    // echo "<script>
    // toastr['success']('You are Successfully Login', 'Success');
    // </script>";
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js' integrity='sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";
    echo "<script>
    setTimeout(function() {
      window.location.href = document.location = '$currentpage';
    }, 3000);
      toastr['success']('You are Successfully Logged In', 'Success');
    </script>";
  } else {
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js' integrity='sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";
    echo "<script>
    toastr['error']('Your Email or password is invalid', 'Error');
  </script>";
  }
}
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Courgette&family=Sonsie+One&display=swap');

  .mo_t {
    font-weight: bolder;
    color: #FE5115;
    font-size: 5vh;
    font-family: 'Courgette', cursive;
  }

  /* buttons */
  .btn {
    display: inline-block;
    font-size: 3vh;
    color: #000000;
    font-weight: 500;
    background: #FE5115;
    border-radius: 2px;
  }

  .btn:hover {
    color: #000000;
    background-image: linear-gradient(145deg,
        transparent 10%,
        #ff7a4d 10% 20%,
        transparent 20% 30%,
        #ff7a4d 30% 40%,
        transparent 40% 50%,
        #ff7a4d 50% 60%,
        transparent 60% 70%,
        #ff7a4d 70% 80%,
        transparent 80% 90%,
        #ff7a4d 90% 100%);
    animation: background 3s linear infinite;
  }

  @keyframes background {
    0% {
      background-position: 0 0;
    }

    100% {
      background-position: 400px 0;
    }
  }

  .gg {
    text-decoration: none;
    color: #FE5115;
  }

  .gg:hover {
    color: #FE5115;
  }

  .ggg {
    text-decoration: none;
    color: #1c1c1c;
  }

  .ggg:hover {
    color: #1c1c1c;
  }

  .ff {
    margin-right: 8.5vh;
  }

  /* Existing styles */

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

  .eye-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
  }
</style>

<div class="modal fade" id="loginform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #E9EAEC;">
      <div class="modal-header">
        <h5 class="modal-title mo_t" id="exampleModalLabel">Login</h5>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Enter your Email" name="email">
            <label for="floatingInput">Email address</label>
            <div id="email-error" class="error-message"></div>

          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
            <span class="eye-icon" onclick="togglePasswordVisibility()">
              <i class="fas fa-eye"></i>
            </span>
            <div id="password-error" class="error-message"></div>
          </div>
          <div class="d-grid gap-2 mt-3">
            <button class="btn" type="submit" name="login">Login</button>
          </div>
        </form>
      </div>
      <div class="modal-footer ff">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal" class="gg">Signup Here</a></p>
        <br>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" class="ggg">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>
<!-- Include SweetAlert2 library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // Existing JavaScript code

  // Function to validate email format
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Function to validate password length
  function isValidPassword(password) {
    return password.length >= 6;
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

  document.getElementById('floatingInput').addEventListener('input', function() {
    validateInputField('floatingInput', 'email-error', isValidEmail);
  });

  document.getElementById('floatingPassword').addEventListener('input', function() {
    validateInputField('floatingPassword', 'password-error', isValidPassword);

    // Show eye icon when password input is valid and non-empty
    const eyeIcon = document.querySelector('.eye-icon');
    if (isValidPassword(this.value)) {
      eyeIcon.style.visibility = 'visible';
    } else {
      eyeIcon.style.visibility = 'hidden';
    }
  });

  // Function to toggle password visibility
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('floatingPassword');
    const eyeIcon = document.querySelector('.eye-icon i');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  }

  // Validate the entire form before submission
  document.getElementById('loginform').addEventListener('submit', function(event) {
    const isEmailValid = validateInputField('floatingInput', 'email-error', isValidEmail);
    const isPasswordValid = validateInputField('floatingPassword', 'password-error', isValidPassword);

    if (!isEmailValid || !isPasswordValid) {
      event.preventDefault(); // Prevent form submission
    }
  });
</script>