<?php

if (
	isset($_POST['fname']) &&
	isset($_POST['lname']) &&
	isset($_POST['email']) &&
	isset($_POST['uname']) &&
	isset($_POST['pass']) &&
	isset($_POST['address']) &&
	isset($_POST['contactNum'])
) {

	include "../db_conn.php";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$address = $_POST['address'];
	$contactNum = $_POST['contactNum'];

	$data = "fname=" . $fname . "lname=" . $lname . "email=" . $email . "address=" . $address . "contactNum=" . $contactNum . "&uname=" . $uname;

	if (empty($fname)) {
		$em = "Full name is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else if (empty($lname)) {
		$em = "Last name is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else if (empty($email)) {
		$em = "Email is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else if (empty($uname)) {
		$em = "User name is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else if (empty($pass)) {
		$em = "Password is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else if (empty($address)) {
		$em = "Address is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else if (empty($contactNum)) {
		$em = "Contact Number is required";
		header("Location: ../registration.php?error=$em&$data");
		exit;
	} else {

		// hashing the password
		$pass = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "INSERT INTO users(fname, lname, email, username, password, address, contactNum) 
    	        VALUES(?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$fname, $lname, $email, $uname, $pass, $address, $contactNum]);

		header("Location: ../registration.php?success=Your account has been created successfully");
		exit;
	}
} else {
	header("Location: ../registration.php?error=error");
	exit;
}


// Fetch all profile images
$profile_images = [];
$sql = "SELECT profile_img FROM profile_pic";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$profile_images[] = $row['profile_img'];
	}
} else {
	die("No profile images found");
}



// Fetch all users
$sql = "SELECT id FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// Update each user with a random profile image
	while ($row = $result->fetch_assoc()) {
		$random_img = $profile_images[array_rand($profile_images)];
		$user_id = $row['id'];

		// Prepare and bind
		$stmt = $conn->prepare("UPDATE user SET profile_img = ? WHERE id = ?");
		$stmt->bind_param('bi', $random_img, $user_id);  // 'b' means blob, 'i' means integer

		if ($stmt->execute() !== TRUE) {
			echo "Error updating record for user ID $user_id: " . $stmt->error;
		}

		$stmt->close();
	}
	echo "All users have been updated with random profile images.";
} else {
	echo "No users found";
}

// Close connection
$conn->close();
