<?php
include_once "authguard.php";
include_once "../shared/connection.php";
include "menu.php";
$userid = $_SESSION['userid'];
$query = "SELECT * FROM `orders` JOIN `product` ON orders.pid=product.pid JOIN `address` ON orders.address_id=address.address_id WHERE `uploaded_by`=$userid";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Products</title>
    <style>
        .col {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100vw;
        }
        .card {
            margin: 5px;
        }
        .details p{
            margin-bottom: 5px!important;
            text-align: right;
            margin-right: 10px;
        }
        .address{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="col">
        <?php
        if ($result) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 0) {
                echo "<h1 class='text-center'>No Orders</h1>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Orders</h1>
                </div>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $product_name = $row['product_name'];
                    $price = $row['price'];
                    $details = $row['details'];
                    $imgpath = $row['imgpath'];
                    $pid = $row['pid'];

                    $name = $row['name'];
                    $state = $row['state'];
                    $city = $row['city'];
                    $landmark = $row['landmark'];
                    $pin_code = $row['pin_code'];
                    $contact = $row['contact'];

                    echo "<div class='card d-flex flex-row justify-content-between' style='max-width: 100vw;'>
                    <div class='row g-0 w-75'>
                        <div class='col-md-4'>
                            <img src='$imgpath' class='img-fluid rounded-start' alt='...'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>Rs. $price</p>
                                <p class='card-text'>$details</p>
                            </div>
                        </div>
                    </div>
                    <div class='address'>
                        <h5>Address</h5>
                        <div class='d-flex flex-column details'>
                            <p>Deliver To: $name</p>
                            <p>$state</p>
                            <p >$city,$landmark</p>
                            <p >$pin_code</p>
                            <p>$contact</p>
                        </div>
                    </div>
                </div>
                    ";
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </div>
</body>

</html>