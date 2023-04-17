<?php
//Authorization

//check whether the user is logged in or not

if (isset($_SESSION['user'])) //not set
{
   //user is not logged in
   //redirect to login page
   $_SESSION['no-login'] = "<div class ='error'> Please login to access Admin panel</div>";
   header("location:".SITEURL.'admin/login.php');
}


?>
