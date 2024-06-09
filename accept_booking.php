<?php
session_start();
if (!isset($_SESSION['id'])) {

    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id'])) {
    require 'db_conn.php'; // Include database connection

    $booking_id = $_POST['book_id']; // Get the ID of the booking to accept

    // Update the status of the booking to 'Accepted' in the database
    $sql = "UPDATE booking SET status = 'Accepted' WHERE book_id = ?";
    $stmt = $dbConn->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        // Successfully updated the status
        header("Location: bookings.php"); // Redirect back to booking.php
        echo"Successfully updated the status";
        exit();
    } else {
        // Error occurred while updating the status
        echo "Error updating status: " . $stmt->error;
    }

    $stmt->close();
    $dbConn->close();
} else {
    // Redirect to the appropriate page if accessed directly without form submission
    header("Location: bookings.php");
    exit();
}
