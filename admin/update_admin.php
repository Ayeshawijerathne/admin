<?php
include('partials/nav.php');

?>


<div class="container">
  <div class="wrapper">
     <h1> Update admin </h1>
     <br>
     <br>


     <?php
     // get the id of selected admin
     $id = $_GET['id'];



     // create the sql query
     $sql = "SELECT * FROM admin WHERE id=$id";

     //execute the query
     $res = mysqli_query($conn , $sql);

     // check whether the query is executed or not

     if ($res == TRUE) 
     {
       //CHECK THE DATA IS AVAILABLE OR NOT
       $count = mysqli_num_rows($res);
       // Check whether we have admin data or not

       if ($count == 1) 
       {
        //Get the details
        //echo "Admin is available";
       
            $row = mysqli_fetch_assoc($res);

            $full_name = $row['full_name'];
            $username = $row['username'];



       }
       else {
        //redirect to manage admin page
        header("location:".SITEURL.'admin/manage_admin.php');

       }
     }
     
     ?>






     <from action=""  method="POST"> 
    
     <table class="table2">
        <tr>
            <td>Full Name</td>
            <td>
                <input type="text" name="full_name" value="<?php echo $full_name ?>">
            </td>

        </tr>
    
        <tr>
            <td>User Name</td>
            <td>
                <input type="text" name="username" value="<?php echo $username ?>">
            </td>

        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name ="id" value="<?php echo $id ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
            </td>
        </tr>
    
    
    </table>

    
    
    
    </form>

  </div>

</div>

<?php
    //check whether the submit btn is clicked or not

    if (isset($_POST['submit']))
    {
      echo "clicked";
        
       // get all values from form to update
       echo $id = $_POST['id'];
       echo $full_name = $_POST['full_name'];
      echo $username = $_POST['username'];
    
    //sql query to update admin
    $sql = "UPDATE admin SET
    full_name='$full_name',
    username='$username' 
    WHRER id=$id
    ";

    //execute the query

    $res =mysqli_query($conn, $sql);

    // check executed or not
    if ($res == TRUE) {
        //updated
        $_SESSION['update'] = "<div class='success' > Admin updated successfully.</div>";
        //redirect
        header("location:".SITEURL.'admin/manage_admin.php');
    }
    else {
        //not updated
        $_SESSION['update'] = "<div class='error' > Failed to update admin.</div>";
        //redirect
        header("location:".SITEURL.'admin/manage_admin.php');
    }
}




?>




<?php
include('partials/footer.php');

?>


