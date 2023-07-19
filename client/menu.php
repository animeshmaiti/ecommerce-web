<?php
include_once "authguard.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e0d9d9;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">For You</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Grocery</a></li>
                            <li><a class="dropdown-item" href="#">Fashion</a></li>
                            <li><a class="dropdown-item" href="#">Electronics</a></li>
                            <li><a class="dropdown-item" href="#">Food</a></li>
                            <li><a class="dropdown-item" href="#">Medicine</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cart
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="viewcart.php">Your cart</a></li>
                            <li><a class="dropdown-item" href="wishlist.php">Your wishlist</a></li>
                            <li><a class="dropdown-item" href="#">Groceries</a></li>
                            <li><a class="dropdown-item" href="#">Medicine</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Suggestions</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vieworders.php">Orders</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><?php echo "hello, $username" ?></a></li>
                            <li><a class="dropdown-item" href="#"><?php echo "userId, $userid" ?></a></li>
                            <li><a class="dropdown-item" href="#"><?php echo "userType, $user_type" ?></a></li>
                            <li><a class="dropdown-item" href="address.php">Addresses</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="../shared/logout.php">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-primary" type="submit">Logout</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>