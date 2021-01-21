<?php
session_start();
include("../db_connect.php");

$errors = array();

// connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        $record_id = $_GET["id"];
        $query = "DELETE FROM technologies WHERE id=$record_id";
        mysqli_query($db, $query);
    
        $_SESSION['message'] = "Record deleted successfully";
        header('location: technologies.php');
        die();
    }
}

// receive all input values from the form
$name = mysqli_real_escape_string($db, $_POST['name']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$registered_date = $_POST['registered_date'];

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($name)) { array_push($errors, "Name is required"); }
if (empty($description)) { array_push($errors, "Description is required"); }
if (empty($registered_date)) { array_push($errors, "Date is required"); }
if ($_FILES['image']['name'] == "" && $_POST["action"] == "add")
{
    array_push($errors, "Image is required");
}

$path = $_FILES['image']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$uploaddir = dirname(__FILE__).'/../images/';
$file_name = uniqid().'.'.$ext;
$uploadfile = $uploaddir . $file_name;



// Finally, register company if there are no errors in the form
if (count($errors) == 0) {
    switch ($_POST["action"]) {
        case 'add':
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                $query = "INSERT INTO technologies (name, description, registered_date, image, user_id)  VALUES('$name', '$description', '$registered_date', '$file_name', 1)";
                mysqli_query($db, $query);
            
                $_SESSION['message'] = "Record added successfully";
                header('location: technologies.php');
            }
            break;
        case 'edit':
            $record_id = $_POST["record_id"];
            if($_FILES['image']['name'] != "" ){
         
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $query = "UPDATE technologies SET name='$name',description='$description',registered_date='$registered_date', image='$file_name',user_id=1 WHERE id=$record_id";
                    mysqli_query($db, $query);
                
                    $_SESSION['message'] = "Record updated successfully";
                    header('location: technologies.php');
                }
            }else{
                $query = "UPDATE technologies SET name='$name',description='$description',registered_date='$registered_date',user_id=1 WHERE id=$record_id";
                mysqli_query($db, $query);
            
                $_SESSION['message'] = "Record Updated successfully";
                header('location: technologies.php');
            }

        default:
            # code...
            break;
    }
  
}else{
  $_SESSION['errors'] = $errors;
  header('location: technologies.php');
}

?>
