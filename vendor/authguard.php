<?php
session_start();
// print_r(isset($_SESSION["login_status"]));
if (!isset($_SESSION["login_status"])) { // if you try to redirect the home.php without login
    echo "<div class='text-center'>
    <h3>Unauthorized Attempt <a href='../shared/login.html'>login here</a></h3>
</div>";
    die;
} else if ($_SESSION["login_status"] == false) { // if you give the wrong uname and password and redirect the home.php
    echo "<div class='text-center'>
    <h1>Illegal Attempt for Login <a href='../shared/login.html'>login here</a></h1>
</div>";
    die;
}
if ($_SESSION["user_type"] != "vendor") {
    echo "You are not authorized to access this page";
    die;
}
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$user_type=$_SESSION['user_type'];

?>