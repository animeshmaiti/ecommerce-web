<?php 
include_once 'authguard.php';
include_once '../shared/connection.php';

$userid = $_SESSION['userid'];

// Fetch address ID
$address_query = "SELECT `address_id` FROM `address` WHERE `userid`=$userid";
$address_result = mysqli_query($conn, $address_query);

if (!$address_result) {
    die("Error fetching address: " . mysqli_error($conn));
}

// If user has no address, redirect
if (mysqli_num_rows($address_result) == 0) {
    header("Location: address_form.php");
    exit();
}

// Fetch the address_id BEFORE executing the INSERT query
$address_row = mysqli_fetch_assoc($address_result);
$address_id = $address_row['address_id'];

// Insert into orders
$query = "INSERT INTO `orders` (userid, pid, seller_id,address_id) 
          SELECT `userid`, `pid`, `seller_id`,$address_id FROM `cart` WHERE `userid`=$userid";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error inserting into orders: " . mysqli_error($conn));
}

// Delete cart items if order and update are successful
$delete_query = "DELETE FROM `cart` WHERE `userid`=$userid";
$deleted_result = mysqli_query($conn, $delete_query);

if ($deleted_result) {
    header("Location: view_orders.php");
    exit();
} else {
    die("Error deleting cart items: " . mysqli_error($conn));
}
?>
