<?php
session_start();
include("../db_connect.php");
$errors = array();
// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        $record_id = $_GET["id"];
        $query = "DELETE FROM products WHERE id=$record_id";
        mysqli_query($db, $query);
    
        $_SESSION['message'] = "Record deleted successfully";
        header('location: products.php');
        die();
    }
}

// receive all input values from the form
$name = mysqli_real_escape_string($db, $_POST['name']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$price = $_POST['price'];

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($name)) { array_push($errors, "Name is required"); }
if (empty($description)) { array_push($errors, "Description is required"); }
if (empty($price)) { array_push($errors, "Price is required"); }
if ($_FILES['image']['name'] == "" && $_POST["action"] == "add")
{
    array_push($errors, "Image is required");
}else{
    if(file_exists($uploadfile)) {
        unlink($uploadfile); //remove the file
    }
    
}

$path = $_FILES['image']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$uploaddir = dirname(__FILE__).'/../images/products/';
$file_name = uniqid().'.'.$ext;
$uploadfile = $uploaddir . $file_name;


// Finally, register company if there are no errors in the form
if (count($errors) == 0) {
    switch ($_POST["action"]) {
        case 'add':
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                $query = "INSERT INTO products (name, description, price, image, user_id)  VALUES('$name', '$description', '$price', '$file_name', 1)";
                mysqli_query($db, $query);
            
                $_SESSION['message'] = "Record added successfully";
                header('location: products.php');
            }
            break;
        case 'edit':
            $record_id = $_POST["record_id"];
            if($_FILES['image']['name'] != "" ){
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $query = "UPDATE products SET name='$name',description='$description',price='$price', image='$file_name',user_id=1 WHERE id=$record_id";
                    mysqli_query($db, $query);
                
                    $_SESSION['message'] = "Record updated successfully";
                    header('location: products.php');
                }
            }else{
                $query = "UPDATE products SET name='$name',description='$description',price='$price',user_id=1 WHERE id=$record_id";
                mysqli_query($db, $query);
            
                $_SESSION['message'] = "Record Updated successfully";
                header('location: products.php');
            }
        default:
            # code...
            break;
    }
}else{
  $_SESSION['errors'] = $errors;
  header('location: products.php');
}

?>
