<?php
session_start();
if (
	isset($_SESSION['id']) &&
	isset($_SESSION['fname']) &&
	isset($_SESSION['lname']) &&
	isset($_SESSION['email']) &&
	isset($_SESSION['address']) &&
	isset($_SESSION['contactNum'])
) {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Profile</title>
		<link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
	</head>
	<body>

		<?php include "header.php";

		if (!$dbConn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//IMPORTANTTT!!!!!
		$sql = "SELECT * FROM users";
		$result = mysqli_query($dbConn, $sql);
		$users = [];
		if ($result && mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$users[] = $row;
			}
		}

		foreach ($users as $user) : ?>

		<?php endforeach;

		$id = $user['id'];
		$fname = $user['fname'];
		$lname = $user['lname'];
		$email = $user['email'];
		$address = $user['address'];
		$contactNum = $user['contactNum'];
		$profile_img = $user['profile_img'];
		?>

		
		<section id="profile-header" class="profile-header">
			<div class="container">
				<div class="row justify-content-start">
					<div class="col-lg-3 col-md-3 col-sm-12 justify-content-center mb-4">
						<div class="image-wrapper">
							<img src="profile_picture.php?user_id=<?php $id ?>" alt="Profile Image"  class="avatar">
						</div>
					</div>
					<div class="col-lg-9 col-lg-9 col-sm-9 mb-4">
						<div class="image-wrapper">
							<img src="image/login-header.png" class="img-fluid welcome-back" alt="Welcome Back">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="profile-message" class="profile-message mb-2">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12 d-flex align-items-center justify-content-center">
						<h2>What do you want to do today?</h2>
					</div>
				</div>
			</div>
		</section>

		<section id="profile-sidenav" class="profile-sidenav">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 mt-3">
						<div class="profile-controls">
							<?php if (isset($_SESSION['role'])) {
								if ($_SESSION['role'] == "Admin") {
									echo "<ul class='sidenav'>
										<li class='navlink'>
											<i class='fa-regular fa-address-book'></i>&nbsp;&nbsp;&nbsp;
											<a href='manage_users.php'>Manage Users</a>
										</li>
										<li class='navlink'>
											<i class='fa-regular fa-image'></i>&nbsp;&nbsp;&nbsp;
											<a href='gallery_upload.php'>Upload Gallery</a>
										</li>
										<li class='navlink'>
											<i class='fa-regular fa-calendar-days'></i>&nbsp;&nbsp;&nbsp;
											<a href='bookings.php'>Appointment Bookings</a>
										</li>
										<li class='navlink'>
											<i class='fa-regular fa-square-check'></i>&nbsp;&nbsp;&nbsp;
											<a href='accepted_booking.php'>Accepted Appointments</a>
										</li>
									</ul>";
								} else {
									echo "<ul class='sidenav2'>
											<li class='navlink2'>
												<i class='fa-regular fa-pen-to-square'></i>&nbsp;&nbsp;&nbsp;
												<a href='edit_profile.php'>Edit Profile</a>
											</li>
											<li class='navlink2'>
												<i class='fa-regular fa-trash-can'></i>&nbsp;&nbsp;&nbsp;
												<a href='delete_profile.php'>Delete Account</a>
											</li>
											<li class='navlink2'>
												<i class='fa-regular fa-calendar-check'></i>&nbsp;&nbsp;&nbsp;
												<a href='booking_status.php'>Booking Status</a>
											</li>
										</ul>";
									}
								} ?>
						</div>
						<?php if (isset($_SESSION['role'])) {
							if ($_SESSION['role'] != "Admin") {
								echo "<div class='d-grid'><button class='btn btn-danger btn-sm mt-4 mb-2' id='btn-profile' style='width: 100%;' onclick=\"window.location.href='appointment.php';\">Book appointment</button></div>";
							}
						} ?>
					</div>

					<div class="col-lg-9 col-md-8 mt-3">
						<div class="profile-details">
							<h3>Account Details</h3>
							<br>
							<?php if (isset($_SESSION['role']))
								if ($_SESSION['role'] == "Admin") {
									echo "<ul class='alignMe'>
								<li><b>Role&nbsp;&nbsp;:&nbsp;&nbsp;</b> " . $_SESSION['fname'] . "&nbsp;&nbsp;&nbsp;<i class='fa-solid fa-crown'></i></li>
								<li><b>Email&nbsp;&nbsp;:&nbsp;&nbsp;</b> " .  $_SESSION['email'] . "</li>
								<li><b>Contact Number&nbsp;&nbsp;:&nbsp;&nbsp;</b> " .  $_SESSION['contactNum'] . "</li>
								</ul>"; ?>

							<?php } else {
									echo "<ul class='alignMe'>
								<li><b>First Name&nbsp;&nbsp;:&nbsp;&nbsp;</b> " . $_SESSION['fname'] . "</li>
								<li><b>Last Name&nbsp;&nbsp;:&nbsp;&nbsp;</b> " .  $_SESSION['lname'] . "</li>
								<li><b>Email&nbsp;&nbsp;:&nbsp;&nbsp;</b> " .  $_SESSION['email'] . "</li>
								<li><b>Address&nbsp;&nbsp;:&nbsp;&nbsp;</b> " .  $_SESSION['address'] . "</li>
								<li><b>Contact Number&nbsp;&nbsp;:&nbsp;&nbsp;</b> " .  $_SESSION['contactNum'] . "</li>
								</ul>";
								} ?>
						</div>
					</div>
				</div>
			</div>
		</section>


		<button onclick="topFunction()" id="back-to-top" title="Go to top">Top</button>
		<?php
		include 'footer.php';
		?>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</html>

<?php } else {
	header("Location: login.php");
	exit;
} ?>

