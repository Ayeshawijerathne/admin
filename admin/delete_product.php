<?php


include('../congif/constraints.php');
//echo "Delete Page";

//check whether the id and image name is set or not

if (isset($_GET['P_id']) && isset($_GET['image_name'])) 
{

    
    //get the value and delete
    //echo "get value and delete";
    
    $P_id = $_GET['P_id'];
    $image_name = $_GET['image_name'];


    //remove the image 

    if ($image_name!= "") 
    {
       //image is available
       $path= "../images/product/".$image_name;
       $remove = unlink($path);


       if ($remove==FALSE) 
       {
        //set the session msg
        $_SESSION['upload'] = "<div class='error'>Failed to remove image </div>";
        header("location:".SITEURL."admin/admin_products.php");
        die();
       }


    }


    // delete from db 

    $sql = "DELETE FROM products WHERE P_id=$P_id";

    //execute
    $res = mysqli_query($conn,$sql);

    //check

    if ($res==TRUE) {
        //success and redirect

        $_SESSION['delete'] = "<div class='success'>Product deleted</div>";
        header("location:".SITEURL."admin/admin_products.php");


    }
    else {
        //error and redirect
        $_SESSION['delete'] = "<div class='error'> Failed to delete product </div>";
        header("location:".SITEURL."admin/admin_products.php");
    }


    



}
else {
    //redirect
    $_SESSION['unauthorize'] = "<div class='error'> Unauthorized access</div>";
    header("location:".SITEURL."admin/admin_products.php");

}

?>

