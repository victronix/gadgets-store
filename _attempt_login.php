<?php
session_start();
include("./db_connect.php");

$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);
// Login credentials
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
// Validate required parameters
if (empty($email)) {
    array_push($errors, "Username is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}
// Check if there are any errors
if (count($errors) == 0) {
    $password = md5($password); // Hash Password
    // Find Company using credentials
    $query = "SELECT * FROM companies WHERE email='$email' AND password='$password' limit 1"; 
    $results = mysqli_query($db, $query);
    // Checking if any results where returned
    if (mysqli_num_rows($results) == 1) {
     $company = mysqli_fetch_assoc($results);
      $_SESSION['company'] = $company;
      $_SESSION['success'] = "You are now logged in";
      header('location: products.php');
    }else {
        // Otherwise add to error array
        array_push($errors, "Wrong email/password combination");
        // Set error session
        $_SESSION['errors'] = $errors;
        // Redirect
        header('location: login.php');
    }
}else{
    // Set error session
    $_SESSION['errors'] = $errors;
    // Redirect
    header('location: login.php');
}