<?php

//PASSING BLOB DATA FROM PROFILE_PIC TO USERS
include "db_conn.php";
include "header.php";

if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}

$profile_images = [];
$sql = "SELECT profile_img FROM profile_pic";
$result = $dbConn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profile_images[] = $row['profile_img'];
    }
} else {
    die("No profile images found");
}

// Fetch all users
$sql = "SELECT id FROM users";
$result = $dbConn->query($sql);

if ($result->num_rows > 0) {
    // Update each user with a random profile image
    while ($row = $result->fetch_assoc()) {
        $random_img = $profile_images[array_rand($profile_images)];
        $user_id = $row['id'];

        // Prepare and bind
        $stmt = $dbConn->prepare("UPDATE users SET profile_img = ? WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $dbConn->error);
        }
        $null = NULL;
        $stmt->bind_param('bi', $null, $user_id);  // 'b' means blob, 'i' means integer
        $stmt->send_long_data(0, $random_img);

        if ($stmt->execute() === TRUE) {
            echo "";
        } else {
            echo "";
        }

        $stmt->close();
    }
    echo "";
} else {
    echo "";
}

// Close connection
$dbConn->close();
