<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tattoo Consultation</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
</head>

<body>
    <?php
    session_start();
    include "header.php";
    include "db_conn.php";
    ?>
    <section id="tattoo-header" class="tattoo-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="image-wrapper">
                        <img src="image/consult-header.png" class="img-fluid" alt="Tattoo Gallery">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="profile-message" class="profile-message">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <h2>WHAT CAN YOU EXPECT FROM US?</h2>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <section id="tattoo" class="tattoo d-flex d-flex align-items-center justify-content-center mt-2">
        <div class="container">
            <div class="row justify-content-center mt-2">
                <div class="col-lg-7 align-items-center mb-3" id="service-section">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We believe in the power
                        of collaboration and communication, which is why we offer comprehensive tattoo consultations
                        tailored to each client's needs and desires. During these personalized sessions, our artist
                        takes the time to listen attentively to your ideas, preferences, and inspirations, ensuring a
                        deep understanding of your vision for your tattoo. Through open dialogue and expert guidance,
                        we work together to refine and shape your concept, offering valuable insights and creative suggestions
                        to bring your ideas to life. Whether you're seeking to commemorate a special moment, express your personality,
                        or explore new artistic possibilities, our consultations provide a supportive and informative environment where your vision can truly flourish.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="btn-container justify-content-center text-center">
                        <h3 class="center-text">Thinking about consulting for a tattoo?</h3>
                        <?php if (isset($_SESSION['role'])) {  ?>
                            <button class="btn btn-danger btn-sm" onclick="window.location.href = 'appointment.php';">Book HERE</button>
                        <?php } else { ?>
                            <button class="btn btn-danger btn-sm" onclick="window.location.href = 'registration.php';">SIGN UP NOW To BOOK NOW</button>
                        <?php } ?>
                    </div>
                    <div class="btn-container justify-content-center text-center mt-4">
                        <h3 class="center-text">Have any questions?</h3>
                        <button class="btn btn-danger btn-sm" onclick="window.location.href = 'faqs.php';">SEE OUR FAQ</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>

    <button onclick="topFunction()" id="back-to-top" title="Go to top">Top</button>
    <?php
    include 'footer.php';
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>