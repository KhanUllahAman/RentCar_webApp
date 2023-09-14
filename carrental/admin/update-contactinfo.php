<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for change password	
    if (isset($_POST['submit'])) {
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contactno = $_POST['contactno'];
        $sql = "update tblcontactusinfo set Address=:address,EmailId=:email,ContactNo=:contactno";
        $query = $dbh->prepare($sql);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
        $query->execute();
        $msg = "Info Updateed successfully";
    }
?>
    <?php
    include "includes/header.php"
    ?>

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
                            <?php $sql = "SELECT * from  tblcontactusinfo ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {                ?>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Enter Address" name="address" value="<?php echo htmlentities($result->Address); ?>" required>
                                        <label for="floatingInput">Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Enter Email" name="email" value="<?php echo htmlentities($result->EmailId); ?>" required>
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Enter Contact Number" name="contactno" value="<?php echo htmlentities($result->ContactNo); ?>" required>
                                        <label for="floatingInput">Contact Number</label>
                                    </div>
                            <?php }
                            } ?>
                            <div class="d-grid">
                                <button class="btn" type="submit" style="background-color: #FE5115; color: #FFF;" name="submit">Update</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include "includes/footer.php"
        ?>
    </div>
    </main>
<?php } ?>