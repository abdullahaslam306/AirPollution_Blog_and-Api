<div class="col-2 col-s-2" style="margin:0; padding:0;">
	
	<button onclick="topFunction()" id="mytn" class="mytn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

	<label style="display: hidden;"></label>

	
	
</div>
</div>


<footer class="footer-distributed">
	
	<div class="footer-left">
		
		<h3>Air Pollution</h3>
		
		<p class="footer-links">
			<a href="index.php">Home</a>
			
			·
			<a href="faq.php">Faq</a>
			·
			<a href="conatactUs.php">Contact</a>
		</p>
		
		<p class="footer-company-name">Created by J.Gopaul Last update  &copy; 17.01.2020 </p>
	</div>
	
	<div class="footer-center">
		
		<div>
			<i class="fa fa-map-marker"></i>
			<p><span>Your Address you want to add</span> City, Country</p>
		</div>
		
		<div>
			<i class="fa fa-phone"></i>
			<p>+1 123 123456</p>
		</div>
		
		<div>
			<i class="fa fa-envelope"></i>
			<p><a href="#">youremail@xyz.com</a></p>
		</div>
		
	</div>
	
	<div class="footer-right">
		
		<p class="footer-company-about">
			<span>About the company</span>
			Your company's description &amp; SEO Learner.
		</p>
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
			
			<div class="footer-icons">
				
				<a href="<?php echo $row['fb'] ;?>"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['twitter'] ;?>"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['linked'] ;}?>"><i class="fa fa-linkedin"></i></a>
				
			</div>
			
		</div>
		
	</footer>
</body>
<script type="text/javascript">
	mybutton = document.getElementById("mytn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction(mybutton)};

</script>
</html>