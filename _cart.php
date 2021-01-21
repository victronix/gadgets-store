<?php
// Database configuration
include("./db_connect.php");
// Include Auxiliary functions
include("./_aux_functions.php");
// Check for action type ie add or edit
if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case 'add':
            // Check for quantity of item default is 1
            if(!empty($_POST["quantity"])) {
                // Find item from database
                $sql = "SELECT * FROM products where id = ".$_GET["product_id"] ." ";
                $queryResult = $conn->query($sql);
                $lastItems = $_SESSION["cart_item"] ? $_SESSION["cart_item"]  : [];
                // Check if any row found
                if ($result = $conn->query($sql)) {
                    while ($row = $result -> fetch_assoc()) {
                        if(!find_key_value($lastItems, "id", $_GET["product_id"])){
                            array_push($lastItems, $row);
                            $_SESSION["cart_item"] = $lastItems;
                        }
                    }
                }

            }
        break;
        case "remove":
            // Checking if cart in session is not empty
            if(!empty($_SESSION["cart_item"])) {
                // Finding product from database
                $sql = "SELECT * FROM products where id = ".$_GET["product_id"] ." ";
                $queryResult = $conn->query($sql);
                $lastItems = $_SESSION["cart_item"] ? $_SESSION["cart_item"]  : [];
                // Return database record
                if ($result = $conn->query($sql)) {
                    while ($row = $result -> fetch_assoc()) {
                        if(find_key_value($lastItems, "id", $_GET["product_id"])){
                            $new_array = remove_array_item($lastItems, "id", $_GET["product_id"]);
                            $_SESSION["cart_item"] = $new_array;
                        }
                    }
                }
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;	
        default:
            # code...
        break;
    }
}
?>