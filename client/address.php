<?php
include_once "authguard.php";
include_once "../shared/connection.php";
include "menu.php";
$userid = $_SESSION['userid'];
$query = "SELECT * FROM `address` WHERE userid=$userid";
$result = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Addresses</title>
    <style>
        .col {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .card {
            margin: 5px 20px;
        }
    </style>
</head>

<body>
    <div class="col">
        <?php
        // print_r($result);
        // exit();
        if ($result) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 0) {
                echo "<div class='col-12 text-center'>
                <h3> You have not set any addresses <a href='address_form.php'>Add address</a></h3>
                </div>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Addresses</h1>
                </div>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $address_id = $row['address_id'];
                    $title = $row['title'];
                    $state = $row['state'];
                    $city = $row['city'];
                    $landmark = $row['landmark'];
                    $pin_code = $row['pin_code'];
                    $contact = $row['contact'];
                    echo " 
                    <div class='card'>
                    <h5 class='card-header'>$title</h5>
                    <div class='card-body'>
                        <p class='card-text'>$state</p>
                        <p class='card-text'>$city,$landmark</p>
                        <p class='card-text'>$pin_code</p>
                        <p class='card-text'>$contact</p>
                        <a href='remove_address.php?address_id=$address_id' class='btn btn-danger'>Delete Address</a>
                        <a href='#' class='btn btn-danger'>Edit Address</a>
                    </div>
                    </div>";
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
        <!-- <div class="d-flex justify-content-center" >
            <a class='btn btn-primary' href="address_form.php" style="width: fit-content;">Add Address</a>
        </div> -->
    </div>
</body>

</html>