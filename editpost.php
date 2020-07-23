<?php
include("customer_header.php"); 
include("functions.php");
$query="Select * from posts where postid=$_GET[pid]" ;

include "/pages/dbconnect.php";
$results = mysqli_query($db,$query);
if($results){
	while($rows = mysqli_fetch_assoc($results))
	{ 
		



		?>
		<div align="center">
			
			<h2 class='contentp' style="font-size: 30px;font-weight: bold;">Edit Forum</h2>
			<form action = "" method = "post" >
				<table class="t2">
					<tr>
						<td class='contentp'><label for="username">Username:</label></td>
						<td><input type="text" size="28" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" readonly></td>
					</tr>
					<tr>
						<td class='contentp'><label for="category">Forum Category:</label></td>
						<td>
							<?php
							$infos=getForumCategory();
							echo"<select name='category' id='category' >";
							echo"<option value='Select a Category' disabled selected> Select a Category</option>";
							foreach ($infos as $info)
								echo"<option> " . $info['category'] . "</option>";
							echo"</select>";
							?>
						</td>
					</tr>
					<tr>
						<td class='contentp'><label for="message">Your Message:</label></td>
						<td><textarea rows="10" cols="50" name="message"id="message" style="background-color:#abcdef "><?php echo "$rows[message]"; ?></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="POST" name="submit" class="example_e" style="height: 50px;" /></td>
					</tr>
				</table>
			</form>
		</div>




		<?php 
		
	}

}else
echo"Something went wrong ". mysqli_error($db);




?>
<?php

if(isset($_POST['submit'])){
	include "/pages/dbconnect.php";
	if(!empty($_POST['category'])){
		$category= $_POST['category'];
		$category= mysqli_real_escape_string($db,$category);
	}else
	$errors[] = "A category is required!<br/>";
	
	if(!empty($_POST['message'])){
		$message =$_POST['message'];
		$message= mysqli_real_escape_string($db,$message);
	}else
	$errors[] = "Message is required!<br/>";
	
	
	if(!empty($errors)){	
		foreach ($errors as $error)
			echo $error;
	}else{
		if(empty($_SESSION['category']))
			$_SESSION['category'] = "#";
		
		if(empty($_SESSION['message']))
			$_SESSION['message'] = "#";
		
		if(strcmp($category,$_SESSION['category'])!=0)
			$_SESSION['category'] = $category;
		
		if(strcmp($category,$_SESSION['message'])!=0)
			$_SESSION['message'] = $message;
		 
        
		$r=UpdateConversation($category,$message,$_GET['pid']);
		if($r)
		{
			header("location:update_info.php?msg=sucessfully Updated");

		}
	}
}
?>


</div>
<?php 
include("footer.php"); ?>