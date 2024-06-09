<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
    <style>
        .upload-card {
            border: 1px solid red;
            border-radius: 10px;
            padding: 35px;
            background-color: #da1e17;
            color: #fff;
            text-align: center;
            margin: 15px 0;
        }

        .upload-card:hover {
            background-color: #1b1b1b;
            color: #da1e17;
            box-shadow: 0 0 10px #ffffff, 0 0 13px #ffffff;
        }

        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 100;
        }

        .nav-link h2 {
            font-size: 2rem;
        }

        @media (min-width: 768px) {
            .nav-link h2 {
                font-size: 3rem;
            }
        }

        @media (min-width: 992px) {
            .nav-link h2 {
                font-size: 4rem;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "header.php";
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
    <br>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="upload-card col-lg-6 col-md-6">
            <a class="nav-link" href="piercing_upload.php" style="color:#fff">
                <h2>Upload in PIERCING</h2>
            </a>
        </div>
        <div class="upload-card col-lg-6 col-md-6 mt-3">
            <a class="nav-link" href="tattoo_upload.php" style="color:#fff">
                <h2>Upload in TATTOO</h2>
            </a>
        </div>
        <button onclick="history.back()" class="btn btn-secondary btn-back mt-5">Go Back</button>
    </div>
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
    <button onclick="topFunction()" id="back-to-top" title="Go to top">Top</button>
    <?php
    include 'footer.php';
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>