<?php
include('partials/nav.php');


?>
 <div class="container">
    <div class="wrapper">
        <h2>Add Category</h2>

        <br><br>





        <?php
        
       
  
  if (isset($_SESSION['add'])) 
  {
    echo $_SESSION['add']; // display session message
    unset($_SESSION['add']); // removing session message
    
  }
        
        
        
        
        ?>


<br><br>

        <!-----Add categories------>

        <form action="" method="POST" enctype= "multipart/form-data">
            <table class = "table2">
                <tr>
                    <td> Name :</td>

                    <td><input type="text" name="Name" placeholder="Add Category Name"></td>
                    
                </tr>

                <tr>
                    <td> Type :</td>

                    <td><input type="text" name="Type" placeholder="Add Type "></td>
                    
                </tr>

               


                
                    <td> Active :</td>

                    <td>
                        <input type="radio" name="Active" value="Yes"> Yes
                        <input type="radio" name="Active" value="No"> No
                
                </td>
                    
                </tr>

                <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
              
            </tr>

                

            </table>




        </form>



        <?php
            //check whether the submit btn is clicked or not

            if (isset($_POST['submit'])) 
            {
                //echo "Clicked";


                //get the value from form
                $Name = $_POST['Name'];
                

                //for active check whether it clicked or not

                if (isset($_POST['Active']))
                {
                    //kget the value from form
                    $Active = $_POST['Active'];
                }
                else {
                    //set the default value

                    $Active = "No";
                }


                //print_r($_FILES['image']);
                //die();






             
            


                //sql quert to insertdata into database

                $sql= "INSERT INTO service_provider SET 
                Name = '$Name',
                Type = '$Type'
              
                Active = '$Active'
                ";




                //Execute the query
                $res = mysqli_query($conn, $sql);

                //query is executed or not

                if ($res == TRUE) {
                    //executed and added
                    $_SESSION['add'] = "<div class = 'success'> Added Successfully </div>";
                    header("location:".SITEURL.'admin/admin_categories.php');
                }
                else {
                    //failed to add
                    
                     $_SESSION['add'] = "<div class = 'error'> Failed to add. </div>";
                     header("location:".SITEURL.'add_category.php');
                }


            }
        
        ?>
  

    </div>

</div>






<?php
include('partials/footer.php');

?>



