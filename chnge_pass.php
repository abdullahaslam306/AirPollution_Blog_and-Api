<?php 
include('customer_header.php'); ?>
<br>
<div class="col-12" s align="center">
	<h2 class='contentp' style="font-size: 30px;font-weight: bold;">Change Password</h2>
</div>
<br>
<?php
$return;
include '/pages/dbconnect.php';
if(isset($_POST['login'])){
	$newpass = $_POST['newpass'];


	$newpass = mysqli_real_escape_string($db,$newpass);
	


	$hash = "waterpollution";

	$hashpassword2 = crypt($newpass,$hash);



	$query1="Update customers SET pasword='$hashpassword2' where   username='".$_SESSION['username']."'";



	$a= $db->query($query1);


	if ($a ){

		echo "Password updated";
	}else{
		echo "Incorrect Password!"; 
	}
}
?>


<form action="" method="POST" onsubmit="return Verify();">
	
	<table class="t2">

		<tr class='contentp'>
			<td><label for="newpass">New Password</label></td>
			<td><input type="password" id="s" required name="newpass"/></td>
		</tr>


		<tr>
			<td>
			</td>

			<td><input type = "submit" class="example_e" value = "Update" name="login" style="height: 50px;"></td>
		</tr>

	</div>
</table>


</form>
<?php 
if(isset($_GET['msg']))
{ 
	echo"<center>Password Updated Sucessfully </center>";
} 
?>


</div>
<?php include('footer.php'); ?>