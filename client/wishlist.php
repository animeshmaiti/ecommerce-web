<?php
    include_once "authguard.php";
    include "menu.php";
    include_once "../shared/connection.php";
    $userid = $_SESSION['userid'];

    $query = "SELECT * FROM `product` JOIN `wishlist` ON product.pid=wishlist.pid WHERE userid=$userid";
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
                <h3>Your wishlist Is empty <a href='home.php'>Add Items</a></h3>
                </div>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Wishlist</h1>
                </div>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['product_name'];
                    $price = $row['price'];
                    $details = $row['details'];
                    $imgpath = $row['imgpath'];
                    $cartid = $row['cartid'];
                    $pid = $row['pid'];
                    $seller_id = $row['uploaded_by'];
                    echo " 
                    <div class='card' style='width: 18rem;'>
                        <img src='$imgpath' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rs. $price</p>
                            <p class='card-text'>$details</p>
                            <a href='remove_wishlist.php?cartid=$cartid' class='btn btn-danger'>Remove</a>
                            <a href='add_cart.php?pid=$pid&seller_id=$seller_id' class='btn btn-warning'>Add To Cart</a>
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