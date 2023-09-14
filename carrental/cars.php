<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!--Header-->
<?php include('includes/header.php'); ?>
<style>
  a:hover {
    color: white;
  }

  a {
    text-decoration: none;
  }
</style>
<!-- /Header -->
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="img/bb.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Cars Listing</h2>
              <div class="breadcrumb__links">
                <a href="index.php"><i class="fa fa-home a"></i> Home</a>
                <a href="cars.php">Cars</a>
                <span class="text-light text-bold">Cars Listing</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Car Section Begin -->
<section class="car spad" style="background-color: #FFFFFF;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <span>Our Car</span>
          <h2 style="color: #000000;">Best Vehicle Offers</h2>
        </div>
        <ul class="filter__controls">
          <li class="active" data-filter="">Cars</li>
        </ul>
      </div>
    </div>
    <div class="row car-filter">
      <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1,tblvehicles.Vimage2,tblvehicles.Vimage3,tblvehicles.Vimage4,tblvehicles.Vimage5 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      if ($query->rowCount() > 0) {
        foreach ($results as $result) {
      ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mix">

            <div class="car__item">
              <div class="car__item__pic__slider owl-carousel">
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="" />
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" alt="" />
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" alt="" />
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" alt="" />
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" alt="" />

              </div>
              <div class="car__item__text">
                <div class="car__item__text__inner">
                  <div class="label-date"><?php echo htmlentities($result->ModelYear); ?></div>
                  <h5 style="font-weight: bolder;">Brand : <?php echo htmlentities($result->BrandName); ?></h5>
                  <h5 style="color: #FE5115; font-family: 'Courgette', cursive;"><?php echo htmlentities($result->VehiclesTitle); ?></h5>
                  <ul>
                    <li><i class="fa fa-car" aria-hidden="true"></i> <?php echo htmlentities($result->FuelType); ?></li>
                    <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlentities($result->SeatingCapacity); ?></li>
                  </ul>
                </div>
                <div class="car__item__price">
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><span class="car-option">For Rent</span></a>
                  <h6 style="color: #000000;">$<?php echo htmlentities($result->PricePerDay); ?> <span style="color: #000000;">/Month</span></h6>
                </div>

              </div>
            </div>
          </div>

      <?php }
      } ?>
    </div>
  </div>
</section>
<!-- Car Section End -->
<!--Footer -->
<?php include('includes/footer.php'); ?>
<!-- /Footer-->
<!--Login-Form -->
<?php include('includes/login.php'); ?>
<!--/Login-Form -->
<!--Register-Form -->
<?php include('includes/registration.php'); ?>
<!--/Register-Form -->
<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php'); ?>
<!--/Forgot-password-Form -->