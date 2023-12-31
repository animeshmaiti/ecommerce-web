<?php
include_once "authguard.php";
include "view_product.php"
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
        <form action="upload_product.php" required method="post" enctype="multipart/form-data">
            <input type="text" required placeholder="Product Name" name="product_name" class="form-control">
            <input type="number" required step="0.01" placeholder="Product Price" name="price" class="form-control mt-2">
            <textarea name="details" required cols="30" rows="5" placeholder="Product description..." class="form-control mt-2" style="resize: none;"></textarea>
            <input type="file" required name="img_path" class="form-control mt-2">
            <div class="text-center">
                <button class="btn btn-warning mt-3">Upload</button>
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