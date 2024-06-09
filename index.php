<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
  <title>Toxz Tattoo</title>
  <script defer src="carousel.js"></script>
</head>

<body>
  
  <?php
  session_start();
  include 'image_profile.php';
  include 'header.php';
  
  ?>

  <!-- START OF HERO -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-lg-12">
          <div data-aos="fade-left" data-aos-delay="100">
            <img src="image/hero-title.png" class="img-fluid" alt="Toxz Tattoo & Body Piercing">
          </div>
          <h2 class="col-lg-12">WANT TO BOOK AN APPOINTMENT?</h2>
          <!--para mawala yung signup button pag nakalogin na-->
          <?php if (isset($_SESSION['fname'])) {  ?>
            <button class="btn btn-danger btn-sm" onclick="window.location.href = 'appointment.php';">Book Here</button>
            <?php if (isset($_SESSION['fname'])) ?>

          <?php } else { ?>
            <button class="btn btn-danger btn-sm" onclick="window.location.href = 'registration.php';">SIGN UP NOW</button>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- END OF HERO -->

  <!-- START OF SECTION -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-center mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon">
              <a href="tattoo.php">
                <img src="image/tattoo-icon.png" class="img-fluid" alt="tattoo-icon">
              </a>
            </div>
            <h4><a class="nav-link" href="tattoo.php">TATTOO</a></h4>
            <p>Our artist provides a personalized and safe tattooing experience, creating custom designs in various styles to reflect each client's vision with precision and creativity.</>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-center mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon">
              <a href="piercing.php">
                <img src="image/piercing-icon.png" class="img-fluid" alt="piercing-icon">
              </a>
            </div>
            <h4><a class="nav-link" href="piercing.php">PIERCING</a></h4>
            <p>Our piercer offers a personalized and safe piercing experience, using top-quality jewelry and sterilized equipment to ensure each piercing is done with precision and care.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-center mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon">
              <a href="consultation.php">
                <img src="image/consultation-icon.png" class="img-fluid" alt="consultation-icon">
              </a>
            </div>
            <h4><a class="nav-link" href="consultation.php">TATTOO CONSULTATION</a></h4>
            <p>Our artist listens to your ideas, preferences, and inspirations, collaborating with you to refine your concept and provide valuable insights, ensuring a supportive environment where your vision can thrive.</p>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- END OF SERVICES -->

   <!-- START OF VISIT US -->
   <section id="visit-us" class="visit-us">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>VISIT US TODAY!</h2>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d965.3948803017703!2d121.04476741866769!3d14.566021526861912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c85a119cc805%3A0xe48781374ea9d702!2sGuadalupe%20Commercial%20Complex!5e0!3m2!1sen!2sph!4v1717008124048!5m2!1sen!2sph" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="row mt-4">

        <div class="col-lg-5 mt-3 d-flex align-items-stretch justify-content-center">
          <div class="info">
            <div class="address">
              <i class="fa fa-location-arrow" aria-hidden="true" id="location-icon"></i>
              <h4>LOCATION</h4>
              <p>Guadalupe Commercial Complex, Edsa-Guadalupe, Makati City</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mt-3">
          <div class="info">
            <div class="email">
              <i class="fa fa-envelope" aria-hidden="true" id="email-icon"></i>
              <h4>EMAIL</h4>
              <p>toxztat2@gmail.com</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 mt-3">
          <div class="info">
            <div class="phone">
              <i class="fa fa-phone" aria-hidden="true" id="phone-icon"></i>
              <h4>CALL</h4>
              <p>+63 927 737 4100</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- END OF VISIT US -->



  <!-- START OF GALLERY -->
  <div class="section-title">
    <h2>TATTOO</h2>
  </div>
  <div class="container" style="margin-top: 20px; margin-bottom: 70px;">
    <div id="carousel-tattoo" class="carousel slide mx-auto" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-tattoo" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-tattoo" data-slide-to="1"></li>
        <li data-target="#carousel-tattoo" data-slide-to="2"></li>
        <li data-target="#carousel-tattoo" data-slide-to="3"></li>
        <li data-target="#carousel-tattoo" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner bg-black">
        <div class="carousel-item active">
          <img class="d-block w-100" src="image/tattoo/tattoo1.jpg" alt="First slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/tattoo/tattoo2.jpg" alt="Second slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/tattoo/tattoo3.jpg" alt="Third slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/tattoo/tattoo4.jpg" alt="Fourth slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/tattoo/tattoo5.jpg" alt="Fifth slide" data-interval="800" style="object-fit: contain;">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-tattoo" role="button" data-slide="prev">
        <span class="fa fa-caret-square-o-left fa-3x" aria-hidden="true" id="prev-icon"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-tattoo" role="button" data-slide="next">
        <span class="fa fa-caret-square-o-right fa-3x" aria-hidden="true" id="next-icon"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
    <br>
    <div class="text-center">
      <button class="btn btn-danger" onclick="window.location.href = 'tattoo.php';">SEE FULL GALLERY</button>
    </div>
  </div>

  <div class="section-title">
    <h2>PIERCING</h2>
  </div>
  <div class="container" style="margin-top: 20px; margin-bottom: 70px;">
    <div id="carousel-piercing" class="carousel slide mx-auto" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-piercing" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-piercing" data-slide-to="1"></li>
        <li data-target="#carousel-piercing" data-slide-to="2"></li>
        <li data-target="#carousel-piercing" data-slide-to="3"></li>
        <li data-target="#carousel-piercing" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner bg-black">
        <div class="carousel-item active">
          <img class="d-block w-100" src="image/piercing/piercing1.jpg" alt="First slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/piercing/piercing2.jpg" alt="Second slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/piercing/piercing3.jpg" alt="Third slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/piercing/piercing4.jpg" alt="Fourth slide" data-interval="800" style="object-fit: contain;">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="image/piercing/piercing5.jpg" alt="Fifth slide" data-interval="800" style="object-fit: contain;">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-piercing" role="button" data-slide="prev">
        <span class="fa fa-caret-square-o-left fa-3x" aria-hidden="true" id="prev-icon"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-piercing" role="button" data-slide="next">
        <span class="fa fa-caret-square-o-right fa-3x" aria-hidden="true" id="next-icon"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
    <br>
    <div class="text-center">
      <button class="btn btn-danger" onclick="window.location.href = 'piercing.php';">SEE FULL GALLERY</button>
    </div>
  </div>
  <br>
  <br>
  <br>
  <!-- END OF GALLERY -->
  <button onclick="topFunction()" id="back-to-top" title="Go to top">Top</button>
  <?php
  include 'footer.php';
  ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>