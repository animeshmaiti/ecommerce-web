<?php 
include_once 'authguard.php';
include_once '../shared/connection.php';
$userid = $_SESSION['userid'];
print_r($userid);

// $query = "INSERT INTO `orders` (userid, pid,seller_id) SELECT `userid`, `pid`, `seller_id` FROM `cart` WHERE `userid`=$userid";
// $result = mysqli_query($conn, $query);

$address_query = "SELECT `address_id` FROM `addresses` WHERE `userid`=$userid";
$address_result = mysqli_query($conn, $address_query);
if (mysqli_num_rows($address_result) == 0) {
    header("Location: address_form.php");
}
$address_row = mysqli_fetch_assoc($address_result);
$address_id = $address_row['address_id'];
// print_r($address_id);
$update_query = "UPDATE `orders` SET `address_id`=$address_id WHERE `userid`=$userid";
$update_table = mysqli_query($conn, $update_query);

if ($result && $update_table) {
    $delete_query = "DELETE FROM `cart` WHERE `userid`=$userid";
    $deleted_result = mysqli_query($conn, $delete_query);
    if ($deleted_result) {
        header("Location: view_orders.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>