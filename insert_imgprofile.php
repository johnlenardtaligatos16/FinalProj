<?php

//INSERTING BLOB DATA TO DATABASE
session_start();
include "db_conn.php";
include "header.php";

if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check connection
if ($dbConn->connect_error) {
    die("Connection failed: " . $dbConn->connect_error);
}

// Path to the directory with images
$dir_path = 'image/profile_img/';
$images = scandir($dir_path);

foreach ($images as $image) {
    if ($image !== '.' && $image !== '..') {
        $image_path = $dir_path . $image;
        $image_content = file_get_contents($image_path);

        // Prepare and bind
        $stmt = $dbConn->prepare("INSERT INTO profile_pic (profile_img) VALUES (?)");
        $stmt->bind_param('b', $null);  // 'b' means blob
        $stmt->send_long_data(0, $image_content);

        if ($stmt->execute() === TRUE) {
            echo "Image $image inserted successfully\n";
        } else {
            echo "Error inserting image $image: " . $stmt->error . "\n";
        }

        $stmt->close();
    }
}

// Close connection
$dbConn->close();
