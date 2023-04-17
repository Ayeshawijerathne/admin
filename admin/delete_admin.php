<?php



//include constraints.php
include('../congif/constraints.php');

// get the id of the admin to be deleted
$id = $_GET['id'];

// create sql query to delete admin
$sql = "DELETE FROM admin WHERE id=$id";

// Execute the query 
$res = mysqli_query($conn , $sql);

//check whether the query executed successfully or not

if ($res ==  TRUE) {
   //ADMIN DELETED
   //echo"Admin deleted";
    $_SESSION['delete'] = " <div class = 'success'> Admin deleted successfully. </div>";

    
header("location:".SITEURL.'admin/manage_admin.php');

}
else {
   // echo "FAiled to delete";
   $_SESSION['delete'] = "<div class = 'error'> Failed to delete admin. Try again !</div>";
   header("location:".SITEURL.'admin/manage_admin.php');

}

//redirect to manage admin page with message




?>