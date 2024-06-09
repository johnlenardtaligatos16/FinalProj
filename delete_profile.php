<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete User</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
</head>

<body>
    <?php
    session_start();
    include "db_conn.php";
    include "header.php";
    ?>
    <br>
    <br>
    <div style="padding-top: 10%;">
        <?php
        if (isset($_POST['btnDelete'])) {
            $id = (int) $_GET['id'];

            // Check connection
            if (!$dbConn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Generate SQL statement to select record
            $sqlSelect = "SELECT * FROM users WHERE id = $id";

            // Execute the SELECT query
            $result1 = mysqli_query($dbConn, $sqlSelect);

            // Check if the record exists
            if ($result1 && mysqli_num_rows($result1) > 0) {
                $row = mysqli_fetch_assoc($result1);

                // Generate SQL statement to delete record
                $sqlDelete = "DELETE FROM users WHERE id = $id";

                // Execute the DELETE query
                $result = mysqli_query($dbConn, $sqlDelete);

                if ($result) {
                    // Display record deleted message
                    echo "<h1 style=\"text-align: center;\">Record: # " . $row['id'] . ". " . $row['fname'] . " " . $row['lname'] . " is now deleted!</h1>";
                    echo "<center><a href=\"index.php\"> Back to Menu </a>";
                    echo "<br><a href=\"manage_users.php\"> View Information </a><br><br></center>";
                } else {
                    echo "Error deleting record: " . mysqli_error($dbConn);
                }
            } else {
                echo "Error: Record not found.";
            }
        } else {
        ?>
            <center>
                <h1>
                    <form method="POST">
                        Deleting Record #
                        <?php
                        $id = $_SESSION['id'];

                        // Check connection
                        if (!$dbConn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM users WHERE id = $id";

                        // Execute SQL statement
                        $result = mysqli_query($dbConn, $sql);

                        // Check if any rows are returned
                        if ($result && mysqli_num_rows($result) > 0) {
                            // Fetch the row
                            $row = mysqli_fetch_assoc($result);

                            if ($row) {
                                echo $row['id'] . " " . $row['fname'] . " " . $row['lname'];
                            } else {
                                echo "Record not found";
                            }
                        } else {
                            echo "Record not found";
                        }
                        ?>
                        . Are you sure you want to delete this record?<br>
                        <input type="submit" value="Confirm Deletion" name="btnDelete">
                        <a href="manage_users.php"><input type="button" value="Cancel" name="btnCancel"></a>
                    </form>
                </h1>
            </center>
        <?php
        }

        // Close connection
        mysqli_close($dbConn);
        ?>
    </div>
    <button onclick="topFunction()" id="back-to-top" title="Go to top">Top</button>
    <?php
    include 'footer.php';
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>