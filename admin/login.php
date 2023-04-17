<?php
include('../congif/constraints.php');
?>


<html>

<head>
    <title >Login</title>
    <link rel="stylesheet"  href="admin_style.css">
</head>

<body>
    <div class="login">
        <h2 class="text-center">LOGIN</h2>
<br>




<?php
if (isset($_SESSION['login']))
{
 echo $_SESSION['login'];
 unset($_SESSION['login']);
}

if (isset($_SESSION['no-login']))
{
 echo $_SESSION['no-login'];
 unset($_SESSION['no-login']);
}
if (isset($_SESSION['user']))
{
 echo $_SESSION['user'];
 unset($_SESSION['user']);
}
  
?>

<br>



<form action="" method="POST">
    User Name :

    <input type="text" name="username" placeholder="Enter User Name">
<br> <br>
    Password :
    <input type="password" name="password" placeholder="Enter Password">
<br> <br>
    <input type="Submit" name="submit" value="Login" class="btn-secondary">
</form>

    </div>
    

</body>


</html>


<?php
//submit btn is clicked or not

if (isset($_POST['submit']))
 {
    //login

    //get data from form
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    //check whether the pw and username is exists or not
    $sql ="SELECT * FROM admin WHERE username='$username' AND password='$password'";
   

    //execute the query
    $res = mysqli_query($conn , $sql);

    //count row sto check whether the user exists or noy
    $count = mysqli_num_rows($res);

    
    

    if ($count == 1)
     {
      //user available
      $_SESSION['login'] = "<div class='success'> Login successfull. </div>";
      $_SESSION['user'] = $username; //to check whether the user is logged out or not and logout will unset it
      header("location:".SITEURL."admin/");

    }

    else {
        //user unavailable and login failed
        $_SESSION['login'] = "<div class='error'> Login unsuccessfull. </div>";
        header("location:".SITEURL.'admin/login.php');
        
    }
   

   
 }


?>




