<?php
include("../db_connect.php");
$sql = "SELECT * FROM product_requests";
$result = $conn->query($sql);
$total_product_request = $result->num_rows;
echo '
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/admin.css">

  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
  <link rel="stylesheet" href="../styles/admin.css">
</head>
'
?>
