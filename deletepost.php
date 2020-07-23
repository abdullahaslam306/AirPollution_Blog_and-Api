<?php 
$query="Delete from posts where postid=$_GET[pid]";
include "/pages/dbconnect.php";
$results = mysqli_query($db,$query);
if($results)
{
header("location:update_info.php?msg=sucessfully Deleted");
}
else{
  header("location:update_info.php?msg=wrong");
}


 ?>