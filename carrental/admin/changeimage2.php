<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['update'])) {
		$vimage = $_FILES["img2"]["name"];
		$id = intval($_GET['imgid']);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		$sql = "update tblvehicles set Vimage2=:vimage where id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vimage', $vimage, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$msg = "Image updated successfully";
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
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">


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

                            <div class="form-group">
													<label class="col-sm-4 control-label" style="color: #FFFFFF; font-weight: bold;">Current Image2</label>
													<?php
													$id = intval($_GET['imgid']);
													$sql = "SELECT Vimage2 from tblvehicles where tblvehicles.id=:id";
													$query = $dbh->prepare($sql);
													$query->bindParam(':id', $id, PDO::PARAM_STR);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {	?>

															<div class="col-sm-8">
																<img src="./assets/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
															</div>
													<?php }
													} ?>
												</div>

												<div class="form-group">
													<label class="col-sm-4 control-label" style="color: #FFFFFF; font-weight: bold;">Upload New Image 2<span style="color: #FE5115">*</span></label>
													<div class="col-sm-8">
														<input type="file" name="img2" required>
													</div>
												</div>




												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-4">

														<button class="btn btn-primary" style="background-color: #FE5115; color: #FFFFFF; font-weight: bold;" name="update" type="submit">Update</button>
													</div>
												</div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php
        include "includes/footer.php"
        ?>
    </div>
    </main>
<?php } ?>