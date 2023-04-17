<?php

include ('../congif/constraints.php');
////display the session
session_destroy(); // unsets $_Session[user]

//redirect to login page

header("location:".SITEURL.'admin/login.php');

?>