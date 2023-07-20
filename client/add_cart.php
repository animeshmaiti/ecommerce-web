<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";
    $pid = $_GET['pid'];
    $seller_id = $_GET['seller_id'];

    $userid = $_SESSION['userid'];
    $query = "INSERT INTO `cart` (`pid`, `userid`,`seller_id`) VALUES ($pid,$userid,$seller_id)";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: home.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>
