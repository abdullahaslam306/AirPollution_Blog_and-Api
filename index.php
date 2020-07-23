<?php 
include("header.php"); ?>
<?php 
		  include '/pages/dbconnect.php';
		  
			 
			  
			  $query = "select * 
			            from data
 						where 1";
						
			  $result = mysqli_query($db,$query);
			  $numrows = mysqli_num_rows($result);
			  
			  if ($numrows > 0){
				 
                 $row = $result->fetch_assoc(); 
        $val=mysqli_real_escape_string($db,$row['dataa']);
         $val2=mysqli_real_escape_string($db,$row['afterread']);
        

         ?>
		 <video autoplay loop="loop" muted>
          <source src="videos/<?php echo $row['video'];  ?>" type="video/mp4"/>
          <source src="videos/vd1.ogg" type="video/ogg"/>
          <br>

          Your browser does not support HTML5 video.
        </video>

          <div align="center">
          	
          	<h2 style="text-align: center">GET FREE HOME POLLUTION TESTING KIT</h2>
          <button class="example_e" style="background-color: red;color: white; width: 200px;" onclick="window.location.href = 'register.php';">CLICK HERE!</button>
          </div>

        <h2 class='contentp' style="font-size: 20px;font-weight: bold;"><?php echo $row['heading'] ?></h2>
        <p class='contentp'><?php echo $val; ?><span id="dots">...</span><span id="more"> <?php echo $val2;} ?></span></p><span>

<button onclick="myFunction2()"   id="myBBtn" class="readm">Read more</button></span>
    
    <br>
    <h2 class='contentp' style="font-size: 20px;font-weight: bold;">Read More About Air POllution</h2>
    <br>
    
    <div class="mycont">
        
        <div class="w3-card-4 outerCard" style="text-align: right;" >
        <div class="w3-container w3-center innerCard">
         <img src="images/industry.jpg" alt="Avatar" style="width: 350px;height: 300px;">
         <h6 >Industrial pollution is one of primary sources of the environmental contamination. <a href="https://www.airgo2.com/air-pollution/causes/anthropogenic/factories-industries-exhaust/">Read more ...</a></h5>
      </div>
         </div>

        <div class="w3-card-4 outerCard" >
        <div class="w3-container w3-center innerCard">
         <img src="images/cars.jpg" alt="Avatar" style="width: 350px;height: 300px;">
         <h6>Passenger vehicles are a major pollution contributor, producing significant amounts of <a href="https://www.ucsusa.org/resources/vehicles-air-pollution-human-health">Read more ...</a></h6>
      </div>
         </div>
         <div class="w3-card-4 outerCard" >
        <div class="w3-container w3-center innerCard">
         <img src="images/left.jpg" alt="Avatar" style="width: 350px;height: 300px;">
         <h6>The most basic solution for air pollution is to move away from fossil fuels <a href="https://solarimpulse.com/air-pollution-solutions">Read more ...</a></h6>
      </div>
         </div>



    </div>


	  </div>
	  
<?php include("footer.php"); ?>