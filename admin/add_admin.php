<?php
include('partials/nav.php');


?>





<div class="container">
    <div class="wrapper">

    <h1> Add Admin</h1>

  <br>

  <?php
  
  if (isset($_SESSION['add'])) 
  {
    echo $_SESSION['add']; // display session message
    unset($_SESSION['add']); // removing session message
    
  }
  
  
  
  ?>


    <form action="" method="POST">
        <table class="table2">
            <tr>
                <td>Full Name</td>
                <td> <input type="text" name="full_name" placeholder=" Enter Your Name"></td>
                 
            </tr>

            <tr>
                <td>User Name</td>
                <td> <input type="text" name=" username" placeholder=" Enter Your User Name"></td>
            </tr>


            <tr>
                <td> Password  </td>
                <td> <input type="password" name="password" placeholder=" Enter Password"></td>
            </tr>

    <br>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
              
            </tr>

        </table>


    </form>

    </div>

</div>






<?php
include('partials/footer.php');

?>





<?php
// Process the value from home and save it in database

//Check whether the submit button is clicked or not

if (isset($_POST['submit']))
{
    //Button clicked 
    //echo "Button Clicked";

    //Get data from form

     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password = md5($_POST['password']);// encrypted password

     // SQL query to save the data in database

     $sql = "INSERT INTO admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
     
     ";    

// Executing and saving data into database
   
$res = mysqli_query($conn , $sql) or die(mysqli_error()); 

// Check whether the (Query is executing or not) data isd ibnserted or not and display appropriate message

if ($res==TRUE){
    // Data inserted
    //echo "Data inserted";
    // Create a session variable to Display message

    $_SESSION['add'] = " Admin added successfully";

    // Redirect page to manage admin
    header("location:".SITEURL.'admin/manage_admin.php');
}

else {
    // Failed to insert data
   // echo "Failed to insert data";

    // Create a session variable to Display message

    $_SESSION['add'] = " Failed to add admin";

    // Redirect page to add admin
    header("location:".SITEURL.'admin/manage_admin.php');

}
  

  } 







  

?>