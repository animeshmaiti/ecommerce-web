<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";

    $userid=$_SESSION['userid'];
    $pid=$_GET['pid'];
    // print_r($pid);

    $product_name=$_POST['product_name'];
    $price=$_POST['price'];
    $details=$_POST['details'];
    // print_r($_FILES['img_path']['tmp_name']);
    // print_r($_FILES['img_path']['tmp_name']=="");
    
    if($_FILES['img_path']['product_name']==""){
        $query="UPDATE `product` SET `product_name`='$product_name',`price`=$price,`details`='$details',`uploaded_by`=$userid WHERE `pid`=$pid";
        $result=mysqli_query($conn,$query);
    }else{
        $dest_img_path="../shared/img/".$_FILES['img_path']['product_name'];
        move_uploaded_file($_FILES['img_path']['tmp_name'],$dest_img_path);

        $query="UPDATE `product` SET `product_name`='$product_name',`price`=$price,`details`='$details',`imgpath`='$dest_img_path',`uploaded_by`=$userid WHERE `pid`=$pid";
        $result=mysqli_query($conn,$query);
    }
    
    if($result){
        header("Location: view_product.php");
    }else{
        echo "Error: ".mysqli_error($conn);
    }

?>