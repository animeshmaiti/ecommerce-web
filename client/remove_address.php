<?php
include_once "authguard.php";
include_once "../shared/connection.php";
$address_id = $_GET['address_id'];
$query = "DELETE FROM `addresses` WHERE `address_id`=$address_id";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location: address.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>