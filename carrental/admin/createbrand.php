<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $error = ""; // Initialize error variable

    // Code for change password
    if (isset($_POST['submit'])) {
        $brand = $_POST['brand'];

        // Validate brand name length (4 to 15 characters)
        if (strlen($brand) < 4 || strlen($brand) > 20) {
            $error = "Brand name must be between 4 and 20 characters";
        } else {
            $sql_check = "SELECT * FROM tblbrands WHERE BrandName = :brand";
            $query_check = $dbh->prepare($sql_check);
            $query_check->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query_check->execute();
            $brandExists = $query_check->fetch(PDO::FETCH_ASSOC);
            if ($brandExists) {
                $error = "Brand name already exists";
            } else {
                // Proceed to insert the brand since it doesn't exist in the database
                $sql_insert = "INSERT INTO tblbrands(BrandName) VALUES(:brand)";
                $query_insert = $dbh->prepare($sql_insert);
                $query_insert->bindParam(':brand', $brand, PDO::PARAM_STR);
                $query_insert->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "Brand Created successfully";
                } else {
                    $error = "Something went wrong. Please try again";
                }
            }
        }
    }
?>

    <?php include "includes/header.php" ?>
    <!-- <style>
        .success-message {
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }

        .success-message.hidden {
            opacity: 0;
            pointer-events: none;
        }
    </style> -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-400" style="background-color: #1c2a57;">
                    <div class="card-body p-5">
                        <form method="post" name="chngpwd" class="form-horizontal">
                            <?php if ($msg) { ?>
                                <div class="alert alert-dismissible fade show alertt success-message" role="alert" style="background-color: #d1e7dd; transition: opacity 1s;">
                                    <strong style="color: #0f5132;">SUCCESS <?php echo htmlentities($msg); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
                                </div>
                            <?php } ?>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php echo $error ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="Enter Brand" name="brand" onBlur="validateBrand(this.value)">
                                <label for="floatingInput">Brand Name</label>
                                <div class="invalid-feedback">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn" type="submit" style="background-color: #FE5115; color: #FFF;" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php" ?>
    </div>
    </main>
    <script>
        function validateBrand(brandValue) {
            var errorElement = document.querySelector('.invalid-feedback');
            errorElement.innerHTML = ""; // Clear previous error message

            // Check if brand name is between 4 and 15 characters
            if (brandValue.length < 4 || brandValue.length > 20) {
                errorElement.textContent = "Brand name must be between 4 and 20 characters";
            }
        }

        function hideSuccessMessage() {
            var successAlert = document.querySelector('.alertt.success-message');
            if (successAlert) {
                var opacity = 1; 
                var interval = 100; 
                var duration = 2000; 
                var step = interval / duration; 

                var fadeOutInterval = setInterval(function() {
                    opacity -= step; 

                    if (opacity <= 0) {
                        clearInterval(fadeOutInterval); 
                        successAlert.remove(); 
                    } else {
                        successAlert.style.opacity = opacity; 
                    }
                }, interval);
            }
        }
        window.addEventListener('load', hideSuccessMessage);
        window.addEventListener('load', hideSuccessMessage);
    </script>
<?php } ?>