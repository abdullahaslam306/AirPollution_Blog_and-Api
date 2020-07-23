<?php 
function retrieveposts($txtcategory){
	include '/pages/dbconnect.php';
	$messages = array();
	
	if(empty($_GET['username']))
		$username = $_SESSION['username'];
	else
		$username = $_GET['username'];
	
	if(empty($txtcategory)){
		$query="select postid,username,category,message,postdate
		from posts
		where username='".$_SESSION['username']."'
		order by postdate desc";
	}else{
		
		$query="select postid,username,category,message,postdate
		from posts
		where category = '$txtcategory' AND username='".$_SESSION['username']."' 
		order by postdate desc";
	}
	
	$results = mysqli_query($db,$query);
	if($results){
		while($rows = mysqli_fetch_assoc($results))
			$messages[] = $rows;
		return $messages;
	}else
	echo"Something went wrong ". mysqli_error($db);
}

function createConversation($category,$message){
	
	include "/pages/dbconnect.php";
	$username = $_SESSION['username'];
	$premessage = "";
	if(!empty($_SESSION['username']))
		{ $premessage = $_SESSION['message'];
}

if(empty($_SESSION['msg'])|| strcasecmp($premessage,$message)!=0){ 
	$_SESSION['msg'] = $message;
	$query="insert into posts(username,category,message,postdate)
	values ('$username','$category','$message',NOW())";
	$results = mysqli_query($db,$query);
	if($results)
	{

		echo "Sucessfully Added !!";
	}
	if(!$results)
		{echo"Something went wrong " . mysqli_error($db);}
	
}
}

function UpdateConversation($category,$message,$pid){
	 

	include "/pages/dbconnect.php";
	$username = $_SESSION['username'];
	$premessage = "";
	if(!empty($_SESSION['username']))
		{ $premessage = $_SESSION['message'];
}



	$_SESSION['msg'] = $message;
	 
	
	$query="Update posts SET category='$category',message='$message',postdate=NOW() where postid=$pid";
	
	$results = mysqli_query($db,$query);
	if($results)
	{

		return true;
	}
	if(!$results)
		{echo"Something went wrong " . mysqli_error($db);
		return false;}
	
}



function getForumCategory(){
	include "/pages/dbconnect.php";
	$infos = array();
	
	$query = "select category from memberactivities";
	
	$results = mysqli_query($db,$query);
	if($results){
		while($rows = mysqli_fetch_assoc($results))
			$infos[] = $rows;
		return $infos;
	}else
	echo"Something went wrong ". mysqli_error($db);
} ?>