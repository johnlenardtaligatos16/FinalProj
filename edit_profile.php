<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
    <style>
        .edit_form {
            padding: 50px;
            border: 1px solid red;
            border-radius: 10px;
            width: 40%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "db_conn.php";
    include "header.php";

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
    //TIL HEREEEEEE

    // Initialize variables
    $id = $user['id'];
    $fname = $user['fname'];
    $lname = $user['lname'];
    $email = $user['email'];
    $address = $user['address'];
    $contactNum = $user['contactNum'];

    if (($_SESSION['id'])) {
        if ($_SESSION['role'] == "Admin") {
            $id = $_SESSION['id']; ?>
    <?php } else {
            $id = $_SESSION['id'];
        }


        if (isset($_POST['update'])) {
            // Update the record here
            $edt_id = $_POST['edt_id'];
            $edt_fname = $_POST['edt_fname'];
            $edt_lname = $_POST['edt_lname'];
            $edt_email = $_POST['edt_email'];
            $edt_address = $_POST['edt_address'];
            $edt_contactNum = $_POST['edt_contactNum'];

            // Generate SQL statement
            $sql = "UPDATE users SET fname='$edt_fname', lname='$edt_lname', email='$edt_email', address='$edt_address', contactNum='$edt_contactNum' WHERE id='$edt_id'";

            // Execute SQL statement
            $result = mysqli_query($dbConn, $sql);
            if ($result) {
                // Display "Record Updated" message using the displaying_message()
                //display_message('Record Updated');

                // Update displayed values
                $fname = $edt_fname;
                $lname = $edt_lname;
                $email = $edt_email;
                $address = $edt_address;
                $contactNum = $edt_contactNum;
            } else {
                echo "Error updating record: " . mysqli_error($dbConn);
            }
        } else {
            // Display edit record message only if update button is not clicked
            //display_message('Edit Record');
        }

        // Generate SQL statement to fetch the record
        $sql = "SELECT * FROM users WHERE id='$id'";

        // Execute SQL statement
        $result = mysqli_query($dbConn, $sql);

        // Check if record exists
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $fname = $row["fname"];
            $lname = $row["lname"];
            $email = $row["email"];
            $address = $row["address"];
            $contactNum = $row["contactNum"];
        }
    } else {
        echo "Error: Missing id parameter";
    }
    // Close connection
    mysqli_close($dbConn);
    ?>

    <br>
    <center>


        <div class="edit-container" style="display: flex; justify-content:center; align-items:center; min-height:100vh;">

            <form class="edit_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST">
                <input type="hidden" name="edt_id" value="<?php echo $id; ?>">

                <h4>Edit Profile</h4><br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="edt_fname" value="<?php echo $fname; ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="edt_lname" value="<?php echo $lname; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="edt_email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="edt_contactNum" value="<?php echo $contactNum; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="edt_address" value="<?php echo $address; ?>">
                </div>

                <br>
                <p><button type="submit" class="btn btn-primary" name="update">Update</button>
                    <button type="reset" class="btn btn-primary">Clear</button>
                </p>
                <br><a href="manage_users.php"> Back to Manage User </a>
            </form>


    </center>
</body>

</html>