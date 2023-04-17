<?php
include('partials/nav.php');


?>


	

				<div class="container">
				 
				<h2>  Manage Categories </h2>

				<br><br>



<?php
        
       
  
  if (isset($_SESSION['add'])) 
  {
    echo $_SESSION['add']; // display session message
    unset($_SESSION['add']); // removing session message
    
  }

  if (isset($_SESSION['remove'])) 
  {
    echo $_SESSION['remove']; // display session message
    unset($_SESSION['remove']); // removing session message
    
  }
  if (isset($_SESSION['delete'])) 
  {
    echo $_SESSION['delete']; // display session message
    unset($_SESSION['delete']); // removing session message
    
  }
  if (isset($_SESSION['update'])) 
  {
    echo $_SESSION['update']; // display session message
    unset($_SESSION['update']); // removing session message
    
  }

  if (isset($_SESSION['upload'])) 
  {
    echo $_SESSION['upload']; // display session message
    unset($_SESSION['upload']); // removing session message
    
  }
  if (isset($_SESSION['failed-remove'])) 
  {
    echo $_SESSION['failed-remove']; // display session message
    unset($_SESSION['failed-remove']); // removing session message
    
  }

        
        
        
 ?>

 <br>


				<a href="add_category.php" class="btn-primary">Add Category</a>

				<br><br>
                <table class="table">
                    <tr>
                        <th> ID </th>
                        <th> Name</th>
						<th> Type</th>
					
                        <th> Active</th>
						<th>Actions</th>
                    </tr>




					<?php

  					//query to get all categories from database
					$sql = "SELECT * FROM service_provider";

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
							$S_id = $row['S_id'];
							$Name = $row['Name'];
							$Type = $row['Type'];
							
							$Active = $row['Active'];



							?>
					<tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $Name;?></td>
                        <td><?php echo $Type;?></td>

						
						<td><?php echo $Active;?></td>
                        <td>
                        <a href="update_category.php?S_id=<?php echo $S_id;?>" class="btn-secondary">Update  </a>
                            
                        <a href="delete_category.php?S_id=<?php echo $S_id;?>" class="btn-danger"> Delete   </a>
                        </td>
                    </tr>


							<?php
							
						}
					}
					else {
						//don't have data
						//display msg inside the table


						?>

						<tr>
							<td colspan = "6">
								<div class="error"> No category added</div>
							</td>
						</tr>

						<?php
					}
					
					
					?>





                    

                    
                    
</table>

				</div>
</div>



<?php
include('partials/footer.php');

?>

				



