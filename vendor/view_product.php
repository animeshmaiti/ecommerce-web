<?php
include_once "authguard.php";
include "menu.php";
include_once "../shared/connection.php";

$userid = $_SESSION['userid'];

$query = "SELECT * FROM `product` WHERE `uploaded_by`=$userid";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Products</title>
    <style>
        .col {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="col">
        <?php
        if ($result) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 0) {
                echo "<h1 class='text-center'>No Products Found</h1>";
            } else {
                echo "
                <div class='col-12 text-center'>
                <h1>Products</h1>
                </div>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $price = $row['price'];
                    $details = $row['details'];
                    $imgpath = $row['imgpath'];
                    $pid = $row['pid'];
                    echo " 
                    <div class='card' style='width: 18rem;'>
                        <img src='$imgpath' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rs. $price</p>
                            <p class='card-text'>$details</p>
                            <a href='edit_form.php?pid=$pid' class='btn btn-primary'>Edit</a>
                            <a href='delete_product.php?pid=$pid' class='btn btn-danger'>Delete</a>
                        </div>
                        </div>";
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </div>
</body>

<body>

    <script>
        function confirmDelete(pid) {
            res = confirm("Are you sure want to delete Product=" + pid);
            if (res) {
                window.location = `deletepdt.php?pid=${pid}`;
            }
        }
    </script>
</body>

</html>