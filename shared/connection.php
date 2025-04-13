<?php 
$conn = mysqli_connect("localhost", "root", "", "mydb");
if($conn->connect_error){
    die("Connection failed: ".mysqli_connect_error());
}
?>