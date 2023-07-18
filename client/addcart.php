<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";
    $pid = $_GET['pid'];
    $userid = $_SESSION['userid'];
    $query = "INSERT INTO `cart`(`pid`, `userid`) VALUES ($pid,$userid)";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: home.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>
