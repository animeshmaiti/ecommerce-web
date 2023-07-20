<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";
    $cartid = $_GET['cartid'];

    $query = "DELETE FROM `wishlist` WHERE `cartid`=$cartid";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: wishlist.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>