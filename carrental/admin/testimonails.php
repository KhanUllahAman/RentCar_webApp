<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['eid'])) {
        $eid = intval($_GET['eid']);
        $status = "0";
        $sql = "UPDATE tbltestimonial SET status=:status WHERE id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_INT);
        $query->execute();
    
        $msg = "Testimonial Successfully Inactive";
    }
    
    if (isset($_GET['aeid'])) {
        $aeid = intval($_GET['aeid']);
        $status = "1";
        $sql = "UPDATE tbltestimonial SET status=:status WHERE id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_INT);
        $query->execute();
    
        $msg = "Testimonial Successfully Active";
    }
    


?>
    <?php
    include "includes/header.php"
    ?>
    <div class="container-fluid py-4">
        <div class="row">
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
            <div class="col-12">
                <div class="card mb-4" style="background-color: #1c2a57;">
                    <div class="card-header pb-0" style="background-color: #1c2a57;">
                        <h6 class="text-light text-bold">Listed Testimonials</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder">#</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Name</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Email</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder  ps-2">Testimonials</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Posting Date</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT tblusers.FullName,tbltestimonial.UserEmail,tbltestimonial.Testimonial,tbltestimonial.PostingDate,tbltestimonial.status,tbltestimonial.id from tbltestimonial join tblusers on tblusers.Emailid=tbltestimonial.UserEmail";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {                ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm text-light font-weight-bold"><?php echo htmlentities($cnt); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-3 text-light"><?php echo htmlentities($result->FullName); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->UserEmail); ?></p>

                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->Testimonial); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->PostingDate); ?></p>
                                                </td>
                                                <td>
                                                    <?php if ($result->status == "" || $result->status == 0) {
                                                    ?>
                                                        <a style="color: #FE5115;" href="javascript:void(0);" onclick="Inactiveclick(<?php echo htmlentities($result->id); ?>)"> Inactive</a>

                                                    <?php } else { ?>
                                                        <a style="color: #FE5115;" href="javascript:void(0);" onclick="activeBooking(<?php echo htmlentities($result->id); ?>)"> Active</a>

                                                </td>
                                            <?php } ?>

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
            function Inactiveclick(InactiveId) {
                Swal.fire({
                    title: 'Confirm Active',
                    text: 'Do you really want to Active this Testimonail?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FE5115',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `testimonails.php?aeid=${InactiveId}`;
                    }
                });
            }

            function activeBooking(activeId) {
                Swal.fire({
                    title: 'Confirm Inactive',
                    text: 'Do you really want to Inactive this Testimonial?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FE5115',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `testimonails.php?eid=${activeId}`;
                    }
                });
            }
        </script>
    </div>
    </main>
<?php } ?>