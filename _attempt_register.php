<?php
session_start();
include("./db_connect.php");

// initializing variables
$name = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

// Sanitize request parameters
$name = mysqli_real_escape_string($db, $_POST['name']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$address_1 = mysqli_real_escape_string($db, $_POST['address_1']);
$address_2 = mysqli_real_escape_string($db, $_POST['address_2']);
$city = mysqli_real_escape_string($db, $_POST['city']);
$zip = mysqli_real_escape_string($db, $_POST['zip']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($name)) {
  array_push($errors, "name is required");
}
if (empty($email)) {
  array_push($errors, "Email is required");
}
if (empty($password_1)) {
  array_push($errors, "Password is required");
}
if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
}

// first check the database to make sure 
// a company does not already exist with the same name and/or email
$company_check_query = "SELECT * FROM companies WHERE name='$name' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $company_check_query);
$company = mysqli_fetch_assoc($result);

if ($company) { // if company exists
  if ($company['name'] === $name) {
    array_push($errors, "name already exists");
  }

  if ($company['email'] === $email) {
    array_push($errors, "email already exists");
  }
}

// Finally, register company if there are no errors in the form
if (count($errors) == 0) {

  $password = md5($password_1); //encrypt the password before saving in the database

  $query = "INSERT INTO companies (name, description, address_1, address_2, city, zip, email, password) 
  			  VALUES('$name', '$description', '$address_1', '$address_2', '$city', '$zip', '$email', '$password')";
  mysqli_query($db, $query);

  $com_query = "SELECT * FROM companies WHERE email='$email' AND password='$password' limit 1";
  $com_results = mysqli_query($db, $com_query);
  $company_data = mysqli_fetch_assoc($com_results);
  $_SESSION['company'] = $company_data;
  $_SESSION['success'] = "Registered successfully";
  header('location: products.php');
} else {
  $_SESSION['errors'] = $errors;
  header('location: register.php');
}
