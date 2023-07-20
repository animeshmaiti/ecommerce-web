<?php
include_once "authguard.php";
include "view.php";
$pid=$_GET['pid'];
$query = "SELECT * FROM `product` WHERE `pid`=$pid";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price = $row['price'];
$details = $row['details'];
$imgpath = $row['imgpath'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #uploadFormContainer {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div id="uploadFormContainer" style="display: block;">
        <h3>Add new item</h3>
        <form action="edit_product.php?pid=<?php echo $pid?>" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Product Name" name="name" class="form-control" value=<?php echo $name?>>
            <input type="number" step="0.01" placeholder="Product Price" name="price" class="form-control mt-2" value=<?php echo $price?>>
            <textarea name="details" cols="30" rows="5" placeholder="Product description..." class="form-control mt-2" style="resize: none;"><?php echo $details?></textarea>
            <input type="file" name="img_path" class="form-control mt-2">
            <div class="text-center">
                <button class="btn btn-warning mt-3">Update</button>
            </div>
        </form>
    </div>
    <script>
      document.addEventListener("click", function(event) {
        var form = document.getElementById("uploadFormContainer");
        if (!form.contains(event.target)) {
          // Redirect to another page
          form.style.display = "none";
        }
      });
    </script>
</body>

</html>