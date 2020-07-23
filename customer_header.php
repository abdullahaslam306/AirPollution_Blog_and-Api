<?php include('auth.php'); ?>
<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>Air Pollution</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="mycss/style.css" rel="stylesheet" type="text/css"/>
	<link href="newstyles.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="css/myjs.js"></script>
  </head>
  <style type="text/css">
  	.pageTop
    {
      border-bottom: 3px solid #f4511e; width: 230px; border-right: 4px solid #f4511e; height: 15%; text-align: center; text-shadow: 10%;
    }
    .cust_acc{
    width :100%; background-color: #abcdef; 
    border:2px solid black;
    border-radius: 10px;
    padding: 5px;
    }
  </style>
  <body style="background-color: ;">

    
    <div class="header" style="background-image: url('images/city.jpg');height: 400px;">
	 
	 <div class="row">
	 <div class="box">
	 	<div class="col-9">
	 	<h1  class="pageTop">Air Pollution</h1></div>
	 	<div class=" col-3">
	 		
	 		<form method="GET" action="logout.php">
	 			<input style="float: right; height: 50px;" type="submit" class="example_e" name="logout" value="LOGOUT">
	 		</form>
	 		
	 		
	 </div>
	 </div> 
	</div>
	</div>
	<div class="row" style="margin:0; padding:0;">
	  <div class="col-2 col-s-2  "  style="margin:0; padding:0;">
	    		<label style="color: white">X</label>
	  </div>

	  <div class="col-8 col-s-10"  style="padding: 0; overflow: hidden;" >
	  	<nav>	    <ul>
		 <li><a href="../prototype2019/customermain.php"><i class="fa fa-eye"> View Account</i></a></li>
		 <li><a href="update_info.php"><i class="fa fa-edit"> Update Information</i></a></li>
		  <li><a href="baflight.php"><i class="fa fa-edit"> British AirLine</i></a></li>
		 <li><a href="chnge_pass.php"><i class="fa fa-lock"> Change Password</i></a></li>
         <div class="topnav">
          <input type="text" placeholder="Search.."  class="searchnav" style="height: 25px;  ">

		</div>
        </ul>
		</nav>
	
