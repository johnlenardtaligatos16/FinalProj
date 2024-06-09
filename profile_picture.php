<?php
session_start();


include "db_conn.php";
// Fetch image data for a specific user
$user_id = $_SESSION['id']; // Assuming you pass the user ID through URL parameter
$sql = "SELECT profile_img FROM users WHERE id = ?";
$stmt = $dbConn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->store_result();

// Check if user exists and has a profile image
if ($stmt->num_rows > 0) {
    $stmt->bind_result($profile_img);
    $stmt->fetch();

    // Set the appropriate content type header
    header('Content-Type: image/jpeg'); // Change the content type as per your image type

    // Output the BLOB data
    echo $profile_img;
} else {
    // If user doesn't exist or has no profile image, display a default image or an error message
    // Example: echo '<img src="default_profile_img.jpg" alt="Default Profile Image">';
    echo 'User does not exist or has no profile image.';
}

// Close statement and connection
$stmt->close();
$dbConn->close();
?>