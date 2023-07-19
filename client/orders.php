<?php 
include_once 'authguard.php';
include_once '../shared/connection.php';
$userid = $_SESSION['userid'];

$query = "INSERT INTO `orders` (userid, pid) SELECT `userid`, `pid` FROM `cart` WHERE `userid`=$userid";
$result = mysqli_query($conn, $query);

if ($result) {
    $delete_query = "DELETE FROM `cart` WHERE `userid`=$userid";
    $deleted_result = mysqli_query($conn, $delete_query);
    if ($deleted_result) {
        header("Location: vieworders.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>