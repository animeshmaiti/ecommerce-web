<?php
include "menu.php";
include_once "../shared/connection.php";

$query = "SELECT * FROM `product`";
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
                echo "<h1 class='text-center'>No Products Found</h1>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Home</h1>
                </div>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $price = $row['price'];
                    $details = $row['details'];
                    $imgpath = $row['imgpath'];
                    $pid = $row['pid'];
                    $seller_id = $row['uploaded_by'];
                    echo " 
                    <div class='card' style='width: 18rem;'>
                        <img src='$imgpath' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rs. $price</p>
                            <p class='card-text'>$details</p>
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
    <div class="container">
        <div class="toast-container bottom-0 end-0 p-3">
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade show bg-success bg-opacity-50" data-bs-autohide="false">
                <div class="toast-header text-bg-success">
                    <strong class="me-auto">Login Success</strong>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    hello, <span id="username"></span>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the query parameter from the URL
        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }
        if(getQueryParam('username')==null){
            document.querySelector('.container').style.display = "none";
        }
        // Get the username from the query parameter and display it
        window.addEventListener('DOMContentLoaded', (event) => {
            const username = getQueryParam('username');
            if (username) {
                const usernameElement = document.getElementById('username');
                usernameElement.textContent = username;
            }
        });
    </script>
</body>

</html>