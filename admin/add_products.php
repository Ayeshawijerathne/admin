<?php
include('partials/nav.php');

?>

<div class="container">
    <div class="wrapper">
        <h2>Add Product</h2>
<br><br>

<?php
if (isset($_SESSION['upload'])) 
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>


        <form action="" method="POST" enctype= "multipart/form-data">
            <table class = "table2">
                <tr>
                    <td> Name :</td>

                    <td><input type="text" name="Name" placeholder="Add Name"></td>
                    
                </tr>

                
                <tr>
                    <td> Description :</td>

                    <td><textarea name="description" cols="30" rows = "5" placeholder="Add Description with contact details"> </textarea></td>
                    
                </tr>
                
                
                    <td> Select image :</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>Price :</td>
                    <td>
                        <input type="number" name="Price" placeholder="Add Price" >
                    </td>
                </tr>
                
               

                <tr>
                    <td> Type :</td>

                    <td>
                        <select name="Type" >

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
                         $S_id = $row['S_id'];
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
                
                    <td> Active :</td>

                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                
                </td>
                    
                </tr>

                <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                </td>
              
            </tr>

                

            </table>




        </form>


<?php


if (isset($_POST['submit'])) 
            {
                //echo "Clicked";


                //get the value from form
                $Name = $_POST['Name'];
                

                //for active check whether it clicked or not

                if (isset($_POST['active']))
                {
                    //kget the value from form
                    $active = $_POST['active'];
                }
                else {
                    //set the default value

                    $active = "No";
                }
            }
//check whether the btn is clicked or not

if (isset($_POST['submit'])) 
{
    //add product
    //echo "clicked";

    //get data from form

    $Name = $_POST['Name'];
    $description = $_POST['description'];
   
    $Price = $_POST['Price'];
    $active = $_POST['active'];



    
    



    //upload image if selected

    if (isset($_POST['active'])) 
    {
        $Active = $_POST['active'];
    }
    else {
        $active = "No";
    }

    //upload image if selected
    //check whether the image is selected image is clicked or not and upload  the image if the image is selected


    if (isset($_FILES['image']['name'])) 
    {
       //upload the image
       //need image name , source path destination name

       $image_name = $_FILES['image']['name'];


       if($image_name!="")
       {
        //rename the image
        //Auto rename the image
       //get the extension
       $ext = end(explode('.', $image_name));

       $image_name  = "Product_".rand(0000,9999).'.'.$ext;

       }
$source_path = $_FILES['image']['tmp_name'];
$destination_path = "../images/product/".$image_name;


//upload image
       $upload= move_uploaded_file($source_path,$destination_path);
       //upload image if image is selected

//check whether the image is uploaded or not
       //if not redirected
       if($upload==FALSE)
       {
        $_SESSION['upload']="<div class='error'> Failed to upload image.<div>";
        header("location:".SITEURL."admin/add_products.php");

        //stop the process
        die();
       }

    
}
else {
    //don't upload the image
    $image_name="";
}


    //insert into db

    //sql query

    $sql2 = "INSERT INTO products SET
    Name = '$Name',
    description = '$description',
    image_name = '$image_name',
    Price = $Price,
    S_id = '$S_id',
    active = '$active'
    
    ";


    $res2 = mysqli_query($conn, $sql2);

    if ($res2 == TRUE) 
    {
        //data inserted successfully
        $_SESSION['add'] = "<div class='success'> Product added successfully.</div>";
        header("location:".SITEURL.'admin/admin_products.php');
    }
    else 
    {
        $_SESSION['add'] = "<div class='error'> Failed to add product.</div>";
        header("location:".SITEURL.'admin/admin_products.php');
        
    }

    //redirect

    //




}



?>

    </div>
</div>



<?php
include('partials/footer.php');

?>