<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_REQUEST['del'])) {
        $delid = intval($_GET['del']);
        $sql = "delete from tblvehicles SET id=:status WHERE  id=:delid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delid', $delid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Vehicle  record deleted successfully";
    }


?>
    <?php
    include "includes/header.php"
    ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" style="background-color: #1c2a57;">
                    <div class="card-header pb-0 px-3" style="background-color: #1c2a57;">
                        <h6 class="mb-0 text-light font-weight-bold">Vehicles Details</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {                ?>
                                    <li class="list-group-item border-0 d-flex p-4 mb-2  border-radius-lg" style="background-color: #1c2a57;">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm text-light font-weight-bold"><?php echo htmlentities($result->VehiclesTitle); ?></h6>
                                            <span class="mb-2 text-xs text-light">Brand Name: <span class="text-light font-weight-bold ms-sm-2"><?php echo htmlentities($result->BrandName); ?></span></span>
                                            <span class="mb-2 text-xs text-light">Price Per Day: <span class="text-light ms-sm-2 font-weight-bold"><?php echo htmlentities($result->PricePerDay); ?></span></span>
                                            <span class="text-xs text-light">Fuel Type: <span class="text-light ms-sm-2 font-weight-bold"><?php echo htmlentities($result->FuelType); ?></span></span>
                                            <span class="text-xs text-light">Model Year: <span class="text-light ms-sm-2 font-weight-bold"><?php echo htmlentities($result->ModelYear); ?></span></span>

                                        </div>
                                        <div class="ms-auto text-end">
                                            <a href="edit-vehicle.php?id=<?php echo $result->id; ?>" class="btn btn-link text-success px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-success me-2" aria-hidden="true"></i>Edit</a>
                                        </div>
                                    </li>
                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </ul>
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