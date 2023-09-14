<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $error = ""; // Initialize error variable
    $brandExists = false; // Initialize brandExists variable

    // Code for updating brand
    if (isset($_POST['submit'])) {
        $brand = $_POST['brand'];
        $id = $_GET['id'];

        // Validate brand name length (4 to 15 characters)
        if (strlen($brand) < 4 || strlen($brand) > 20) {
            $error = "Brand name must be between 4 and 20 characters";
        } else {
            $sql_check = "SELECT * FROM tblbrands WHERE BrandName = :brand AND id != :id";
            $query_check = $dbh->prepare($sql_check);
            $query_check->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query_check->bindParam(':id', $id, PDO::PARAM_STR);
            $query_check->execute();
            $brandExists = $query_check->fetch(PDO::FETCH_ASSOC);
            if ($brandExists) {
                $error = "Brand name already exists";
            } else {
                // Proceed to update the brand since it doesn't exist in the database
                $sql_update = "UPDATE tblbrands SET BrandName=:brand WHERE id=:id";
                $query_update = $dbh->prepare($sql_update);
                $query_update->bindParam(':brand', $brand, PDO::PARAM_STR);
                $query_update->bindParam(':id', $id, PDO::PARAM_STR);
                $query_update->execute();

                $msg = "Brand updated successfully";
            }
        }
    }
?>

    <?php include "includes/header.php" ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-400" style="background-color: #1c2a57;">
                    <div class="card-body p-5">
                        <form method="post" name="chngpwd" class="form-horizontal">
                            <?php if ($msg) { ?>
                                <div class="alert alert-dismissible fade show alertt success-message" role="alert" style="background-color: <?php echo $error ? '#f8d7da' : '#d1e7dd'; ?>">
                                    <strong style="color: <?php echo $error ? '#842029' : '#0f5132'; ?>"><?php echo $error ? 'ERROR' : 'SUCCESS'; ?> <?php echo htmlentities($error ? $error : $msg); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
                                </div>
                            <?php } ?>
                            <?php
                            $id = $_GET['id'];
                            $ret = "select * from tblbrands where id=:id";
                            $query = $dbh->prepare($ret);
                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control <?php echo $error ? 'is-invalid' : ''; ?>" id="floatingInput" value="<?php echo htmlentities($result->BrandName); ?>" name="brand" required onBlur="validateBrand(this.value)">
                                        <label for="floatingInput">Brand Name</label>
                                        <div class="invalid-feedback">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
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
                errorElement.textContent = "Brand name must be between 4 and 15 characters";
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