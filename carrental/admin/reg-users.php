<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from tblbrands  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Page data updated  successfully";
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
            <?php } ?> <div class="col-12">
                <div class="card mb-4" style="background-color: #1c2a57;">
                    <div class="card-header pb-0" style="background-color: #1c2a57;">
                        <h6 class="text-light text-bold">Listed ContactUs Query</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder">#</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Name</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Email</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder  ps-2">Contact No</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder  ps-2">DOB</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Address</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">City</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Country</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Reg Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT * from  tblusers ";
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
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->EmailId); ?></p>

                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->ContactNo); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->dob); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->Address); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->City); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->Country); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->RegDate); ?></p>
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
    </div>
    </main>
<?php } ?>