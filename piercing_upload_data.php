<?php
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Piercing Upload</title>
    <link rel="icon" type="image/x-icon" href="image/toxzlogo.png">
    <style>
        table, tr, td {
            font-size: 22px;
        }

        td {
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "header.php";
    ?>
    <div style="padding-top: 10%; max-width: fit-content;
            margin-inline: auto;">
        <table border=1 cellspacing=0 cellpadding=10>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Image</td>
            </tr>
            <?php
            $i = 1;
            $rows = mysqli_query($dbConn, "SELECT * FROM piercing_gallery ORDER BY p_id DESC")
            ?>

            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["p_name"]; ?></td>
                    <td> <img src="gallery/piercing/<?php echo $row["p_img"]; ?>" width=200 title="<?php echo $row['p_img']; ?>"> </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <button onclick="history.back()" class="btn btn-secondary btn-back mr-4">Go Back</button>
        <button class="btn btn-secondary btn-back mr-4">
            <a href="piercing_upload.php">Upload Image File</a>
        </button>
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