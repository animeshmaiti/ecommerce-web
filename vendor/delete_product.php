<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";

    $pid=$_GET['pid'];
    
    $query="DELETE FROM `product` WHERE `pid`=$pid";
    $result=mysqli_query($conn,$query);
    if($result){
        header("Location: view_product.php");
    }else{
        echo "Error: ".mysqli_error($conn);
    }
?>