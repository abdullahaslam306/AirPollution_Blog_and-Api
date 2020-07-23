<?php include("header.php"); ?>

<div class="col-12" s align="center">
		  <h2 class='contentp' style="font-size: 30px;font-weight: bold;">Air Pollution Login Form</h2>
</div>
<?php
		  session_start();
		  include '/pages/dbconnect.php';
		  if(isset($_POST['login'])){
			  $username = $_POST['username'];
			  $password = $_POST['password'];
			  
			  $username = mysqli_real_escape_string($db,$username);
			  $password = mysqli_real_escape_string($db,$password);
			  
			 $hash = "waterpollution";
			  $hashpassword = crypt($password,$hash);
			  
			  $query = "select * 
			            from customers
 						where username = '$username'
						and pasword = '$hashpassword'";
						
			  $return = mysqli_query($db,$query);
			  $numrows = mysqli_num_rows($return);
			  
			  if ($numrows > 0){
				  $_SESSION['username'] = $username;
				  header('location:customermain.php');
			  }else{
				  echo "$username or $password is incorrect!"; 
			  }
		  }
		?>


<form action="" method="POST">
	
<table class="t2">
			  <tr class='contentp'>
			    <td  ><label for="username" >Username</label></td>
				<td  class='contentp'><input type="text" required name="username" /></td>
			  </tr>
			  <tr class='contentp'>
			   <td><label for="password">Password</label></td>
				<td><input type="password" required name="password"/></td>
			  </tr>
			  <tr>
			     <td>
				 </td>
				 <td><input type = "submit" class="example_e" value = "Login" name="login" style="height: 50px;"></td>
			  </tr>
			  
		  </div>
		    </table>


</form>
 <div class="col-12" style="text-align: center">
		    <p class='contentp'>Not yet registered? <a href="register.php">Return</a> to Registration</p></div>
<script type="text/javascript">
	logBtn=document.getElementById('login');
	logBtn.setAttribute("style", "display: none;");
</script>
<?php 
if(isset($_GET['msg']))
{
	if($_GET['msg']=='Login First')
	{
		echo"<center > please login first</center>";
	}
} ?>

</div>
<?php 
include("footer.php"); ?>