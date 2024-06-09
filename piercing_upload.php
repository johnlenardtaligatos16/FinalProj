<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tattoo Upload</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
    <style>
        .upload_form {
            padding: 50px;
            border: 1px solid red;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            background-color: #000;
        }

        .upload_form form label {
            display: block;
            margin-top: 10px;
        }

        .upload_form form input[type="text"],
        .upload_form form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        .upload_form form button {
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <?php
    session_start();
    include "header.php";
    require "db_conn.php";
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="upload_form">
            <center>
                <h1>Upload File in Piercing</h1>
                <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name" required> <br>
                    <label for="image">Image : </label>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"> <br> <br>
                    <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                </form>
                <?php
                if ($dbConn->connect_error) {
                    die("Connection failed: " . $dbConn->connect_error);
                }

                if (isset($_POST["submit"])) {
                    $name = $_POST["name"];
                    if ($_FILES["image"]["error"] == 4) {
                        echo
                        "<script> alert('Image Does Not Exist'); </script>";
                    } else {
                        $fileName = $_FILES["image"]["name"];
                        $fileSize = $_FILES["image"]["size"];
                        $tmpName = $_FILES["image"]["tmp_name"];

                        $validImageExtension = ['jpg', 'jpeg', 'png'];
                        $imageExtension = explode('.', $fileName);
                        $imageExtension = strtolower(end($imageExtension));
                        if (!in_array($imageExtension, $validImageExtension)) {
                            echo
                            "
            <script>
              alert('Invalid Image Extension');
            </script>
            ";
                        } else if ($fileSize > 1000000) {
                            echo
                            "
            <script>
              alert('Image Size Is Too Large');
            </script>
            ";
                        } else {
                            $newImageName = uniqid();
                            $newImageName .= '.' . $imageExtension;

                            move_uploaded_file($tmpName, 'gallery/piercing/' . $newImageName);
                            $query = "INSERT INTO piercing_gallery VALUES('', '$name', '$newImageName')";
                            mysqli_query($dbConn, $query);
                            echo
                            "
            <script>
              alert('Successfully Added');
              document.location.href = 'piercing_upload.php';
            </script>
            ";
                        }
                    }
                }
                ?>
                <br><br>
                <button onclick="history.back()" class="btn btn-secondary btn-back">Go Back</button>
                <a href="piercing_upload_data.php">
                    <button class="btn btn-secondary btn-back">Data</button>
                </a>
            </center>
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
