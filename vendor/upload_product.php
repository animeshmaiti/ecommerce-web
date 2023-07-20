<?php
    include_once "authguard.php";
    include_once "../shared/connection.php";

    $userid=$_SESSION['userid'];

    $name=$_POST['name'];
    $price=$_POST['price'];
    $details=$_POST['details'];
    // print_r($_FILES['path_img']['tmp_name']);
    $dest_img_path="../shared/img/".$_FILES['img_path']['name'];
    move_uploaded_file($_FILES['img_path']['tmp_name'],$dest_img_path);

    $query="INSERT INTO `product`(`name`, `price`, `details`, `imgpath`,`uploaded_by`) VALUES ('$name',$price,'$details','$dest_img_path','$userid')";
    $result=mysqli_query($conn,$query);
    if($result){
        header("Location: view_product.php");
    }else{
        echo "Error: ".mysqli_error($conn);
    }
?>