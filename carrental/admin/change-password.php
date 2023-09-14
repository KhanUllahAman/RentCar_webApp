<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for change password	
    if (isset($_POST['submit'])) {
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $username = $_SESSION['alogin'];
        $sql = "SELECT Password FROM admin WHERE UserName=:username and Password=:password";
        $query = $dbh->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            $con = "update admin set Password=:newpassword where UserName=:username";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
            $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();
            $msg = "Your Password succesfully changed";
        } else {
            $error = "Your current password is not valid.";
        }
    }
?>

    <?php
    include "includes/header.php"
    ?>
    <style>
        .eye-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: #000;
            /* Change the color as needed */
        }

        .eye-toggle:hover {
            color: #FE5115;
            /* Change the hover color as needed */
        }
    </style>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-400" style="background-color: #1c2a57;">
                    <div class="card-body p-5">
                        <form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
                            <?php if ($error) { ?>
                                <div class="alert alert-dismissible fade show" role="alert" style="background-color: #f8d7da;">
                                    <strong style="color: #842029;">ERROR <?php echo htmlentities($error); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
                                </div><?php } else if ($msg) { ?>
                                <div class="alert alert-dismissible fade show" role="alert" style="background-color: #d1e7dd;">
                                    <strong style="color: #0f5132;">SUCCESS <?php echo htmlentities($msg); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
                                </div>
                            <?php } ?>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="newpasswordd" name="password" id="password" required placeholder="Enter Your Current Password">
                                <label for="floatingInput">Current Password</label>
                                <span class="eye-toggle" onclick="togglePasswordVisibility('newpasswordd')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="newpassword" name="newpassword" required placeholder="Enter Your New Password" onblur="validateNewPassword()">
                                <label for="newpassword">New Password</label>
                                <div id="newPasswordError" style="color: red;" class="error-text"></div>
                                <span class="eye-toggle" onclick="togglePasswordVisibility('newpassword')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Enter Your Confirm Password" onblur="validateConfirmPassword()">
                                <label for="confirmpassword">Confirm Password</label>
                                <div id="confirmPasswordError" style="color: red;" class="error-text"></div>
                                <span class="eye-toggle" onclick="togglePasswordVisibility('confirmpassword')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="d-grid">
                                <button class="btn" name="submit" type="submit" style="background-color: #FE5115; color: #FFF;">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "includes/footer.php"
        ?>
        <script>
            function togglePasswordVisibility(inputId) {
                var passwordInput = document.getElementById(inputId);

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }



            function validateNewPassword() {
                var newPassword = document.getElementById("newpassword").value;
                if (newPassword === "") {
                    document.getElementById("newPasswordError").innerHTML = "Please enter your new password.";
                } else if (!/^(?=.*[A-Za-z]{4,})(?=.*\d{3,}).{7,}$/.test(newPassword)) {
                    document.getElementById("newPasswordError").innerHTML = "New password must have at least 4 alphabets and 3 numbers.";
                } else {
                    document.getElementById("newPasswordError").innerHTML = "";
                }
            }

            function validateConfirmPassword() {
                var confirmPassword = document.getElementById("confirmpassword").value;
                var newPassword = document.getElementById("newpassword").value;
                if (confirmPassword === "") {
                    document.getElementById("confirmPasswordError").innerHTML = "Please confirm your password.";
                } else if (newPassword !== confirmPassword) {
                    document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.";
                } else {
                    document.getElementById("confirmPasswordError").innerHTML = "";
                }
            }
        </script>

    </div>
    </main>
<?php } ?>