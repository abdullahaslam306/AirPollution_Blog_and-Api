<?php include("header.php"); ?>
<?php
		  session_start();
		  $myboolean=true;
		  if(isset($_POST['register'])){
			 include '/pages/dbconnect.php';
			 
			  $username = mysqli_real_escape_string($db,$_POST['username']);
			 
			 $password = mysqli_real_escape_string($db,$_POST['password']);
			 
			 $confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);
			 
			 $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
			 
			 $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
			 
			 $email = mysqli_real_escape_string($db,$_POST['email']);
			 
			 $postaladdress = mysqli_real_escape_string($db,$_POST['postaladdress']);
			 
			 $postalcode = mysqli_real_escape_string($db,$_POST['postalcode']);
			 
			 if (!empty($_POST['country']))
				 $country = mysqli_real_escape_string($db,$_POST['country']);
			 
			  if (!empty($_POST['dob']))
				 $dob = mysqli_real_escape_string($db,$_POST['dob']);
			 
			if (empty($username))
				  $errors[] = "Please enter a Username!";
			
			if (empty($password))
				  $errors[] = "Please enter a Password!";
			 
			 if (strcmp($password,$confirmpassword)!=0)
				  $errors[] = "Password does not match!";
			 
			 if (empty($firstname))
				  $errors[] = "Please enter your Firstname!";
			  
			 if (empty($lastname))
				  $errors[] = "Please enter your Surname!";
			  
			 if (empty($email))
				  $errors[] = "Please enter your Email Address!";
			  
			 if (empty($postaladdress))
				  $errors[] = "Please enter your Address!";
			  
			 if (empty($postalcode))
				  $errors[] = "Please enter your Postal Number!";
			 
			 if (!filter_var($email,FILTER_VALIDATE_EMAIL))
				  $errors[] = "Email is not in correct format!";
			  
			 if (empty($country))
				  $errors[] = "Please select a Country!"; 
			  
			 if(!empty($errors)){
				 foreach ($errors as $error)
				 echo $error . "<br/>";
			 }else{
                   
                   $myquery="Select * from customers where 1";
                 $r= mysqli_query($db,$myquery);
                 $numrows = mysqli_num_rows($r);
			     $myboolean=false;
                 if($numrows>0)
                 {
                 	while($re=$r->fetch_assoc())
                 	{
                 		if($re['username']==$username)
                 		{
                         $myboolean=true;
                 		}
                 	}
                 }
                 if($myboolean==false)
                 {





				  $hash = "waterpollution";
			  $hashpassword = crypt($password,$hash);
				
				


				 
				 $query = "insert into customers(username,pasword,firstname,lastname,dob,email,postaladdress,postalcode,country) 
				 values ('$username','$hashpassword','$firstname','$lastname','$dob','$email','$postaladdress','$postalcode','$country')";
				 
				 $results = mysqli_query($db,$query);
				 if($results)
					  header('location:register.php?msg=Added');
				 else
					 echo "Something went wrong!" . mysqli_error($db);
			 }
			  }
			   if($myboolean==true)
			  {
			  	echo "<br><center><b>This username Already exist.</center></b>";
			  }
		  }
		?>

		<div class="col-12" align="center">
		  <h2 class='contentp' style="font-size: 30px;font-weight: bold;">Air Pollution Registration</h2>
		  </div>

		  <form action="" method="post" >
		   <div class="col-12"> 
			 
			    <label for="username" class="contentp">Username</label>
				<input style="width: 100%;"
				type="text" name="username" value="<?php echo isset($username)?$username:''?>" required/>
			  </div>
			  
			  <div class="col-6">
			   <label for="password" class="contentp">Password</label>
				<input required type="password" name="password" style="width: 90%;"/>
			  </div>
			  
			  <div class="col-6">			   <label for="confirmpassword" class="contentp">Confirm Password</label>
				<input type="password" required style="width: 90%;" name="confirmpassword"/>
			  </div>

			  <div class="col-6">
			    <label for="firstname" class="contentp">Firstname</label>
				<input type="text" required style="width: 90%;" name="firstname" value="<?php echo isset($firstname)?$firstname:''?>"/>
			  </div>
			  <div class="col-6">
			  
			    <label for="lastname" class="contentp">Lastname</label>
				<input type="text" required style="width: 90%;" name="lastname" value="<?php echo isset($lastname)?$lastname:''?>"/>
			  </div>
			   <div class="col-6">
			   <label for="dob" class="contentp">Date of Birth</label>
				<input type="date" required name="dob" style="width: 90%;" value="<?php echo isset($dob)?$dob:''?>"/>
			  </div>
			  
			  <div class="col-6" >
			    <label for="email" class="contentp"> &nbsp; Email</label>
				<input type="email" required style="width: 90%;" name="email" value="<?php echo isset($email)?$email:''?>"/>
			  
			  
			</div>
			  <div class="col-12" >
			    <label for="postaladdress" class="contentp">Postal Address</label>
				<input type="text" required style="width: 100%;" name="postaladdress" value="<?php echo isset($postaladdress)?$postaladdress:''?>"/>
			  </div>
			  <div class="col-6" >
			    <label for="postalcode" class="contentp">Postal Code</label>
				<input type="text" required style="width: 90%;" name="postalcode" value="<?php echo isset($postalcode)?$postalcode:''?>"/>
			  </div>
			  <div class="col-6" >
			    <label for="country" class="contentp">Country</label>
				
				  <select name = "country" style="width: 90%;" required>
				    <option value = "antigua">Antigua</option>
					<option value = "barbados">Barbados</option>
					<option value = "dominica">Dominica</option>
					<option value = "guyana">Guyana</option>
					<option value = "jamaica">Jamaica</option>
					<option value = "st.kitts">St. Kitts</option>
					<option value = "trinidad">Trinidad</option>
				
				 </select>
				</div>
				<div class="col-12">
				  <input type="submit" class="example_e" style="height: 50px" value="Register" name="register" id="register"/>
				  </div>
				  
			  
			  
			    
				  <div class="col-12" align="center">				  Already Registered? <a href="Login.php">Return</a> to Login
				  </div>

			  
			  
		    
		  </form>
		  <?php 
		
if(isset($_GET['msg']))
{
  if($_GET['msg']=="Added")
  {
  	 echo "<center><b>Your have been registered</b></center>";

  }
  else{
  	echo "Something went wrong!" . mysqli_error($db);
  }
					
				
					 
} ?>
<script type="text/javascript">
	logBtn=document.getElementById('sign');
	logBtn.setAttribute("style", "display: none;");
</script>


</div>
<?php include("footer.php"); ?>