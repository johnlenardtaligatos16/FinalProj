<?php
session_start();
require 'db_conn.php'; // Include database connection


// Check if the request method is POST and the booking ID is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id'])) {
    $booking_id = $_POST['book_id']; // Get the booking ID from the form

    // Update the status of the booking to 'Rejected'
    $sql = "UPDATE booking SET status = 'Rejected' WHERE book_id = ?";
    $stmt = $dbConn->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        // Redirect back to the bookings page after successful update
        header("Location: appointment.php");
        exit();
    } else {
        echo "Error rejecting booking.";
    }

    $stmt->close(); // Close the statement
} else {
    header("Location: bookings.php");
    exit();
}

$dbConn->close(); // Close the database connection
?>
