<?php
include_once "authguard.php";
include "menu.php";
include_once "../shared/connection.php";
$userid = $_SESSION['userid'];
$query = "SELECT * FROM `product` JOIN `cart` ON product.pid=cart.pid WHERE `userid`=$userid";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <style>
        .cart-container {
            display: flex;
            flex-wrap: wrap;
            flex: 1 0 0;
            /* flex-direction: column; */
        }

        .card {
            margin: 5px;
        }
    </style>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>
<div class='col-12 text-center'>
            <h1>Cart</h1>
        </div>
    <div class="d-flex">
        
        <div class="cart-container">
            <?php
            if ($result) {
                $num_rows = mysqli_num_rows($result);
                if ($num_rows == 0) {
                    $total = 0;
                    echo "<div class='col-12 text-center'>
                <h3>Your cart is empty <a href='home.php'>Add Items</a></h3>
                </div>";
                } else {
                    echo "
                ";
                    $total = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $price = $row['price'];
                        $details = $row['details'];
                        $imgpath = $row['imgpath'];
                        $cartid = $row['cartid'];
                        $pid = $row['pid'];
                        $total += $price;
                        echo " 
                    <div class='card' style='width: 18rem;'>
                        <img src='$imgpath' class='card-img-top' alt=''>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rs. $price</p>
                            <p class='card-text'>$details</p>
                            <a href='removecart.php?cartid=$cartid' class='btn btn-danger'>Remove</a>
                            <a href='addwishlist.php?cartid=$cartid&pid=$pid' class='btn btn-warning'>Move to Wishlist</a>
                        </div>
                        </div>";
                    }
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </div>
        <div class="card" style="width: 18rem; height: fit-content;">
            <div class="card-body">
                <h5 class="card-title">Total: <?php echo $total ?></h5>
                <p class="card-text">You can cancel any order after placed.</p>
                <a href="orders.php" class="btn btn-primary">Place Order</a>
            </div>
        </div>
    </div>
</body>

</html>