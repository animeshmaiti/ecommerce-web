<?php
include_once "authguard.php";
include "menu.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Welcome to vendor home page</h1>
            </div>
        </div>
        <div class="toast-container bottom-0 end-0 p-3">
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade show bg-success bg-opacity-50" data-bs-autohide="false">
                <div class="toast-header text-bg-success">
                    <strong class="me-auto">Login Success</strong>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    hello, <span id="username"></span>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to retrieve the username from the query parameter
        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Get the username from the query parameter and display it
        window.addEventListener('DOMContentLoaded', (event) => {
            const username = getQueryParam('username');
            if (username) {
                const usernameElement = document.getElementById('username');
                usernameElement.textContent = username;
            }
        });
    </script>
</body>

</html>