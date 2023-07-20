<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";
    $pid = $_GET['pid'];
    $userid = $_SESSION['userid'];
    
    $cartid = $_GET['cartid'];
    $query = "INSERT INTO `wishlist`(`cartid`,`pid`, `userid`) VALUES ($cartid,$pid,$userid)";
    $result = mysqli_query($conn, $query);
    $query2 = "DELETE FROM `cart` WHERE `cartid`=$cartid";
    mysqli_query($conn, $query2);
    if ($result) {
        header("Location: view_cart.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>