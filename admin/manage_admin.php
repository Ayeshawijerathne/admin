
<?php
include('partials/nav.php');

?>

 <!---------- Content Section------>

				<div class="container">
				 
				<h2> Manage Admin </h2>

  <!---- Add Admin---->
  <br>
  <br>



  <?php

  if (isset($_SESSION['add'])) 
  {
    echo $_SESSION['add']; // display session message
    unset($_SESSION['add']); // removing session message
    
  }
  
  if (isset($_SESSION['delete']))
  {
   echo $_SESSION['delete'];
   unset($_SESSION['delete']);
  }
  if (isset($_SESSION['update']))
   {
   echo $_SESSION['update'];
   unset($_SESSION['update']);
  }

  if(isset($_SESSION['user_not_found']))
  {
    echo $_SESSION['user_not_found'];
    unset ($_SESSION['user_not_found']);
  }
  if(isset($_SESSION['not_match_pw']))
  {
    echo $_SESSION['not_match_pw'];
    unset ($_SESSION['not_match_pw']);
  }
  if(isset($_SESSION['change_pw']))
  {
    echo $_SESSION['change_pw'];
    unset ($_SESSION['change_pw']);
  }
  if(isset($_SESSION['cat-not-found']))
  {
    echo $_SESSION['cat-not-found'];
    unset ($_SESSION['cat-not-found']);
  }

  



  ?>
 
  <br>
  <br>



        <a href="add_admin.php" class="btn-primary"> Add Admin </a>
                
        <br>
        <br>
        <br>
        

                <table class="table">
                    <tr>
                        <th> ID </th>
                        <th> Full Name</th>
                        <th> User Name</th>
                        <th> Actions</th>
                    </tr>

<?php
     // Quert to get all admin

    $sql = "SELECT * FROM admin";
                    
     // Execute the query
    $res = mysqli_query($conn , $sql);

     //Check whether the query is executed or not
    
    
     if ($res == TRUE) {

     // COUNT ROWS to check whether we have data in database or not
         $count =  mysqli_num_rows($res); // get all the rows
         $sn = 1;

     // check the number of rows

     if ($count>0) {
        // we have data in database

        while ($rows = mysqli_fetch_assoc($res))
        {
            // to get all the data from the database and run as long as we have data in database


            // get individual data
            $id = $rows['id'];
            $full_name = $rows['full_name'];
            $username = $rows['username'];


            //display the values in table

            ?>


                    <tr>
                        <td> <?php  echo $sn++; ?> </td>
                        <td> <?php echo $full_name; ?>  </td>
                        <td> <?php  echo $username; ?></td>
                        <td>
                        <a href="change_pass.php" class="btn-primary"> Change Password</a>
                        <a href="update_admin.php?id= <?php echo $id; ?>" class="btn-secondary">Update Admin </a>
                        <a href="delete_admin.php?id= <?php echo $id; ?>" class="btn-danger">  Delete Admin </a>
                        </td>
                    </tr>




            <?php
        }
     }
     else {
        // we do not have data in database
     }


                       }
                    
?>

                    
                </table>
                </div>

                

 <?php
include('partials/footer.php');

?>
			


   



    