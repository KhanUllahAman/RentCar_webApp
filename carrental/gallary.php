<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
</head>
<style>
    .a:hover {
        color: white !important;
    }

    .a {
        text-decoration: none !important;
    }

    .title {
        text-align: center;
    }

    .title h1 {
        margin-top: 30px;
        color: rgb(233, 233, 233);
        letter-spacing: 0.3rem;
        text-transform: uppercase;
        font-size: 2.5em;
        font-weight: lighter;
        font-style: italic;
    }

    .title h1 span {
        font-weight: bold;
        font-style: normal;
    }

    .title p {
        color: rgb(160, 160, 160);
        letter-spacing: 2px;
        font-style: italic;
    }

    .container-grid {
        width: 100%;
        padding: 30px 20px;
        display: grid;
        grid-gap: 0.6rem;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-auto-rows: 240px;
    }

    .card {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        font-size: 3rem;
        box-shadow: rgba(3, 8, 20, 0.1) 0px 0.15rem 0.5rem,
            rgba(2, 8, 20, 0.1) 0px 0.075rem 0.175rem;
        border-radius: 4px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transition: all 0.5s;
        animation: cardAnimation 0.5s ease-out;
        animation-fill-mode: backwards;
        --delay: 0.1s;
    }

    .card .profile {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 10px 30px;
        opacity: 0;
        transition: opacity 0.2s ease-in;
    }

    .profile h6 {
        font-size: 25px;
        letter-spacing: 2px;
        text-transform: lowercase;
        color: #cacacab9;
        font-weight: normal;
    }

    .profile p {
        font-size: 12px;
        color: #ffffff59;
        text-transform: lowercase;
        font-weight: normal;
    }

    .card:hover>.profile {
        opacity: 1;
    }

    .card:nth-child(1) {
        animation-delay: calc(0.5 * var(--delay));
    }

    .card:nth-child(2) {
        animation-delay: calc(1 * var(--delay));
    }

    .card:nth-child(3) {
        animation-delay: calc(1.5 * var(--delay));
    }

    .card:nth-child(4) {
        animation-delay: calc(2 * var(--delay));
    }

    .card:nth-child(5) {
        animation-delay: calc(2.5 * var(--delay));
    }

    .card:nth-child(6) {
        animation-delay: calc(3 * var(--delay));
    }

    .card:nth-child(7) {
        animation-delay: calc(3.5 * var(--delay));
    }

    .card:nth-child(8) {
        animation-delay: calc(4 * var(--delay));
    }

    .card:nth-child(9) {
        animation-delay: calc(4.5 * var(--delay));
    }

    .card:nth-child(10) {
        animation-delay: calc(5 * var(--delay));
    }

    @keyframes cardAnimation {
        from {
            opacity: 0;
            transform: scale(0.3);
            filter: hue-rotate(180deg);
        }

        to {
            opacity: 1;
            transform: scale(1);
            filter: hue-rotate(0deg);
        }
    }

    @media (min-width: 800px) {
        .card-large {
            grid-row: span 2 / auto;
        }

        .card-long {
            grid-column: span 2 / auto;
        }

        .card-long-full {
            grid-column: span 3 / auto;
        }
    }

    .main-div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
        font-family: 'Courgette', cursive;
        background: #000000;
    }
</style>
<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->
<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="img/for7.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Our Gallary</h2>
                    <div class="breadcrumb__links">
                        <a href="index.php" class="a"><i class="fa fa-home a"></i> Home</a>
                        <span class="text-light">Gallary</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->
<div class="main-div">

    <div class="title">
        <h1>Our <span>Gallary</span></h1>
        <p>light and shine in the dark</p>
    </div>
    <div class="container-grid">
        <div class="card card-large" style="background-image: url(./img/gallary/img1.jpg);">
            <div class="profile">
                <h6>Joseph</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card" style="background-image: url(./img/gallary/img3.png);">
            <div class="profile">
                <h6>Sarah</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card" style="background-image: url(./img/gallary/img4.png);">
            <div class="profile">
                <h6>Sofia</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card" style="background-image: url(./img/gallary/img5.jpg);">
            <div class="profile">
                <h6>Katarina</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card card-large" style="background-image: url(./img/gallary/img2.jpg);">
            <div class="profile">
                <h6>Joe</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card card" style="background-image: url(./img/gallary/img7.jpg);">
            <div class="profile">
                <h6>Lake</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card" style="background-image: url(./img/gallary/img6.jpg);">
            <div class="profile">
                <h6>Manno</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card" style="background-image: url(./img/gallary/img8.png);">
            <div class="profile">
                <h6>Steph</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card card-long" style="background-image: url(./img/gallary/img9.png);">
            <div class="profile">
                <h6>Jorel</h6>
                <p>Photographer</p>
            </div>
        </div>
        <div class="card card-long-full" style="background-image: url(./img/gallary/img10.png);">
            <div class="profile">
                <h6>Karla</h6>
                <p>Photographer</p>
            </div>
        </div>
    </div>
</div>
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