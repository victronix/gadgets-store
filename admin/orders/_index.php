<?php
include("../db_connect.php");

// Sql query join for products requests
$sql = "
SELECT * FROM 
	product_requests pro_request
LEFT OUTER JOIN (
	SELECT 
    	id,
    	description as product_description,
    	price,
    	image,
    	name as product_name	
    FROM 
    	products
) product on product.id = pro_request.product_id

LEFT OUTER JOIN (
	SELECT
    	id,
    	address_1,
    	address_2,
    	email,
    	city,
    	zip,
    	description as company_description,
    	name as company_name
    FROM
    	companies
) company on company.id = pro_request.company_id
";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="message-row">
            <img width="40px" height="40px" src="../images/products/'.$row["image"].'">
            <span class="sender-name">'.$row["product_name"].'</span></br>
            <span class="message"><span class="label blue-label label-left">'.$row["company_name"].'</span>'.$row["product_description"].'</strong> Consectetur adipiscing elit. Vestibulum tempor feugiat nulla vulputate.</span>
        </div>
        ';
    }
} 
$conn->close();
