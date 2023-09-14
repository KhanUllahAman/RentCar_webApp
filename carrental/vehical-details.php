<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $message = $_POST['message'];
  $useremail = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];
  $sql = "INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js' integrity='sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";
    echo "<script>
    toastr['success']('Booking Successfully', 'Success');
  </script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}

?>



<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->

<style>
  a:hover {
    color: white;
  }

  a {
    text-decoration: none;
  }
</style>

<!--Listing-Image-Slider-->
<!-- Breadcrumb End -->
<?php
$vhid = intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
$query = $dbh->prepare($sql);
$query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) {
    $_SESSION['brndid'] = $result->bid;
?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="img/b_4_2.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2><?php echo htmlentities($result->VehiclesTitle); ?></h2>
              <div class="breadcrumb__links">
                <a href="index.php"><i class="fa fa-home a"></i> Home</a>
                <a href="cars.php">Cars</a>
                <span class="text-light text-bold"><?php echo htmlentities($result->VehiclesTitle); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Car Details Section Begin -->

    <section class="car-details spad" style="background-color: #FFFFFF;">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="car__details__pic">
              <div class="car__details__pic__large">
                <img class="car-big-img" src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="" />
              </div>
              <div class="car-thumbs">
                <div class="car-thumbs-track car__thumb__slider owl-carousel">
                  <div class="ct" data-imgbigurl="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>">
                    <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="" />
                  </div>
                  <div class="ct" data-imgbigurl="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>">
                    <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" alt="" />
                  </div>
                  <div class="ct" data-imgbigurl="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>">
                    <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" alt="" />
                  </div>
                  <div class="ct" data-imgbigurl="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>">
                    <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" alt="" />
                  </div>
                  <?php if ($result->Vimage5 == "") {
                  } else {
                  ?>
                    <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" alt="" />
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="car__details__tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Vehicle Overview</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Technical</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Features & Options</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Accessories</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <div class="car__details__tab__info">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="car__details__tab__info__item">
                          <h5>Vehical Overview</h5>
                          <ul>
                            <li>
                              <i class="fa fa-check"></i><?php echo htmlentities($result->VehiclesOverview); ?>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="car__details__tab__info__item">
                          <h5>Vehical Overview</h5>
                          <ul>
                            <li>
                              <i class="fa fa-check"></i> Comfort and Luxury: The vehicle offers a comfortable and luxurious driving experience with features like multi-zone automatic climate control, power-adjustable seats with memory function, and ambient lighting.
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                  <div class="car__details__tab__info">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="car__details__tab__info__item">
                          <h5>Technical Overview</h5>
                          <ul>
                            <li>
                              <i class="fa fa-check"></i> Engine: The CLS 63 AMG is equipped with a 5.5-liter V8 engine, producing 518 horsepower and 516 lb-ft of torque.
                            </li>
                            <li>
                              <i class="fa fa-check"></i> Transmission: It features a seven-speed automatic transmission, providing smooth and efficient gear shifts.
                            </li>
                            <li>
                              <i class="fa fa-check"></i> Performance: The vehicle can accelerate from 0 to 60 mph (0 to 97 km/h) in approximately 4.4 seconds, offering impressive acceleration and speed.
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="car__details__tab__info__item">
                          <h5>Technical Overview</h5>
                          <ul>
                            <li>
                              <i class="fa fa-check"></i> Suspension: The CLS 63 AMG has a sport-tuned suspension system, enhancing handling and delivering a dynamic driving experience.
                            </li>
                            <li>
                              <i class="fa fa-check"></i> Braking System: It is equipped with larger brakes to provide strong stopping power and ensure reliable and controlled braking performance.
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="tab-pane" id="tabs-3" role="tabpanel">
                  <div class="car__details__tab__info">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="car__details__tab__info__item">
                          <h5>Features Overview</h5>
                          <ul>
                            <li>
                              <i class="fa fa-check"></i> AMG Performance Package: The CLS 63 AMG offers an optional performance package that includes enhancements such as increased engine output, an AMG limited-slip differential, and a higher top speed.
                            </li>
                            <li>
                              <i class="fa fa-check"></i> Premium Audio System: It features a premium audio system, providing high-quality sound reproduction for an immersive in-car entertainment experience.
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="car__details__tab__info__item">
                          <h5>Features Overview</h5>
                          <ul>
                            <li>
                              <i class="fa fa-check"></i> Multi-Contour Seats: The vehicle offers optional multi-contour seats with adjustable bolsters and massage functions, allowing for personalized comfort and support.
                            </li>
                            <li>
                              <i class="fa fa-check"></i> Bi-Xenon Headlights: The CLS 63 AMG is equipped with bi-xenon headlights that offer improved visibility and a striking appearance, along with adaptive lighting functions.
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tabs-4" role="tabpanel">
                  <div class="car__details__tab__feature">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="car__details__tab__feature__item">
                          <h5>Interior Design</h5>
                          <ul>
                            <li>
                              <?php if ($result->AirConditioner == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Air Conditioner
                            </li>
                            <li>
                              <?php if ($result->AntiLockBrakingSystem == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              AntiLock Braking System
                            </li>
                            <li>
                              <?php if ($result->PowerSteering == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Power Steering
                            </li>
                            <li>
                              <?php if ($result->PowerWindows == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Power Windows
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="car__details__tab__feature__item">
                          <h5>Safety Design</h5>
                          <ul>
                            <li>
                              <?php if ($result->BrakeAssist == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Brake Assist
                            </li>
                            <li>
                              <?php if ($result->DriverAirbag == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Driver Airbag
                            </li>
                            <li>
                              <?php if ($result->PassengerAirbag == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Passenger Airbag
                            </li>
                            <li>
                              <?php if ($result->CrashSensor == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Crash Sensor
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="car__details__tab__feature__item">
                          <h5>Extra Design</h5>
                          <ul>
                            <li>
                              <?php if ($result->CDPlayer == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              CD Player
                            </li>
                            <li>
                              <?php if ($result->LeatherSeats == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Leather Seats
                            </li>
                            <li>
                              <?php if ($result->CentralLocking == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Central Locking
                            </li>
                            <li>
                              <?php if ($result->PowerDoorLocks == 1) {
                              ?>
                                <i class="fa fa-check" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } else { ?>
                                <i class="fa fa-close" aria-hidden="true" style="color: #FE5115;"></i>
                              <?php } ?>
                              Power Door Locks
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="car__details__sidebar" style="background-color: #E9EAEC;">
              <div class="car__details__sidebar__model">
                <ul>
                  <li>Car Price <span>$<?php echo htmlentities($result->PricePerDay); ?> Per Day</span></li>
                </ul>
              </div>
              <div class="car__details__sidebar__payment">
                <ul>
                  <li>Modal Year<span><?php echo htmlentities($result->ModelYear); ?></span></li>
                  <li>Fuel Type<span><?php echo htmlentities($result->FuelType); ?></span></li>
                  <li>Seats<span><?php echo htmlentities($result->SeatingCapacity); ?></span></li>
                </ul>
                <a href="#bookingform" class="primary-btn" data-toggle="modal" data-dismiss="modal"><i class="fa fa-credit-card"></i> Express Purchase</a>
                <div class="modal fade" id="bookingform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #f4f5f8;">
                      <div class="modal-header">
                        <h5 class="modal-title mo_t" id="exampleModalLabel">Book Now</h5>
                      </div>
                      <div class="modal-body">
                        <form method="post">
                          <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" placeholder="From Date(dd/mm/yyyy)" name="fromdate" required>
                            <label for="floatingInput">From Date</label>
                          </div>
                          <div class="form-floating">
                            <input type="date" class="form-control" id="floatingPassword" placeholder="To Date(dd/mm/yyyy)" name="todate" required>
                            <label for="floatingPassword">To Date</label>
                          </div>
                          <div class="form-floating">
                            <textarea type="date" class="form-control" id="floatingPassword" placeholder="Enter Your Message" name="message" required></textarea>
                            <label for="floatingPassword">Message</label>
                          </div>
                          <!-- <div class="d-grid gap-2 mt-3">
                            <button class="btn" type="submit" name="login">Login</button>
                          </div> -->
                          <?php if ($_SESSION['login']) { ?>
                            <div class="d-grid gap-2 mt-3">
                              <button class="btn" type="submit" name="submit">Book Now</button>
                            </div>
                          <?php } else { ?>
                            <div class="d-grid gap-2 mt-3">
                              <a href="#loginform" data-toggle="modal" data-dismiss="modal" class="btn"><button class="btn">Login For Book</button></a>
                            </div>
                          <?php } ?>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="primary-btn sidebar-btn show-modal">
                  <i class="fa fa-whatsapp"></i>
                  WhatsApp
                  <span class="overlay"></span>
                </a>
                <div class="modal-box">
                  <button class="close-btn" id="w-3"><i class="fa-sharp fa-solid fa-xmark"></i></button>
                  <i class="fa-regular fa fa-whatsapp" id="w-2"></i>
                  <h2>WhatsApp Now</h2>
                  <h3>For more quries WhatsApp Now</h3>
                  <div class="buttons">
                    <button id="w-1">Open WhatsApp</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php }
} ?>
<!-- Car Details Section End -->
<!-- Car Section Begin -->
<section class="car spad" style="background-color: #000000">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <span>Our Best</span>
          <h2 class="text-light">More Cars</h2>
        </div>
        <!-- <ul class="filter__controls">
                <li class="active" data-filter="">Sports Cars</li>
              </ul> -->
      </div>
    </div>
    <div class="row">
      <?php
      $bid = $_SESSION['brndid'];
      $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1,tblvehicles.Vimage2,tblvehicles.Vimage3 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
      $query = $dbh->prepare($sql);
      $query->bindParam(':bid', $bid, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      if ($query->rowCount() > 0) {
        foreach ($results as $result) { ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mix">
            <div class="car__item">
              <div class="car__item__pic__slider owl-carousel">
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="image" />
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" alt="image" />
                <img src="./admin/assets/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" alt="image" />
              </div>
              <div class="car__item__text">
                <div class="car__item__text__inner">
                  <div class="label-date text-light"><?php echo htmlentities($result->ModelYear); ?></div>
                  <h5 style="font-weight: bolder;" class="text-light">Brand : <?php echo htmlentities($result->BrandName); ?></h5>
                  <h5 style="color: #fE5115; font-family: 'Courgette', cursive;"><?php echo htmlentities($result->VehiclesTitle); ?></h5>
                  <ul>
                    <li class="text-light"><i class="fa fa-car" aria-hidden="true"></i> <?php echo htmlentities($result->FuelType); ?></li>
                    <li class="text-light"><i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlentities($result->SeatingCapacity); ?></li>
                  </ul>
                </div>
                <div class="car__item__price">
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><span class="car-optionn">For Rent</span></a>
                  <h6 class="text-light"><?php echo htmlentities($result->PricePerDay); ?> <span class="text-light"> /Month</span></h6>
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