<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
</head>

<body>
	<?php
	include "header.php";
	?>
	<section id="login-header" class="login-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-4">
					<div class="image-wrapper">
						<img src="image/login-header.png" class="img-fluid" alt="Welcome Back">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="profile-message" class="profile-message">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 d-flex align-items-center justify-content-center">
					<h2>LOGIN</h2>
				</div>
			</div>
		</div>
	</section>

	<section id="login" class="login">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 d-flex align-items-center" id="input-section">
					<form action="php/login.php" method="post" class="php-email-form">

						<?php if (isset($_GET['error'])) { ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $_GET['error']; ?>
							</div>
						<?php } ?>

						<div class="row justify-content-center mt-2">
							<div class="form-group col-lg-12">
								<label class="form-label">Username</label>
								<input type="text" class="form-control" name="uname" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>">
							</div>
						</div>
						<div class="row justify-content-center mt-2">
							<div class="form-group col-lg-12">
								<label class="form-label">Password</label>
								<input type="password" class="form-control" name="pass">
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-danger">Login</button>
						</div>
						<div class="text-center mt-4">
							<h4><a href="registration.php" class="link-secondary">Don't have an account yet? Sign Up</a></h4>
						</div>
					</form>
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