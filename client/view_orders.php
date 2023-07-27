<?php
    include_once "authguard.php";
    include "menu.php";
    include_once "../shared/connection.php";
    $userid = $_SESSION['userid'];

    $query = "SELECT * FROM `product` JOIN `orders` ON product.pid=orders.pid WHERE userid=$userid";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <style>
        .col {
            display: flex;
            flex-wrap: wrap;
        }
        .card {
            margin: 5px;
        }
    </style>
</head>

<body>
<div class="col">
        <?php
        if ($result) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 0) {
                echo "<div class='col-12 text-center'>
                <h3> You have not placed any order <a href='view_cart.php'>Order item</a></h3>
                </div>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Orders</h1>
                </div>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['product_name'];
                    $price = $row['price'];
                    $details = $row['details'];
                    $imgpath = $row['imgpath'];
                    $orderid = $row['orderid'];
                    echo " 
                    <div class='card' style='width: 18rem;'>
                        <img src='$imgpath' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rs. $price</p>
                            <p class='card-text'>$details</p>
                            <a href='remove_order.php?orderid=$orderid' class='btn btn-danger'>Cancel Order</a>
                        </div>
                        </div>";
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </div>
</body>
</html>