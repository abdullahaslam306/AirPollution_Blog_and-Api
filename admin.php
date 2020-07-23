<?php include("header.php"); ?>
<?php
		  include '/pages/dbconnect.php';
		  
			 
			  
			  $query = "select * 
			            from data
 						where 1";
						
			  $result = mysqli_query($db,$query);
			  $numrows = mysqli_num_rows($result);
			  
			  if ($numrows > 0){
				 
                 $row = $result->fetch_assoc(); 
        $val=mysqli_real_escape_string($db,$row['dataa']);
         $val2=mysqli_real_escape_string($db,$row['afterread']);

		  
		?>


 <form action="data_b.php" method="POST">
	
<table class="t2">
			  <tr class='contentp'>
			    <td  ><label for="username" >Heading Name</label></td>
				<td  class='contentp'><input type="text" required name="heading" value="<?php echo $row['heading'] ?>"/></td>
			  </tr>
			  <tr class='contentp'>
			    <td  ><label for="username" >FaceBook</label></td>
				<td  class='contentp'><input type="text" required name="fb" value="<?php echo $row['fb'] ?>"/></td>
			  </tr>
			  <tr class='contentp'>
			    <td  ><label for="username" >Linkedin</label></td>
				<td  class='contentp'><input type="text" required name="linked" value="<?php echo $row['linked'] ?>"/></td>
			  </tr>
			  <tr class='contentp'>
			    <td  ><label for="username" >Twitter</label></td>
				<td  class='contentp'><input type="text" required name="twitter" value="<?php echo $row['twitter'] ?>"/></td>
			  </tr>
			  <tr class='contentp'>
			   <td><label for="Email">Landing Video</label></td>
				<td><input type="text" value="<?php echo $row['video'] ?>" required name="video"/></td>
			  </tr>
			  <tr class='contentp'>
			    <td  ><label for="message" >Before Read more</label></td>
				<td  class='contentp'>
					<textarea rows="25" maxlength="900" name="mydata" cols="20" style="width: 400px;">
						<?php echo $val;  ?>
					</textarea>
				</td>
			  </tr>

			   <tr class='contentp'>
			    <td  ><label for="message" >After</label></td>
				<td  class='contentp'>
					<textarea rows="25" maxlength="900" name="mydata2" cols="20" style="width: 400px;">
						<?php echo $val2;  ?>
					</textarea>
				</td>
			  </tr>
			  <tr>
			     <td>
				 </td>



				 <td><input type = "submit" class="example_e" value = "Update" name="" style="height: 50px;"></td>
			  </tr>
			  
		  </div>
		    </table>


</form>
</div>
<?php 
 echo  $row["heading"];
    
    


			  }else{
				 echo "ERROR PAGE DOWN";
			  } ?>
			</div>
<?php include("footer.php") ?>