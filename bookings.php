<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
    <style>
        
        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
            /* Ensure there is space between the buttons */
        }
        .container h2 {
            font-size: 60px;;
            text-align: center;
        }
        table {
            margin: auto;
            font-family: "Oswald";
        }

        table th {
            font-family: "Bebas Neue";
            font-size: 25px;
            text-align: center;
            justify-content: center;
            margin: auto;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "header.php";
    if (!isset($_SESSION['id'])) {

        header("Location: login.php");
        exit();
    }
    include "db_conn.php";
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <?php
        require 'db_conn.php';

        // Get the current date
        $current_date = date('Y-m-d');

        // Fetch bookings from the database, only future and non-accepted bookings
        $sql = "SELECT booking.*, users.fname, users.lname, users.username, users.address, users.contactNum 
        FROM booking
        LEFT JOIN users ON booking.user_id = users.id
        WHERE booking.book_date >= ? AND (booking.status = 'Pending' OR booking.status IS NULL)
        ORDER BY booking.book_date DESC, booking.book_time DESC";
        $stmt = $dbConn->prepare($sql);
        $stmt->bind_param("s", $current_date);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <div class="container mt-1">
            <h2 class="mb-4">Appointment Bookings</h2>

            <?php if ($result->num_rows > 0) : ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>User ID</th>
                            <th>Service</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Message</th>
                            <th>User Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                                <td><?php echo isset($row['user_id']) ? htmlspecialchars($row['user_id']) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($row['book_service']); ?></td>
                                <td><?php echo htmlspecialchars($row['book_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['book_time']); ?></td>
                                <td><?php echo htmlspecialchars($row['book_msg']); ?></td>
                                <td>
                                    <strong>First Name:</strong> <?php echo isset($row['fname']) ? htmlspecialchars($row['fname']) : 'N/A'; ?><br>
                                    <strong>Last Name:</strong> <?php echo isset($row['lname']) ? htmlspecialchars($row['lname']) : 'N/A'; ?><br>
                                    <strong>Username:</strong> <?php echo isset($row['username']) ? htmlspecialchars($row['username']) : 'N/A'; ?><br>
                                    <strong>Address:</strong> <?php echo isset($row['address']) ? htmlspecialchars($row['address']) : 'N/A'; ?><br>
                                    <strong>Contact Number:</strong> <?php echo isset($row['contactNum']) ? htmlspecialchars($row['contactNum']) : 'N/A'; ?>
                                </td>
                                <td>
                                    <form action="accept_booking.php" method="post" style="margin-bottom: 10px;">
                                        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($row['book_id']); ?>">
                                        <button type="submit" class="btn btn-success btn-custom">Accept Booking</button>
                                    </form>
                                    <form action="reject_booking.php" method="post" style="margin-bottom: 10px;">
                                        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($row['book_id']); ?>">
                                        <button type="submit" class="btn btn-danger btn-custom">Reject Booking</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php
                echo " <button class='btn btn-secondary btn-back' onclick='history.back()'>Go Back</button>
                <a href='accepted_booking.php' class='btn btn-secondary btn-back' role='button' style='margin:10px;'>Accepted Appointments</a>";
                ?>
            <?php else : ?>
                <p class="alert alert-info">No data found.</p>
            <?php endif; ?>

            <?php $dbConn->close();
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
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