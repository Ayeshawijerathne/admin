<?php

include('../congif/constraints.php');
//echo "Delete Page";

//check whether the id and image name is set or not

if (isset($_GET['S_id']) ) 
{
    //get the value and delete
    //echo "get value and delete";
    
    $S_id = $_GET['S_id'];
    


    


    // delete from db 

    $sql = "DELETE FROM service_provider WHERE S_id=$S_id";

    //execute
    $res = mysqli_query($conn,$sql);

    //check

    if ($res==TRUE) {
        //success and redirect

        $_SESSION['delete'] = "<div class='success'>Category deleted</div>";
        header("location:".SITEURL."admin/admin_categories.php");


    }
    else {
        //error and redirect
        $_SESSION['delete'] = "<div class='error'> Failed to delete category </div>";
        header("location:".SITEURL."admin/admin_categories.php");
    }


    




}
else {
    //redirect
    header("location:".SITEURL."admin/admin_categories.php");

}

?>