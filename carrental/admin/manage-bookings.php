<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_REQUEST['eid'])) {
        $eid = intval($_GET['eid']);
        $status = "2";
        $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();

        $msg = "Booking Successfully Cancelled";
    }


    if (isset($_REQUEST['aeid'])) {
        $aeid = intval($_GET['aeid']);
        $status = 1;

        $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();

        $msg = "Booking Successfully Confirmed";
    }


?>
    <?php
    include "includes/header.php"
    ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4" style="background-color: #1c2a57;">
                    <div class="card-header pb-0" style="background-color: #1c2a57;">
                        <h6 class="text-light font-weight-bold">Bookings Details</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-light text-xxs font-weight-bolder">User Detail</th>
                                        <th class="text-uppercase text-light text-xxs font-weight-bolder ps-2">Vehicle</th>
                                        <th class="text-center text-uppercase text-light text-xxs font-weight-bolder">From Date</th>
                                        <th class="text-center text-uppercase text-light text-xxs font-weight-bolder">To Date</th>
                                        <th class="text-center text-uppercase text-light text-xxs font-weight-bolder">Message</th>
                                        <th class="text-center text-uppercase text-light text-xxs font-weight-bolder">Status</th>
                                        <th class="text-center text-uppercase text-light text-xxs font-weight-bolder">Posting Date</th>
                                        <th class="text-center text-uppercase text-light text-xxs font-weight-bolder">Action</th>

                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT tblusers.FullName,ProfilePicture,EmailId,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id  ";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-light"><?php echo htmlentities($result->FullName); ?></h6>
                                                            <p class="text-xs text-light mb-0"><?php echo htmlentities($result->EmailId); ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-light"><?php echo htmlentities($result->VehiclesTitle); ?></p>
                                                    <p class="text-xs text-light mb-0"><?php echo htmlentities($result->BrandName); ?></p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-warning"><?php echo htmlentities($result->FromDate); ?></span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-warning"><?php echo htmlentities($result->ToDate); ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-light text-xs font-weight-bold"><?php echo htmlentities($result->message); ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    if ($result->Status == 0) {
                                                        echo ('<span class="text-light text-xs font-weight-bold">Not Confirmed Yet</span>');
                                                    } else if ($result->Status == 1) {
                                                        echo ('<span class="text-light text-xs font-weight-bold">Confirmed</span>');
                                                    } else {
                                                        echo ('<span class="text-light text-xs font-weight-bold">Canceled</span>');
                                                    }
                                                    ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-light text-xs font-weight-bold"><?php echo htmlentities($result->PostingDate); ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a style="color: #FE5115;" href="javascript:void(0);" onclick="confirmBooking(<?php echo htmlentities($result->id); ?>)"> Confirm</a> /
                                                    <a style="color: #FE5115;" href="javascript:void(0);" onclick="cancelBooking(<?php echo htmlentities($result->id); ?>)"> Cancel</a>

                                                </td>
                                            </tr>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "includes/footer.php"
        ?>
        <script>
            function confirmBooking(bookingId) {
                Swal.fire({
                    title: 'Confirm Booking',
                    text: 'Do you really want to confirm this booking?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FE5115',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `manage-bookings.php?aeid=${bookingId}`;
                    }
                });
            }

            function cancelBooking(bookingId) {
                Swal.fire({
                    title: 'Cancel Booking',
                    text: 'Do you really want to cancel this booking?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FE5115',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `manage-bookings.php?eid=${bookingId}`;
                    }
                });
            }
        </script>

    </div>
    </main>
<?php } ?>