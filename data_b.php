<?php
		  include '/pages/dbconnect.php';
		  
			 
			  
			  $query = "update data SET dataa='$_POST[mydata]', afterread='$_POST[mydata2]',video='$_POST[video]' ,heading='$_POST[heading]',fb='$_POST[fb]',twitter='$_POST[twitter]',linked='$_POST[linked]'  where 1 ";
						
			  $result = mysqli_query($db,$query);
			 
			  if($result){
	header("location:admin.php?msg=Updated");
}else{
	echo "error";
}
       
		  
		?>