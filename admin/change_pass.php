<?php
include('partials/nav.php');

?>
<div class="container">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        
        ?>

        <form action="" method = "POST">
            <table class = "table2">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name = "current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name= " new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name= "submit" value="Change Password"  class="btn-secondary">
                    </td>
                </tr>

            </table>



        </form>






    </div>
</div>


<?php
// check the button is clicked or not

if (isset($_POST['submit']))
 {
   //echo "clicked";


   //get data from form

   $id = $_POST['id'];
   $current_password = md5($_POST['current_password']);
   $new_password = md5($_POST['new_password']);
   $confirm_password = md5($_POST['confirm_password']);


   //check whether the user with current id and password is exists or not

   $sql = "SELECT * FROM admin WHERE id='$id' AND password='$current_password'";

   //execute the query
   $res= mysqli_query($conn, $sql);


   if ($res==TRUE) {
    //check whether the data is available or not
    $count = mysqli_num_rows($res);

    if ($count==1) {
       //user exists
    //echo "user found";
// check whether the new and confirm passwords are equal
if ($new_password == $confirm_password)
{
    //update password
   //echo "pw match";
   $sql2 = "UPDATE admin SET
   password = '$new_password' WHERE id='$id' ";
   $res2 =mysqli_query($conn, $sql2);

   if ($res2==TRUE) {
    $_SESSION['change_pw']= "<div class='success'> Password changed successfully. </div>";
        header("location:".SITEURL.'admin/manage_admin.php');
   }
   else {
    //redirect
    $_SESSION['change_pw']= "<div class='error'> Password is not changed. </div>";
    header("location:".SITEURL.'admin/manage_admin.php');
   }
}
   
     

    
    else {
        //redirect
        $_SESSION['not_match_pw']= "<div class='error'> Password is not matched. </div>";
        header("location:".SITEURL.'admin/manage_admin.php');
    }


    

 }


    else {
        //DNE
        $_SESSION['user_not_found']= "<div class='error'> User not found </div>";
        header("location:".SITEURL.'admin/manage_admin.php');
    }

   }

   // check whether the new and current passwords are equal

  

   //change password if all avove are true

 }

?>




<?php
include('partials/footer.php');

?>