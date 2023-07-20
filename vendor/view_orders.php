<?php
include_once "authguard.php";
include_once "../shared/connection.php";
include "menu.php";
$userid = $_SESSION['userid'];
$query = "SELECT * FROM `orders` JOIN `product` ON orders.pid=product.pid WHERE `uploaded_by`=$userid";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Products</title>
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
                echo "<h1 class='text-center'>No Orders</h1>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Orders</h1>
                </div>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $price = $row['price'];
                    $details = $row['details'];
                    $imgpath = $row['imgpath'];
                    $pid = $row['pid'];

                    echo " 
                    <div class='card' style='width: 18rem;'>
                        <img src='$imgpath' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rs. $price</p>
                            <p class='card-text'>$details</p>
                            <a href='edit_form.php?pid=$pid' class='btn btn-primary'>Edit</a>
                            <a href='delete_product.php?pid=$pid' class='btn btn-danger'>Delete</a>
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