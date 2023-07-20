<?php
include_once "authguard.php";
include "address.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #addressFormContainer {
            width: 400px;
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
    <div id="addressFormContainer" style="display: block;">
        <h3>Add new address</h3>
        <form action="entry_address.php" method="post">
        <input type="text" required placeholder="Address Title" name="title" class="form-control mt-2">
        <input type="text" required placeholder="State" name="state" class="form-control mt-2">
        <input type="text" required placeholder="City" name="city" class="form-control mt-2">
        <input type="text" required placeholder="Landmark" name="landmark" class="form-control mt-2">
        <input type="number" required placeholder="Pin code/Area code" name="pin_code" class="form-control mt-2">
        <input type="text" required placeholder="Contact" name="contact" class="form-control mt-2">
            <div class="text-center">
                <button class="btn btn-warning mt-3">Add</button>
            </div>
        </form>
    </div>
    <script>
      document.addEventListener("click", function(event) {
        var form = document.getElementById("addressFormContainer");
        if (!form.contains(event.target)) {
          // Redirect to another page
          form.style.display = "none";
        }
      });
    </script>
</body>

</html>