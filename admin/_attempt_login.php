<?php
session_start();
include("../db_connect.php");

$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}

if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' limit 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
     $user = mysqli_fetch_assoc($results);
      $_SESSION['user'] = $user;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
        array_push($errors, "Wrong username/password combination");
        $_SESSION['errors'] = $errors;
        header('location: login.php');
    }
}else{
    $_SESSION['errors'] = $errors;
    header('location: login.php');
}