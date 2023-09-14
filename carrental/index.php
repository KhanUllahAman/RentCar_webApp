<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->
<style>
  .feature {
    background: #f7f7f7;
    position: relative;
    z-index: 1;
    padding-bottom: 55px;
  }

  .feature:after {
    position: absolute;
    left: 57%;
    top: 22%;
    width: 605px;
    height: 105%;
    background-image: url(./img/feature/red.png);
    content: "";
    background-repeat: no-repeat;
    -webkit-transform: translate(-300px, -202px);
    -ms-transform: translate(-300px, -202px);
    transform: translate(-300px, -202px);
    z-index: -1;
  }
  .callto {
    padding-top: 130px;
    height: 70%;
  }

  .callto.sp__callto {
    padding-top: 0;
    background: #100028;
  }

  .callto__text h2 {
    color: #E9EAEC;
    font-size: 42px;
    font-weight: 900;
    line-height: 55px;
    margin-bottom: 22px;
    font-family: 'Courgette', cursive;
  }

  .callto__text p {
    font-size: 25px;
    color: #E9EAEC;
    margin-bottom: 55px;
    font-family: 'Courgette', cursive;
  }

  .callto__text a {
    color: #FFFFFF;
    background: #000000;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 2px;
    display: inline-block;
    padding: 14px 32px 12px;
    text-decoration: none;
  }

  .callto__text a:hover {
    background: transparent;
    border: 4px solid #fe5115;
    color: #fe5115;
  }
</style>
<!-- Hero Section Begin -->
<section class="hero spad set-bg" data-setbg="img/forb3_2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="hero__text">
          <div class="hero__text__title">
            <span>Travel Securely With Us!</span>
            <h2>
              Book your <span class="span">Dream</span> car from anywhare
              today!
            </h2>
          </div>
          <div class="hero__text__price">
            <p>
              Everything your car business needs already here!<br />Superious
              made for car service companies!
            </p>
          </div>
          <a href="#" class="primary-btn more-btn" style="text-decoration: none;">Ok! I want to know more</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="hero__tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Sports Car Rental</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Casual Car Rental</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="hero__tab__form">
                <h2>Find Your Dream Car</h2>
                <form>
                  <div class="select-list">
                    <div class="select-list-item">
                      <p>Select Year</p>
                      <select>
                        <option data-display=" ">Select Year</option>
                        <option value="">2020</option>
                        <option value="">2019</option>
                        <option value="">2018</option>
                        <option value="">2017</option>
                        <option value="">2016</option>
                        <option value="">2015</option>
                      </select>
                    </div>
                    <div class="select-list-item">
                      <p>Select Brand</p>
                      <select>
                        <option data-display=" ">Select Brand</option>
                        <option value="">Acura</option>
                        <option value="">Audi</option>
                        <option value="">Bentley</option>
                        <option value="">BMW</option>
                        <option value="">Bugatti</option>
                      </select>
                    </div>
                    <div class="select-list-item">
                      <p>Select Model</p>
                      <select>
                        <option data-display=" ">Select Model</option>
                        <option value="">Q3</option>
                        <option value="">A4</option>
                        <option value="">AVENTADOR</option>
                      </select>
                    </div>
                    <div class="select-list-item">
                      <p>Select Mileage</p>
                      <select>
                        <option data-display=" ">Select Mileage</option>
                        <option value="">27</option>
                        <option value="">25</option>
                        <option value="">15</option>
                        <option value="">10</option>
                      </select>
                    </div>
                  </div>
                  <div class="car-price">
                    <p>Price Range:</p>
                    <div class="price-range-wrap">
                      <div class="price-range"></div>
                      <div class="range-slider">
                        <div class="price-input">
                          <input type="text" id="amount" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="site-btn">Searching</button>
                </form>
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="hero__tab__form">
                <h2>Find Your Dream Car</h2>
                <form>
                  <div class="select-list">
                    <div class="select-list-item">
                      <p>Select Year</p>
                      <select>
                        <option data-display=" ">Select Year</option>
                        <option value="">2020</option>
                        <option value="">2019</option>
                        <option value="">2018</option>
                        <option value="">2017</option>
                        <option value="">2016</option>
                        <option value="">2015</option>
                      </select>
                    </div>
                    <div class="select-list-item">
                      <p>Select Brand</p>
                      <select>
                        <option data-display=" ">Select Brand</option>
                        <option value="">Acura</option>
                        <option value="">Audi</option>
                        <option value="">Bentley</option>
                        <option value="">BMW</option>
                        <option value="">Bugatti</option>
                      </select>
                    </div>
                    <div class="select-list-item">
                      <p>Select Model</p>
                      <select>
                        <option data-display=" ">Select Model</option>
                        <option value="">Q3</option>
                        <option value="">A4</option>
                        <option value="">AVENTADOR</option>
                      </select>
                    </div>
                    <div class="select-list-item">
                      <p>Select Mileage</p>
                      <select>
                        <option data-display=" ">Select Mileage</option>
                        <option value="">27</option>
                        <option value="">25</option>
                        <option value="">15</option>
                        <option value="">10</option>
                      </select>
                    </div>
                  </div>

                  <button type="submit" class="site-btn">Searching</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Section Begin -->
<section class="about spad">
  <div class="container" data-aos="zoom-in-up">
    <div class="row">
      <div class="col-lg-6">
        <div class="about__pic">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="about__pic__item about__pic__item--large set-bg" data-setbg="img/lambo1.jpg"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="row">
                <div class="col-lg-12">
                  <div class="about__pic__item set-bg" data-setbg="img/bmw.jpg"></div>
                </div>
                <div class="col-lg-12">
                  <div class="about__pic__item set-bg" data-setbg="img/bmw1.jpg"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about__text">
          <div class="section-title">
            <span style="color: #E9EAEC;">About Superious</span>
            <h2>WHo we are?</h2>
          </div>
          <div class="about__text__desc">
            <p>
              Welcome to our Rent-A-Car service! With a strong foundation
              built on exceptional customer satisfaction, we pride ourselves
              on being a trusted name in the industry. Our commitment to
              providing reliable vehicles and unmatched service sets us
              apart. Whether you're a local resident or a traveler exploring
              our beautiful region, we offer a diverse fleet of
              well-maintained cars to suit your needs. Our team of
              experienced professionals is dedicated to ensuring a seamless
              rental experience, with transparent pricing and flexible
              options. We strive to exceed expectations by delivering
              convenience, comfort, and peace of mind to all our valued
              customers. Trust us for your next adventure on wheels!
            </p>
            <a href="aboutus.php" class="primary-btn5" style="text-decoration: none;">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Section End -->
<!-- Clients Begin -->
<div class="clients spad">
  <div class="container" data-aos="zoom-in-down">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title client-title">
          <span>Partner</span>
          <h2>Our Partner</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/pngwing.com.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/BMW.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/HONDA.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/audi.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/suzuki.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/lambo.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/Nissan.png" alt="" />
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="#" class="client__item">
          <img src="img/clients/tayota.png" alt="" />
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Clients End -->
<!-- Call To Action Section Begin -->
<section class="callto spad set-bg" data-setbg="img/forb1_2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="callto__text">
          <h2>Book your Dream car from anywhare today!.</h2>
          <p>Everything your car business needs already here!
            Superious made for car service companies!</p>
          <a href="cars.php">View More Cars</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Call To Action Section End -->
<!-- Services Section Begin -->
<section class="services spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <span>Our Services</span>
          <h2 class="text-light">What We Offers</h2>
          <p class="text-light">
            We successfully cope with tasks of varying complexity. <br />
            Provide long-term guarantees and regularly master new
            technologies.
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="services__item">
          <img src="img/services/s_1.png" alt="" />
          <h5 class="text-light">Rental A Cars</h5>
          <p class="text-light">
            Consectetur adipiscing elit incididunt ut labore et dolore magna
            aliqua. Risus commodo viverra maecenas.
          </p>
          <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="services__item">
          <img src="img/services/s_2.png" alt="" />
          <h5 class="text-light">Buying A Cars</h5>
          <p class="text-light">
            Consectetur adipiscing elit incididunt ut labore et dolore magna
            aliqua. Risus commodo viverra maecenas.
          </p>
          <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="services__item">
          <img src="img/services/s_3.png" alt="" />
          <h5 class="text-light">Car Maintenance</h5>
          <p class="text-light">
            Consectetur adipiscing elit incididunt ut labore et dolore magna
            aliqua. Risus commodo viverra maecenas.
          </p>
          <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="services__item">
          <img src="img/services/s_4.png" alt="" />
          <h5 class="text-light">Support 24/7</h5>
          <p class="text-light">
            Consectetur adipiscing elit incididunt ut labore et dolore magna
            aliqua. Risus commodo viverra maecenas.
          </p>
          <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Services Section End -->
<!-- Feature Section Begin -->
<section class="feature spad" style="background-color: #E9EAEC;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="feature__text">
          <div class="section-title">
            <span>Our Feature</span>
            <h2>We Are a Trusted Name In Auto</h2>
          </div>
          <div class="feature__text__desc">
            <p>
              The new model of the Civic offers an array of impressive
              features that enhance both comfort and performance. With its
              sleek and modern design, it commands attention on the road.
            </p>
            <p>
              Equipped with advanced safety technologies such as adaptive
              cruise control, lane-keeping assist, and collision mitigation
              braking, it prioritizes your well-being. The spacious and
              refined interior boasts premium materials and cutting-edge
              infotainment options, including a touchscreen display, Apple
              CarPlay, and Android Auto integration. Under the hood, the
              Civic offers powerful yet fuel-efficient engine options,
              delivering a dynamic driving experience. With its blend of
              style, innovation, and reliability, the new Civic is ready to
              redefine your driving journey.
            </p>
          </div>
          <div class="feature__text__btn">
            <a href="#" class="primary-btn1" style="text-decoration: none;">About US</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-4">
        <div class="row">
          <div class="col-lg-6 col-md-4 col-6">
            <div class="feature__item">
              <div class="feature__item__icon">
                <img src="img/feature/engine.png" alt="" />
              </div>
              <h6>Engine</h6>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="feature__item">
              <div class="feature__item__icon">
                <img src="img/feature/turbo.png" alt="" />
              </div>
              <h6>Turbo</h6>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="feature__item">
              <div class="feature__item__icon">
                <img src="img/feature/air-conditioner.png" alt="" />
              </div>
              <h6>Colling</h6>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="feature__item">
              <div class="feature__item__icon">
                <img src="img/feature/damper.png" alt="" />
              </div>
              <h6>Suspension</h6>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="feature__item">
              <div class="feature__item__icon">
                <img src="img/feature/electric-car.png" alt="" />
              </div>
              <h6>Electrical</h6>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-6">
            <div class="feature__item">
              <div class="feature__item__icon">
                <img src="img/feature/disc-brake.png" alt="" />
              </div>
              <h6>Brakes</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Feature Section End -->
<!-- Chooseus Section Begin -->
<section class="chooseus spad" style="background-color: #fe5115">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="chooseus__text">
          <div class="section-title">
            <h2 style="margin-left: 5vh;">Why People Choose Us</h2>
            <p style="margin-left: 5vh; color: #E9EAEC;">
              When it comes to rental cars, our services offer unmatched
              convenience and reliability.
            </p>
          </div>
          <ul>
            <li>
              <i class="fa fa-check-circle"></i> We offer a diverse range of
              rental cars to suit every need
            </li>
            <li>
              <i class="fa fa-check-circle"></i> We strive to offer
              cost-effective solutions without compromising on quality or
              service.
            </li>
            <li>
              <i class="fa fa-check-circle"></i> We understand the
              importance of convenience and flexibility for our customers.
            </li>
            <li>
              <i class="fa fa-check-circle"></i> We prioritize customer
              satisfaction and go the extra mile to provide exceptional
              service
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="chooseus__video set-bg">
    <img src="img/chooseus-video.png" alt="" />

    <!-- <a href="https://www.youtube.com/watch?v=h9dTYG1y21k"
                class="play-btn video-popup"><i class="fa fa-play"></i></a> -->
  </div>
</section>
<!-- Chooseus Section End -->
<!-- Latest Blog Section Begin -->
<section class="latest spad" style="background-color: #E9EAEC">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <span>Our Blog</span>
          <h2>Latest News Updates</h2>
          <p>
            Sign up for the latest Automobile Industry information and more.
            Duis aute<br />
            irure dolorin reprehenderits volupta velit dolore fugiat.
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="latest__blog__item">
          <div class="latest__blog__item__pic set-bg" data-setbg="img/latest-blog/lb-1.jpg">
            <ul>
              <li>By Polly Williams</li>
              <li>Dec 19, 2018</li>
              <li>Comment</li>
            </ul>
          </div>
          <div class="latest__blog__item__text">
            <h5>Benjamin Franklin S Method Of Habit Formation</h5>
            <p>
              Blogging has become a popular platform for car enthusiasts to share their passion and knowledge. Through
              car blogs, individuals can express their opinions, provide reviews, and offer valuable insights into the
              automotive industry. These blogs cover various topics such as car maintenance, performance upgrades, new
              model releases, and even tips for buying and selling vehicles. They play a crucial role in connecting car
              enthusiasts worldwide.
            </p>
            <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="latest__blog__item">
          <div class="latest__blog__item__pic set-bg" data-setbg="img/latest-blog/lb-2.jpg">
            <ul>
              <li>By Mattie Ramirez</li>
              <li>Dec 19, 2018</li>
              <li>Comment</li>
            </ul>
          </div>
          <div class="latest__blog__item__text">
            <h5>How To Set Intentions That Energize You</h5>
            <p>
              Car blogs serve as a valuable resource for individuals seeking information and advice related to
              automobiles. They offer a wealth of knowledge on a wide range of topics, including car models, driving
              techniques, DIY repairs, and industry news. These blogs often feature in-depth reviews of the latest car
              models, comparing performance, safety features, and fuel efficiency. Additionally, car blogs may provide
              tips on car maintenance and troubleshooting common issues.</p>
            <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="latest__blog__item">
          <div class="latest__blog__item__pic set-bg" data-setbg="img/latest-blog/lb-3.jpg">
            <ul>
              <li>By Nicholas Brewer</li>
              <li>Dec 19, 2018</li>
              <li>Comment</li>
            </ul>
          </div>
          <div class="latest__blog__item__text">
            <h5>Burning Desire Golden Key Or Red Herring</h5>
            <p>
              Car blogs play a vital role in the digital era, providing a platform for car enthusiasts to connect,
              learn, and share their experiences. They create an avenue for individuals to express their passion for
              automobiles, whether it's classic cars, sports cars, or electric vehicles. Car blogs often include
              captivating stories, behind-the-scenes glimpses of car events, and interviews with industry experts,
              further enriching the reader's understanding of the automotive world.
            </p>
            <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Latest Blog Section End -->
<!-- Cta Begin -->
<div class="cta" style="background-color: #f4f5f8">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="cta__item set-bg" data-setbg="img/cta/cta-1.jpg">
          <h4>Do You Want To Rent a Sports Cars</h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod
          </p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="cta__item set-bg" data-setbg="img/cta/w.jpg">
          <h4>Do You Want To Rent a Casual Cars</h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Cta End -->
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