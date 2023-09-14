<style>
  .wrapper {
    display: flex;
    justify-content: center;
    /* margin-top: 150px; */
  }

  .dropdown {
    margin-right: 50px;
  }

  .dropdown:last-child {
    margin-right: 0;
  }

  .dropdown button {
    border: 0;
    background: #FE5115;
    color: #000000;
    padding: 16px 28px;
    width: 225px;
    height: 50px;
    border-radius: 3px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 17px;
    font-weight: bold;
    /* text-transform: uppercase; */
    letter-spacing: 3px;
    transition: 0.5s ease;
    font-family: 'Courgette', cursive;

  }

  .dropdown button:hover,
  .dropdown button.active {
    background: transparent;
    border: 3px solid #FE5115;
  }

  .dropdown button .icon {
    display: flex;
    font-size: 18px;
    margin-right: 10px;
  }

  .dropdown ul {
    display: none;
    width: 225px;
    margin-top: 35px;
    background: #FFFFFF;
    border-radius: 3px;
    position: relative;
  }

  .dropdown ul li a {
    display: flex;
    padding: 16px 20px;
    height: 50px;
    color: #000000;
    font-size: 13px;
    font-weight: bold;
    align-items: center;
    /* text-transform: uppercase; */
    letter-spacing: 2px;
    text-decoration: none;
  }

  .dropdown ul li a .icon {
    display: flex;
    margin-right: 10px;
    font-size: 18px;
  }

  .dropdown ul li a:hover {
    background: #FE5115;
  }

  .dropdown ul li:first-child a {
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }

  .dropdown ul li:last-child a {
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
  }

  .dropdown ul:before {
    content: "";
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
    border: 15px solid;
    border-color: transparent transparent #FFFFFF transparent;
    z-index: 1;
  }

  .dropdown.dropdown_desktop .icon {
    display: none;
  }

  .dropdown.dropdown_desktop ul li a {
    justify-content: center;
  }

  .dropdown.dropdown_mobile button,
  .dropdown.dropdown_mobile ul {
    width: 75px;
  }

  .dropdown.dropdown_mobile ul li a {
    padding: 16px 28px
  }

  .dropdown.dropdown_mobile .icon {
    margin: 0;
    display: inline-block;
  }

  .dropdown.dropdown_mobile .text {
    display: none;
  }

  .dropdown button.active+ul {
    display: block;
  }
</style>
<div class="wrapper">
  <div class="dropdown dropdown_desktop_icon">
    <button><span class="icon"><ion-icon class="i" name="settings-sharp"></ion-icon></span>
      <span class="text">Settings</span>
    </button>
    <ul>
      <li><a href="profile.php">
          <span class="icon">
            <ion-icon name="person-sharp"></ion-icon>
          </span>
          <span class="text">Profile</span>
        </a></li>
      <li><a href="update-password.php">
          <span class="icon">
            <ion-icon name="key-sharp"></ion-icon>
          </span>
          <span class="text">Update Password</span>
        </a></li>
      <li><a href="my-booking.php">
          <span class="icon">
            <ion-icon name="bookmark-sharp"></ion-icon>
          </span>
          <span class="text">My Bookings</span>
        </a></li>
      <li><a href="post-testimonial.php">
          <span class="icon">
            <ion-icon name="notifications-sharp"></ion-icon>
          </span>
          <span class="text">Post Testimonial</span>
        </a></li>
      <li><a href="my-testimonials.php">
          <span class="icon">
            <ion-icon name="help-circle-sharp"></ion-icon>
          </span>
          <span class="text">My Testimonial</span>
        </a></li>
        <li><a href="logout.php">
          <span class="icon">
            <ion-icon name="help-circle-sharp"></ion-icon>
          </span>
          <span class="text">Sign Out</span>
        </a></li>
    </ul>
  </div>

</div>
<script>
  var btn_1 = document.querySelector(".dropdown_desktop_icon button");
  var btn_2 = document.querySelector(".dropdown_desktop button");
  var btn_3 = document.querySelector(".dropdown_mobile button");

  btn_1.addEventListener("click", function() {
    this.classList.toggle("active");
  })

  btn_2.addEventListener("click", function() {
    this.classList.toggle("active");
  })

  btn_3.addEventListener("click", function() {
    this.classList.toggle("active");
  })
</script>