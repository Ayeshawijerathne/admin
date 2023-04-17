<?php
include('partials/nav.php');

?>



<div class="container ">


<h2> Manage cart</h2>

<!---- Add Admin---->

                
        <br>
        <br>
        <br>
        

                <table class="table">
                    <tr>
                        <th> ID </th>
                        <th> Items</th>
                        <th> Total</th>
                        <th> Address</th>
                        <th>Contact Details</th>
                        <th> Payment Method</th>
                        <th> Actions</th>
                    </tr>


                    
                    <?php
                    $sql = "SELECT * FROM cart";

                    $res = mysqli_query($conn, $sql);


                    $count = mysqli_num_rows($res);


                    $sn = 1;

                    if ($count >0) 
                    {
                     //have product in db

                     //get from db and display
                     while ($row = mysqli_fetch_assoc($res)) 
                     {
                        $C_id = $row['C_id'];
                        $Items = $row['Items'];
                        $total = $row['total'];
                        $address = $row['address'];
                        $contact_Details = $row['contact_Details'];
                        $payment_method =  $row['paymenr_method'];
                       
                        ?>

                        <tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $Items;?></td>
                        <td> <?php echo $total;?></td>
                        <td> <?php echo $address;?></td>
                        <td> <?php echo $contact_Details;?></td>
                        <td> <?php echo $payment_method;?></td>
                        
                       
        
						
						<td>
                        
                            
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

                












<?php
include('partials/footer.php');

