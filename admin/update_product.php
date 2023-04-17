<?php
include('partials/nav.php');

?>





<div class="container">
    <div class="wrapper">
        <h2>Update Product</h2>
<br><br>
<?php
//check id is set or not
if (isset($_GET['P_id'])) {
    //get all details

    $P_id = $_GET['P_id'];

    $sql2= "SELECT * FROM products WHERE P_id=$P_id";

    $res2 = mysqli_query($conn, $sql2);

   
    $row2 = mysqli_fetch_assoc($res2);

   
    $count = mysqli_num_rows($res);

    if($count==1)
    {
    $Name = $row2['Name'];
    $description = $row2['description'];
    $current_image = $row2['image_name'];
    $Price = $row2['Price'];
    $current_type = $row2['S_id'];
    $active = $row2['active'];

}
else {
    //redirect
    $_SESSION['cat-not-found'] = "<div class='error'> Failed  </div>";
    
    header("location:" .SITEURL."admin/admin_products.php");
}
}

else {
    //redirect
    header("location:".SITEURL.'admin/admin_products.php');
}



?>


            <form action="" method="POST" enctype = "multipart/form-data">


                        <table class="table2">

                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="Name" value="<?php echo $Name;?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>
                                    <input type="text" name="description" cols="30" rows ="5" value="<?php echo $description;?>">
                                </td>
                            </tr>


                            <tr>
                                <td>Current image : </td>

                            <td>
                                
                            </td>
                            </tr>


                            <tr>
                                <td>New image :</td>
                                <td>
                                <input type="file" name="image_name" value="">
                                </td>
                            </tr>



                            <tr>
                                <td>Price</td>
                                <td>
                                    <input type="number" name="Price" value="<?php echo $Price;?>">
                                </td>
                            </tr>


                            <tr>
                                <td>Type</td>
                                <td>
                                    <select name="Type">

                                    <?php


                                //code for display category types from db

                                // query to get all active categories

                                $sql = "SELECT * FROM service_provider WHERE Active='Yes'";
                                $res = mysqli_query($conn, $sql);

                                // count rows whether we have categories or not
                                $count = mysqli_num_rows($res);


                                if ($count > 0) 
                                {
                                     //have category

                                while ($row = mysqli_fetch_assoc($res))
                                {
                                     //get the details of category
                                        $P_id = $row['P_id'];
                                        $Type = $row['Type'];

                                        ?>

                                <option value="<?php echo $S_id;?>"> <?php echo $Type; ?> </option>
     
     
                                    <?php
  
                                }
                                }

                                else 
                                {
                                    //do not have category

                                    ?>
                                <option value="0"> No category found. </option>
                                    <?php
                                }


                                    ?>







                                    </select>
                                </td>
                            </tr>
                            

                            <tr>

                                <td>Active</td>
                                <td>
                                    <input  type="radio" name="active" value="Yes"> Yes
        
                                    <input  type="radio" name="active" value="No"> No
                                </td>
                            </tr>

                            <tr>
    
                                <td>
        
                                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                                </td>
                            </tr>






</table>

</from>

    </div>
</div>



<?php
include('partials/footer.php');

?>