<?php
include('partials/nav.php');
?>


<div class="container">
    <div class="wrapper">
        <h2>  Update Category</h2>

        <br><br>


<?php
//check id is set or not

if (isset($_GET['S_id'])) 
{
    //get details
    //echo "get data";
    $S_id = $_GET['S_id'];
    $sql = "SELECT * FROM service_provider WHERE S_id=$S_id";

    $res = mysqli_query($conn ,$sql);


    //check whether the id is valid or not

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //get data
        $row = mysqli_fetch_assoc($res);
        $Name = $row['Name'];
        $Type = $row['Type'];
        $Active = $row['Active'];
    }
    else {
        //redirect
        $_SESSION['cat-not-found'] = "<div class='error'> Failed  </div>";
        
        header("location:" .SITEURL."admin/admin_categories.php");
    }
    
}
else {
    //redirect
    header("location:".SITEURL.'admin/admin_categories.php');
}



?>



        

        <form action="" method="POST" enctype = "multipart/form-data">
            <table class="table2">

        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="Name" value="<?php echo $Name; ?>">
            </td>
        </tr>

        <tr>
            <td>Type</td>
            <td>
                <input type="text" name="Type" value="<?php echo $Type; ?>">
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
            <td colspan="2">
                <input type="hidden" name ="S_id" value="<?php echo $S_id ?>">
                <input type="submit" name="submit" value="Update Category" class="btn-secondary">
            </td>
        </tr>
        </table>

</form>


        <?php
       
       if (isset($_POST['submit']))
   {
               //update db
               $sql2 = "UPDATE service_provider SET
               Name = '$Name',
               Type = '$Type',
              Active  = '$Active'

               WHERE S_id=$S_id
               ";

               //execute

               $res2 = mysqli_query($conn ,$sql2);

               //redirect

               //check executed or not
               if ($res2 == TRUE) 
               {
                   //category updated
                   $_SESSION['update'] = "<div class='success'>Updated</div>";
                   header("location:".SITEURL.'admin/admin_categories.php');
               }
               else {
                   //failed to update
                   $_SESSION['update'] = "<div class='success'> Failed Update</div>";
                   header("location:".SITEURL.'admin/admin_categories.php');
               }


           }
           
              


?>
    



        

    </div>
</div>




<?php
include('partials/footer.php');
?>