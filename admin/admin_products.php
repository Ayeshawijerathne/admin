<?php
include('partials/nav.php');

?>


<div class="container">
				 
				<h2> Manage Products </h2>



<?php
if (isset($_SESSION['add'])) 
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if (isset($_SESSION['upload'])) 
{
  echo $_SESSION['upload']; // display session message
  unset($_SESSION['upload']); // removing session message
  
}
if (isset($_SESSION['delete'])) 
{
  echo $_SESSION['delete']; // display session message
  unset($_SESSION['delete']); // removing session message
  
}
if (isset($_SESSION['unauthorize'])) 
{
  echo $_SESSION['unauthorize']; // display session message
  unset($_SESSION['unauthorize']); // removing session message
  
}
if (isset($_SESSION['cat-not-found'])) 
{
  echo $_SESSION['cat-not-found']; // display session message
  unset($_SESSION['cat-not-found']); // removing session message
  
}
?>
<br><br>

<!---- Add Products---->
<br>
  <br>
  
        <a href=" add_products.php" class="btn-primary"> Add Products </a>
                
        <br>
        <br>
        <br>
        

                <table class="table">
                    <tr>
                        <th> P_id </th>
                        <th> Name</th>
                        <th> Description </th>
                        <th> Image</th>
                        <th> Price </th>
                        <th> Active</th>
                    </tr>

                    




                    <?php
                    $sql = "SELECT * FROM products";

                    $res = mysqli_query($conn, $sql);


                    $count = mysqli_num_rows($res);


                    $sn = 1;

                    if ($count >0) 
                    {
                     //have product in db

                     //get from db and display
                     while ($row = mysqli_fetch_assoc($res)) 
                     {
                        $P_id = $row['P_id'];
                        $Name = $row['Name'];
                        $description = $row['description'];
                       
                        $image_name = $row['image_name'];
                        $Price = $row['Price'];
                        $active = $row['active'];
                        ?>

                        <tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $Name;?></td>
                        <td> <?php echo $description;?></td>
                        
                        <td><?php 
                        
                                if ($image_name =="") 
                                {
                                    echo "<div class='error'>Image not added </div>";
                                }
                                else 
                                {
                                   ?>
                                   
                                   <img src="<?php echo SITEURL;?>images/product/<?php echo $image_name;?>" width = "100px">
                                   <?php
                                }
                       
                            ?> 
                        </td>
                        <td><?php echo $Price;?></td>
                        <td><?php echo $active;?></td>
                        
						
						<td>
                        <a href="<?php echo SITEURL;?>admin/update_product.php?P_id = <?php echo $P_id;?>" class="btn-secondary"> update </a>
                            
                        <a href="<?php echo SITEURL;?>admin/delete_product.php?P_id = <?php echo $P_id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">  Delete </a>
                        </td>
                    </tr>

                        <?php
                     }
                    }
                    else 
                    {
                        // do not in db

                        echo "<tr> <td colspan ='8' class = 'error'> Not added yet</td></tr>";
                    }
                    
                    
                    
                    ?>

                    
                    
                </table>
                </div>
				</div>

                



<?php
include('partials/footer.php');

?>