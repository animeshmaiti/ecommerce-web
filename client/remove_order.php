<?php
include_once "authguard.php";
include_once "../shared/connection.php";

$userid = $_SESSION['userid'];
$orderid=$_GET['orderid'];
print_r($orderid);
print_r($userid);
$query="DELETE FROM `orders` WHERE `orderid`=$orderid AND `userid`=$userid";
$result=mysqli_query($conn,$query);
if($result){
    header("Location: view_orders.php");
}else{
    echo "Error: " . mysqli_error($conn);
}
?>