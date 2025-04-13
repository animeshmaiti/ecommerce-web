<?php
include_once "authguard.php";
include_once "../shared/connection.php";

$userid = $_SESSION['userid'];
$title = $_POST['title'];
$name= $_POST['name'];
$state = $_POST['state'];
$city = $_POST['city'];
$landmark = $_POST['landmark'];
$pin_code = $_POST['pin_code'];
$contact = $_POST['contact'];

$query = "INSERT INTO `address`(`userid`,`name`, `title`, `state`, `city`, `landmark`, `pin_code`, `contact`) VALUES ($userid,'$name','$title','$state','$city','$landmark',$pin_code,'$contact')";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location: address.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>