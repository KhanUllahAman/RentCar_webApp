<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
?>
  <?php
  include "includes/header.php"
  ?>

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql = "SELECT id from tblusers ";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $regusers = $query->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Reg Users</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($regusers); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                    <a href="#"><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-solid fa-user"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql1 = "SELECT id from tblvehicles ";
                  $query1 = $dbh->prepare($sql1);;
                  $query1->execute();
                  $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                  $totalvehicle = $query1->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Listed Vehicles</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($totalvehicle); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                    <a href="#"><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-solid fa-car"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mt-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql2 = "SELECT id from tblbooking ";
                  $query2 = $dbh->prepare($sql2);
                  $query2->execute();
                  $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                  $bookings = $query2->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Bookings</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($bookings); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    <a href="#"><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-solid fa-book"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mt-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql3 = "SELECT id from tblbrands ";
                  $query3 = $dbh->prepare($sql3);
                  $query3->execute();
                  $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                  $brands = $query3->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Listed Brands</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($brands); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    <a href=""><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-brands fa-stack-exchange"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mt-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql4 = "SELECT id from tblsubscribers ";
                  $query4 = $dbh->prepare($sql4);
                  $query4->execute();
                  $results4 = $query4->fetchAll(PDO::FETCH_OBJ);
                  $subscribers = $query4->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Subscribers</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($subscribers); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    <a href="#"><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-brands fa-stripe-s"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mt-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql6 = "SELECT id from tblcontactusquery ";
                  $query6 = $dbh->prepare($sql6);;
                  $query6->execute();
                  $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                  $query = $query6->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Queries</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($query); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    <a href="#"><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-solid fa-clipboard-question"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mt-4">
        <div class="card" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <?php
                  $sql5 = "SELECT id from tbltestimonial ";
                  $query5 = $dbh->prepare($sql5);
                  $query5->execute();
                  $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
                  $testimonials = $query5->rowCount();
                  ?>
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Testimonails</p>
                  <h5 class="font-weight-bolder text-light">
                    <?php echo htmlentities($testimonials); ?>
                  </h5>
                  <p class="mb-0">
                    <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    <a href="#"><span class="text-light text-bold">Full Details</span></a>
                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="fa-regular fa-comment"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100" style="background-color: #1c2a57;">
          <div class="card-body p-3">
            <img src="./assets/img/front view 4.jpg" style="width: 100%; height: 100%;" alt="">
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card card-carousel overflow-hidden h-100 p-0">
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner border-radius-lg h-100">
              <div class="carousel-item h-100 active" style="background-image: url('assets/img/front\ view1.jpg');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                  </div>
                  <h5  class="text-white mb-1">Make your travel plans a reality with our rent a car service. The perfect ride for your journey is just a reservation away!</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('assets/img/front\ view\ 2.jpg');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                  </div>
                  <h5  class="text-white mb-1">Faster way to create web pages</h5>
                  <p>Choose from our versatile range of cars to make your travel hassle-free. Rent a car now and embark on a seamless adventure!</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('assets/img/font\ view\ 3.jpg');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-trophy text-dark opacity-10"></i>
                  </div>
                  <h5  class="text-white mb-1">Turn your travel dreams into reality through our rent a car service. Your ideal vehicle is just a booking away!</h5>
                  <p></p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
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