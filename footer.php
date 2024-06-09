<!-- START OF FOOTER -->
<footer id="footer">
  <div class="footer-top">
    <div class="container d-flex align-items-center justify-content-center">
      <div class="row">

        <div class="col-lg-5 col-md-6">
          <div class="footer-info">
            <div class="address">
              <h4>LOCATION</h4>
              <p>Guadalupe Commercial Complex, Edsa-Guadalupe, Makati City</p>
            </div>
            <div class="email">
              <h4>EMAIL</h4>
              <p>toxztat2@gmail.com</p>
            </div>
            <div class="phone">
              <h4>CALL</h4>
              <p>+63 927 737 4100</p>
            </div>
            <!--  -->
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <ul>
            <li class="nav-item">
              <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">GALLERY</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="tattoo.php">TATTOO</a>
                <a class="dropdown-item" href="piercing.php">PIERCING</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="services.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICES</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="tattoo.php">TATTOO</a>
                <a class="dropdown-item" href="piercing.php">PIERCING</a>
                <a class="dropdown-item" href="consultation.php">TATTOO CONSULTATION</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faqs.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="about.php">ABOUT&nbsp;&nbsp;</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-info">
          <h4>FOLLOW US&nbsp;&nbsp;<i class="fa-solid fa-arrow-down"></i></h4>
          <div class="social-links mt-3">
            <a href="https://www.youtube.com/channel/UCStr66g3ocHvDKcrBBqROEg" class="youtube"><i class="fa-brands fa-square-youtube"></i></a>
            <a href="https://www.facebook.com/toxztattooshop" class="facebook"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="https://www.instagram.com/toxz_tattoo/" class="instagram"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="https://www.tiktok.com/@arneltabigoon" class="tiktok"><i class="fa-brands fa-tiktok"></i></a>
          </div>
          <?php if (isset($_SESSION['role'])) {  ?>
            <button class="btn btn-danger btn-sm" onclick="window.location.href = 'appointment.php';">Book HERE</button>
          <?php } else { ?>
            <button class="btn btn-danger btn-sm" onclick="window.location.href = 'registration.php';">SIGN UP NOW</button>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy;&nbsp;2024 by TOXZ TATTOO & BODY PIERCING&nbsp;<img src="image/toxzlogo.png" width="25px">
    </div>
  </div>
</footer>

<script src="main.js"></script>
<!-- END OF FOOTER -->