<!DOCTYPE html>
<html lang="en">

<head>
    <title>Piercing</title>
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
						<img src="image/piercing-header.png" class="img-fluid" alt="Tattoo Gallery">
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
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our piercer provides a comprehensive and
                        tailored piercing service, carefully guiding clients through every step of the process to ensure a
                        comfortable and personalized experience. With a keen eye for aesthetics and safety, our piercer utilizes
                        only the highest quality jewelry and meticulously sterilized equipment, adhering to strict hygiene standards
                        to minimize any risk of infection or discomfort. From initial consultation to aftercare advice, we prioritize
                        our clients' well-being and satisfaction, striving to create lasting and beautiful piercings that reflect their individual style and preferences.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="btn-container justify-content-center text-center">
                        <h3 class="center-text">Considering getting a piercing?</h3>
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

    <section id="tattoo-title" class="tattoo-title">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>PIERCING GALLERY</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tattoo-gallery" id="tattoo-gallery">
        <div class="container">
            <div class="gallery">
                <?php


                $sql = "SELECT p_img FROM piercing_gallery";
                $result = mysqli_query($dbConn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="gallery-item">';
                        echo '<img src="gallery/piercing/' . $row['p_img'] . '" alt="Image">';
                        echo '</div>';
                    }
                } else {
                    echo "No images found.";
                }

                mysqli_close($dbConn);
                ?>
            </div>
        </div>
    </section>
    
    <br>
    <br>
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