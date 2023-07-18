<?php
session_start();
unset($_SESSION["login_status"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Log Out Successfully <a href="login.html">Login Again</a></h1>
            </div>
        </div>
        <div class="toast-container bottom-0 end-0 p-3">
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade show bg-success bg-opacity-50" data-bs-autohide="false">
                <div class="toast-header text-bg-success">
                    <strong class="me-auto">Log Out Success</strong>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    securely logout user, <span id="username"></span>
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