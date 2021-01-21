<?php
session_start();
unset($_SESSION['user']);
$_SESSION['success'] = "You are now logged out";
header('location: login.php');