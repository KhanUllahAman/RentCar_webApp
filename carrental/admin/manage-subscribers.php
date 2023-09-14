<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from  tblsubscribers  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Subscriber info deleted";
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
                        <h6 class="text-light text-bold">Listed Brands</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder">#</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Email ID</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Subscription Date</th>
                                        <th class="text-uppercase text-light text-xs font-weight-bolder ps-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT * from tblsubscribers";
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
                                                    <p class="text-sm font-weight-bold mb-0 px-3 text-light"><?php echo htmlentities($result->SubscriberEmail); ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0 px-2 text-light"><?php echo htmlentities($result->PostingDate); ?></p>

                                                </td>
                                                <td>

                                                    <a href="#" class="delete-subscriber" data-id="<?php echo $result->id; ?>">
                                                        <div class="icon icon-shape bg-gradient-danger shadow-warning text-center rounded-circle">
                                                            <i class="fa fa-close"></i>
                                                        </div>
                                                    </a>

                                                </td>
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
            document.addEventListener('DOMContentLoaded', function() {
                // Attach a click event listener to all delete-subscriber links
                const deleteButtons = document.querySelectorAll('.delete-subscriber');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();

                        // Get the data-id attribute to identify which subscriber to delete
                        const subscriberId = button.getAttribute('data-id');

                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'You won\'t be able to revert this!',
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#FE5115',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to the delete URL if the user confirms
                                window.location.href = `manage-subscribers.php?del=${subscriberId}`;
                            }
                        });
                    });
                });
            });
        </script>

    </div>
    </main>
<?php } ?>