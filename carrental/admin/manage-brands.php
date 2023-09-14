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
        $_SESSION['success_msg'] = "Page data updated successfully";
        header('Location: manage-brands.php');
        exit();
    }
    if (isset($_SESSION['success_msg'])) {
        $msg = $_SESSION['success_msg'];
        unset($_SESSION['success_msg']);
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
                <div class="alert alert-dismissible fade show alertt success-message" role="alert"  style="background-color: #d1e7dd;">
                    <strong style="color: #0f5132;">SUCCESS <?php echo htmlentities($msg); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
                </div>
            <?php } ?>
            <div class="col-12">
                <div class="card mb-4" style="background-color: #1c2a57;">
                    <div class="card-header pb-0" style="background-color: #1c2a57;">
                        <h6 class="text-light text-bold">Listed Brands</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder">#</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Brand Name</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Creation Date</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder  ps-2">Updation Date</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT * from  tblbrands ";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {    ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm text-light font-weight-bold"><?php echo htmlentities($cnt); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-3 text-light"><?php echo htmlentities($result->BrandName); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->CreationDate); ?></p>

                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->UpdationDate); ?></p>
                                                </td>
                                                <td>
                                                    <a href="edit-brand.php?id=<?php echo $result->id; ?>">
                                                        <div class="icon icon-shape bg-gradient-success shadow-warning text-center rounded-circle">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="deleteBrand(<?php echo $result->id; ?>)">
                                                        <div class="icon icon-shape bg-gradient-danger shadow-warning text-center rounded-circle">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </div>
                                                    </a>
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
    <script>
        function deleteBrand(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this brand!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#FE5115',
                cancelButtonText: 'No, cancel',
                cancelButtonColor: 'gray',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, navigate to the delete URL
                    window.location.href = 'manage-brands.php?del=' + id;
                }
            });
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