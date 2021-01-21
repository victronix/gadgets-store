<?php
session_start();
include("../db_connect.php");

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

  // receive all input values from the form
  $company_id = $_POST['company_id'];
  $product_ids = $_POST['products_ids'];


foreach (json_decode($product_ids) as $product_id) {
    $query = "INSERT INTO product_requests (company_id, product_id) 
    VALUES('$company_id', '$product_id')";
    mysqli_query($db, $query);
}

echo "record_saved"

?>
