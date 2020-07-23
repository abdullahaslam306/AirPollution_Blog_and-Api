<?php
include("header.php"); 
 ?>
 <br>
 <div class="col-12" s align="center">
		  <h2 class='contentp' style="font-size: 30px;font-weight: bold;">Air Pollution Contact Us Form</h2>
</div>
 <br>
 <?php
		  include '/pages/dbconnect.php';
		  if(isset($_POST['login'])){
			  
			  
			  $query = "insert into contact values('$_POST[username]','$_POST[Email]','$_POST[msg]') ";
						
						 $results = mysqli_query($db,$query);
				 
			  
			  
			  if ($results){
				 
				  header('location:conatactUs.php?msg=Added');
			  }else{
				  header('location:conatactUs.php?msg=error');
			  }
		  }
		?>


 <form action="" method="POST" >
	
<table class="t2">
			  <tr class='contentp'>
			    <td  ><label for="username" >Username</label></td>
				<td  class='contentp'><input type="text" required name="username" /></td>
			  </tr>
			  <tr class='contentp'>
			   <td><label for="Email">Email</label></td>
				<td><input type="email" required name="Email"/></td>
			  </tr>
			  <tr class='contentp'>
			    <td  ><label for="message" >Message</label></td>
				<td  class='contentp'><textarea rows="4" cols="50" name="msg" placeholder="Message" style="background-color:#abcdef "  required>
					
				</textarea></td>
			  </tr>
			  <tr>
			     <td>
				 </td>



				 <td>
				 	<input type = "submit" class="example_e" value = "Submit" id='submt' name="login" style="height: 50px;" onclick="return popup();" ></a>
				 	</td>
			  </tr>
			  
		  </div>
		    </table>


</form>
<?php 
if(isset($_GET['msg']))
{
  if($_GET['msg']=="Added")
  {
  	 echo "<center><b>Your Message has been recorded</b></center>";

  }
  else{
  	echo "Something went wrong!" . mysqli_error($db);
  }
					
				
					 
}

 ?>

<script type="text/javascript">

 function popup(argument) {
    
    var r=confirm('Do you want to see FAQs?');
    if(r==true)
    {
      window.open("faq.php");
      return false;
    }
    else{
    	 return true;
    
    }
  
 
 }
</script>

</div>
 <?php include("footer.php") ?>