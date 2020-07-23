<?php 
include("customer_header.php"); 
include("functions.php");?>



<?php
$_SESSION['customermain'] = "";

$infos = getForumCategory();
?>
<?php
if(isset($_POST['cmdsearch'])){
	if(empty($_POST['srchcategory']))
		$txtcategory = "";
	else
		$txtcategory = $_POST['srchcategory'];
}

echo "<br>";
echo"<center><form action= '' method='post' name='Search'>";
echo"<select name='srchcategory' id='srchcategory' style='width:400px;'>";
echo "<option value='Search a Category' disabled selected>Search a Category</option>";
foreach($infos as $info)
	echo"<option> " . $info['category'] . "</option>";
echo "</select> ";
echo"<input type = 'submit'class='example_e' style='height:50px;' value = 'Find' name = 'cmdsearch' id = 'cmdsearch'  ><br>";
echo"</form><br></center>";
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

		createConversation($category,$message);
	}
}
?>

<div align="center">

	<h2 class='contentp' style="font-size: 30px;font-weight: bold;">Create New Forum</h2>
	<form action = "" method = "post" >
		<table class="t2">
			<tr>
				<td class='contentp'><label for="username">Username</label></td>
				<td><input type="text" size="28" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" readonly></td>
			</tr>
			<tr>
				<td class='contentp'><label for="category">Forum Category</label></td>
				<td>
					<?php
					echo"<select name='category' id='category' >";
					echo"<option value='Select a Category' disabled selected> Select a Category</option>";
					foreach ($infos as $info)
						echo"<option> " . $info['category'] . "</option>";
					echo"</select>";
					?>
				</td>
			</tr>
			<tr>
				<td class='contentp'><label for="message">Your Message</label></td>
				<td><textarea rows="10" cols="50" name="message"id="message"style="background-color:#abcdef "></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="POST" name="submit" class="example_e" style="height: 50px;" /></td>
			</tr>
		</table>
	</form>
</div>
<br/>
<?php


?>
<div class="col-12">
	<h2 class='contentp' style="font-size: 30px;font-weight: bold;">Previous Forum</h2></div>
	<?php
	if(empty($txtcategory))
		$txtcategory = "";
	$messages = retrieveposts($txtcategory);
	foreach ($messages as $message)
	{
		?>
		<div class="col-12">
			<p><a href = "profile.php?username=<?php echo $message['username'];?>"> </a>
				<label class="contentp"><b>Category  </b>  </label><?php echo $message['category'];?>
				<br>
				<label class="contentp"><b> Message  </b></label> <?php echo $message['message']; ?>
				<div align="right">
					<p>[ <?php echo date('d/m/Y a H:i:s', strtotime($message['postdate']));?> ]</p>
					<a href = "deletepost.php?pid=<?php echo $message['postid'];?>" style="color: blue;"
						>Delete</a>

						<a href = "editpost.php?pid=<?php echo $message['postid'];?>" style="color: blue;">Edit</a>
						<hr style=" border-top: 1px solid green">
					</div>
				</div>
				<br/>


				<?php
			}
			?>





		</div>
		<?php include("footer.php") ;?>