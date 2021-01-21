<?php
session_start(); // Start new session
unset($_SESSION['company']); // Remove company info from session
$_SESSION['success'] = "You are now logged out";
header('location: index.php'); // Redirect