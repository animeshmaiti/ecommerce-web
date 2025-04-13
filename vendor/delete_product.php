<?php
include_once "authguard.php";
include_once "../shared/connection.php";

$pid = $_GET['pid'];

// Fetch image path before deleting the product
$query = "SELECT imgpath FROM product WHERE pid=$pid";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $img_path = $row['imgpath'];

    // Delete the file from shared/img
    if (file_exists($img_path)) {
        unlink($img_path);
    }

    // Delete product from database
    $delete_query = "DELETE FROM product WHERE pid=$pid";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        header("Location: view_product.php");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Product not found!";
}
?>
