<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type= $_POST['user_type'];
    $enc_pass=md5($password);

    include_once "connection.php";

    $sql = "INSERT INTO user (username, password, user_type) VALUES ('$username', '$enc_pass', '$user_type')";
    $status = mysqli_query($conn, $sql);
    if($status){
        echo "User created successfully";
    }
    else{
        echo "Error creating user";
        mysqli_error($conn);
    }
?>