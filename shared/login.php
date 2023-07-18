<?php
// print_r($_POST);
session_start();
$_SESSION["login_status"] = false;
$username = $_POST['username'];
$password = $_POST['password'];

$enc_pass = md5($password);
include_once "connection.php";

$sql = "SELECT * FROM user WHERE username='$username' AND password='$enc_pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: failed.html?username=" . urlencode($username));
    die;

} else {

    $_SESSION["login_status"]=true;

    $row = mysqli_fetch_assoc($result);
    
    $user_type = $row['user_type'];
    $userid=$row['userid'];
    $username=$row['username'];
    
    $_SESSION["user_type"]=$user_type;
    $_SESSION["userid"]=$userid;
    $_SESSION["username"]=$username;

    if($user_type=="vendor"){
        header("Location: ../vendor/vendor.php?username=" . urlencode($username));
    }
    else if($user_type=="customer"){
        header("Location: ../client/home.php?username=" . urlencode($username));
    }
    else if($user_type=="admin"){
        header("Location: ../admin/admin.php?username=" . urlencode($username));
    }
    // if you have a username value of "John Doe" and you pass it through urlencode(),
    // it will be encoded as "John%20Doe". The space character is replaced with "%20" because
    //  spaces are not allowed in URLs.
    // By using urlencode() on data that is being passed in URLs, you ensure that special characters,
    // such as spaces, ampersands, or question marks, are properly encoded and don't interfere with
    // the URL structure.
}
