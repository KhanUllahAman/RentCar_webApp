<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Superious Rent a Car
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<style>
  /* Change the color and width of the scroll bar */
  ::-webkit-scrollbar {
    width: 8px;
    /* Adjust the width as desired */
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background-color: #E9EAEC;
    /* Change the color as desired */
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background-color: #fe5115;
    /* Change the color as desired */
  }
</style>

<body class="g-sidenav-show   bg-gray-100" style="background-color: #051139 !important;">
  <div class="min-height-300 bg-primary position-absolute w-100" style="background-color: #051139 !important;"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" style="background-color: #1c2a57 !important;">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="./assets/img/Rideklogo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-light">Admin Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'dashboard.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'createbrand.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="createbrand.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-plus text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Create Brand</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'manage-brands.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="manage-brands.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list-check text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Manage Brands</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'post-avehical.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="post-avehical.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-car text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Vehicles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'manage-vehicles.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="manage-vehicles.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-bars-progress text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Manage Vehicles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'manage-bookings.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="manage-bookings.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-bookmark text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Manage Bookings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'testimonails.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="testimonails.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-comment text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Manage Testimonial</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'manage-contactusquery.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="manage-contactusquery.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-address-card text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Manage contact-Us Querry</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'reg-users.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="reg-users.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Reg Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'update-contactinfo.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="update-contactinfo.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-pen-nib text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Update Contact Info</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="<?php if ($current_page == 'manage-subscribers.php') echo 'background-color: #FE5115; color: #FFF;'; ?>" href="manage-subscribers.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-star text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-light text-bold">Manage Subscribers</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard" style="background-color: #FFF;">
        <img class="w-50 mx-auto" src="./assets/img/car.gif" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
        </div>
      </div>
      <br>
      <a href="change-password.php" class="btn btn-dark btn-sm w-100 mb-3">Change Password</a>
      <a class="btn btn-sm mb-0 w-100" href="logout.php" type="button" style="background-color: #FE5115; color: #FFF;">Logout</a>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg" style="background-color: #051139 !important;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>

      </div>
    </nav>