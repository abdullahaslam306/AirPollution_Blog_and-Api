<?php 

include('customer_header.php'); ?>


<?php
			$_SESSION['customermain'] = "";
		    
		 ?>
		 <?php
		    function memberprofile(){
				include "/pages/dbconnect.php";
				$infos = array();
				
				if(empty($_GET['username']))
					$username = $_SESSION['username'];
				else
					$username = $_GET['username'];
				
				$query = "select * 
				          from customers
						  where username = '$username'";
						  
				$results = mysqli_query($db,$query);
				$rows = mysqli_fetch_assoc($results);
				$infos = $rows;
				return $infos;
			}
			
			function retrieveposts(){
				include "/pages/dbconnect.php";
				$messages = array();
				
				if (empty($_GET['username']))
					$username = $_SESSION['username'];
				else
					$username = $_GET['username'];
				
				$query = "select postid,username,message,postdate,category
				          from posts
						  where username = '$username'
						  order by postdate desc";
						  
				$results = mysqli_query($db,$query);
				if($results){
					while($rows = mysqli_fetch_assoc($results))
					   $messages[] = $rows;
				    return $messages;
				}else  
					echo"Something went wrong ". mysqli_error($db);
			}
			
			$info = memberprofile();
		   ?>
		   
		   <div class="col-12">
		   <h2 class='contentp' style="font-size: 30px;font-weight: bold;"><?php echo $info['username']; ?>'s Profile</h2></div>
		   <br/>
		   <div class="col-12"> 
		   <div class="cust_acc"  >
		   	<p>Firstname : <em><?php echo $info['firstname'];?></em></p>
		   <p>Lastname : <em><?php echo $info['lastname'];?></em></p>
		   <p>Date of Birth : <em><?php echo $info['dob'];?></em></p>
		   <p>Email : <em><?php echo $info['email'];?></em></p>
		   
            <p> Address : <em><?php echo $info['postaladdress']." ".$info['postalcode']." ".$info['country'] ;?> </em></p>

		   </div>
		   </div>
		  
             
         <div class="col-12">

		  <?php
		     $messages = retrieveposts();
		     $i=0;
			 foreach ($messages as $message)
			 {   
			   ?>
		      <div style="border-style: <?php  if($i%2==0)
		      {
		      	echo "inset";
		      }else{
		      	echo "outset";
		      } ?>; padding: 10px; >			   <label class="contentp"><b>Category : </b></label><em><?php echo $message['category'];?></em>
			   <br>
 				<label class="contentp"><b>Created By : </b></label><em><?php echo $message['username'];?></em>
 				<br>
				   <label class="contentp"><b>Message : </b></label><em><?php echo $message['message'];?></em>
				<div align="right"> <p>[ <?php echo date('d/m/Y a H:i:s', strtotime($message['postdate']));?> ] </p></div>
				<br/>
			</div>
				<?php
			 $i+=1; echo "<br>";} 
		      ?>
</div>

</div>
<img src="/images/city.png">
<?php include('footer.php'); ?>