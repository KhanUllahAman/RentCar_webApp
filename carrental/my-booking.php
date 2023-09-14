<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>
  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!--Page Header-->
  <style>
    .shadow {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    }

    .profile-tab-nav {
      min-width: 250px;
    }

    .tab-content {
      flex: 1;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .nav-pills a.nav-link {
      padding: 15px 20px;
      border-bottom: 1px solid #ddd;
      border-radius: 0;
      color: #333;
    }

    .nav-pills a.nav-link i {
      width: 20px;
    }

    .img-circle img {
      height: 100px;
      width: 100px;
      border-radius: 100%;
      border: 5px solid #fff;
    }
  </style>
  <!-- Breadcrumb End -->
  <div class="breadcrumb-option set-bg" data-setbg="img/for-4.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>My Bookings</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Begin -->
  <?php
  $useremail = $_SESSION['login'];
  $currentDate = date('2023-7-31');
  $sql = "SELECT * from tblusers where EmailId=:useremail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
      <section class="py-5 my-5" style="background-color: #FFFFFF;">
        <div class="container">
          <h1 class="mb-5 text-center" style="font-family: 'Courgette', cursive;">Account Settings</h1>
          <div class="shadow rounded-lg d-block d-sm-flex" style="background-color: #E9EAEC;">
            <div class="profile-tab-nav border-right">
              <div class="p-4">
                <div class="img-circle text-center mb-3">
                  <?php
                  // Check if $result->ProfilePicture is not empty or not set
                  if (!isset($result->ProfilePicture) || empty($result->ProfilePicture)) {
                    $profilePicture = 'img/profile_images/default_profile.webp';
                  } else {
                    $profilePicture = htmlentities($result->ProfilePicture);
                  }
                  ?>
                  <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="shadow">
                </div>
                <h4 class="text-center"><?php echo htmlentities($result->FullName); ?></h4>
                <p class="text-center"><?php echo htmlentities($result->Address); ?> |
                  <?php echo htmlentities($result->City); ?> | <?php echo htmlentities($result->Country); ?></p>
                <?php include('includes/sidebar.php'); ?>
              </div>

            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                <h3 class="mb-4" style="	font-family: 'Courgette', cursive; color: #FE5115; font-weight: 600;">My Bookings</h3>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                  <?php
                  $useremail = $_SESSION['login'];
                  $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {  ?>
                      <div class="col">
                        <div class="card">
                          
                          <!-- <img src="" class="card-img-top" alt="..."> -->
                          <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"><img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image" class="card-img-top" style="height: 40vh;"></a>
                          <div class="card-body" style="background-color: #FFFFFF;">
                            <h5 class="card-title" style="font-weight: bold; color: #FE5115;"> <?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></h5>
                            <span class="card-text">
                              <b>From Date :</b> <?php echo htmlentities($result->FromDate); ?>
                              <br>
                              <b>To Date :</b> <?php echo htmlentities($result->ToDate); ?>
                              <br>
                              <b>Message :</b> <?php echo htmlentities($result->message); ?>
                            </span>
                            <div class="float-end">
                              <?php if ($result->Status == 1) { ?>
                                <div class=" vehicle_status"> <a href="#" class="btn btn-outline-success">Confirmed</a>
                                </div>

                              <?php } else if ($result->Status == 2) { ?>
                                <div class="vehicle_status"> <a href="#" class="btn btn-outline-danger">Cancelled</a>
                                </div>



                              <?php } else { ?>
                                <div class="vehicle_status"> <a href="#" class="btn btn-outline-dark">Not Confirm yet</a>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
            <?php }
        } ?>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Footer-->
      <?php include('includes/footer.php'); ?>
      <!--Footer-->
    <?php } ?>