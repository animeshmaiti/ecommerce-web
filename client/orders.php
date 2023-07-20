<?php 
include_once 'authguard.php';
include_once '../shared/connection.php';
$userid = $_SESSION['userid'];

$query = "INSERT INTO `orders` (userid, pid,seller_id) SELECT `userid`, `pid`, `seller_id` FROM `cart` WHERE `userid`=$userid";
$result = mysqli_query($conn, $query);

if ($result) {
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