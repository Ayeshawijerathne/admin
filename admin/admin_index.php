<?php
include('partials/nav.php');

?>

<!-----------contents------>
<body>
	

				<div class="container">
				 
				<h2> DASHBOARD </h2>

<br><br>
				
<?php
if (isset($_SESSION['login']))
{
 echo $_SESSION['login'];
 unset($_SESSION['login']);
}
?>




<br><br>

 
<div class="row" >
				
					<?php

//query to get all categories from database
$sql = "SELECT * FROM service_provider WHERE Active = 'Yes'";

//execute

$res = mysqli_query($conn , $sql);

//count rows

$count = mysqli_num_rows($res);
$sn=1;

//check whether have data in database or not

if($count > 0)
{
  //we have data in db

  //get the data and display

  while ($row = mysqli_fetch_assoc($res))
  {
	  $S_id =  $row ['S_id'];
	  $Type = $row['Type'];
	  $Active = $row['Active'];



	  ?>

<div class="col-4">
	
	<h3> <?php echo $Type ;?></h3>
				
                    
				<br>

				
 <a href="update_category.php?S_id=<?php echo $S_id;?>" class="btn-secondary">Update  </a>
	  
<a href="delete_category.php?S_id=<?php echo $S_id;?>" class="btn-danger"> Delete   </a>
	 
 
</div>


	  <?php
	  
  }
}
else {
  //don't have data
  //display msg inside the table
  echo "<div class='error'>Category not found</div>";
}

  ?>







				


</div>

</div>
				
				

				</body>




    
    


				<?php
include('partials/footer.php');

?>