<?php
session_start();
include "db_conn.php";
include "header.php";

if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($dbConn, $sql);
$users = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
mysqli_close($dbConn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Users</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
</head>

<body>
    <?php
    include "db_conn.php";

    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <section class="manage-header" id="manage-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-5 align-items-center">
                    <h1>MANAGE USERS</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="search-bar" id="search-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <form class="search-form">
                        <h3 style="text-align: center;">Search User ID</h3>
                        <input type="text" id="searchId" class="form-control" />
                        <input type="button" id="searchButton" value="Search" class="btn btn-primary search-btn mt-2" />
                    </form>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="display-user-details" id="userDetails">
                    <?php
                        if (isset($_GET['search'])) {
                            if (isset($_GET['id'])) {
                                $id = (int) $_GET['id'];
                                $sql = "SELECT * FROM users WHERE id = " . $id;

                                $result = mysqli_query($dbConn, $sql);

                                if (!$result) {
                                    printf("Error: %s\n", mysqli_error($dbConn));
                                    exit();
                                } else {
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        if (isset($_SESSION['fname']) && $row["fname"] == "Administrator") {
                                            echo "<ul class='alignMe'>";
                                            echo "<li><p><b>ID</b> :&nbsp;" . $row["id"] . "</p></li>";
                                            echo "<li><p><b>Name</b> :&nbsp;" . $row["fname"] . "</p></li>";
                                            echo "</ul>";
                                        } else {
                                            echo "<ul class='alignMe'>";
                                            echo "<li><p><b>ID</b> :&nbsp;" . $row["id"] . "</p></li>";
                                            echo "<li><p><b>Name</b> :&nbsp;" . $row["fname"] . " " . $row["lname"] . "</p></li>";
                                            echo "<li><p><b>Email</b> :&nbsp;" . $row["email"] . "</p></li>";
                                            echo "<li><p><b>Username</b> :&nbsp;" . $row["username"] . "</p></li>";
                                            echo "<li><p><b>Address</b> :&nbsp;" . $row["address"] . "</p></li>";
                                            echo "<li><p><b>Contact Number</b> :&nbsp;" . $row["contactNum"] . "</p></li>";
                                            echo "<button class='btn btn-danger btn-delete mt-2' onclick=\"window.location.href = 'delete_user.php?id=" . $row["id"] . "';\">Delete User</button>";
                                            echo "<button class='btn btn-primary btn-edit mt-2' onclick=\"window.location.href = 'edit_user.php?id=" . $row["id"] . "';\">Edit User</button>";
                                            echo "</ul>";
                                        }
                                    } else {
                                        echo "Record with an ID no.&nbsp;<b>{$_GET['id']}</b>&nbsp;is not in the database.";
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <div class="container mt-4">
        <?php
        echo "<center><h3>Records displayed using HTML table</h3></center>";

        echo "<table id='userTable' class='table table-bordered table-striped'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Name</th>";
        echo "<th scope='col'>Email</th>";
        echo "<th scope='col'>Username</th>";
        echo "<th scope='col'>Address</th>";
        echo "<th scope='col'>Contact Number</th>";
        echo "<th scope='col'>Actions</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Fetch users to populate the table rows
        $sql = "SELECT * FROM users";
        $result = mysqli_query($dbConn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $fullname = ucwords(strtolower($row["fname"] . " " . $row["lname"]));
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $fullname . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["contactNum"] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-danger btn-delete mt-2 mr-2' onclick=\"window.location.href = 'delete_user.php?id=" . $row["id"] . "';\">Delete</button>";
                echo "<button class='btn btn-primary btn-edit mt-2' onclick=\"window.location.href = 'edit_user.php?id=" . $row["id"] . "';\">Edit</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";

        mysqli_close($dbConn);
        ?>
    </div>
    <br>
    <div class="container mt-4 text-center">
        <button class="btn btn-secondary btn-back" onclick="window.location.href = 'profile.php';">Go Back</button>
    </div>
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