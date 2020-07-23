<!DOCTYPE html>
<html>
   <head>
     <title>Database Connection</title>
   </head>
   <body>
   <?php
      $host = "localhost";
	  $user = "root";
	  $pass = "";
	  $database = "prototype";
	  
	  @$db = new mysqli($host,$user,$pass,$database);
	  if (mysqli_connect_errno()){
		  echo "Error in Connection";
		 die();
	  }else
		 
   ?>
   </body>
</html>