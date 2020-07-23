<?php include("customer_header.php"); ?>
<h2> British Airways Flight Itinerary </h2>
<center>
	<form action="" method="POST" >

		<table class="t2">
			<tr class='contentp'>
				<td  ><label for="departureCity" >Select Departure City</label></td>
				<td  class='contentp'><input type="text" required name="departureCity" /></td>
			</tr>
			<tr class='contentp'>
				<td><label for="ArrivalCity">Select an arrival city</label></td>
				<td><input type="text" required name="arrivalCity"/></td>
			</tr>
			<tr class='contentp'>
				<td><label for="Departure Date">Select a departure date</label></td>
				<td><input type="date" required name="departureDate"/></td>
			</tr>
			<tr class='contentp'>
				<td><label for="Return Date">Select a return date </label></td>
				<td><input type="Date" required name="returnDate"/></td>
			</tr>

			<tr>
				<td>
				</td>



				<td>
					<input type = "submit" class="example_e" value = "Search For Flighs " id='submt' name="login" style="height: 50px;"  ></a>
				</td>
			</tr>

		</div>
	</table>


</form>


<?php
include "restutility.php";

		     //Array to store flight details based on search criteria
$array = array();
$flights[][] = $array;

$i = 0;
$j = 0;
$count = 0;

if (!empty($_POST['departureCity']))			 
	$departureCity = $_POST['departureCity'];
else
	$departureCity = "";

if (!empty($_POST['arrivalCity']))	
	$arrivalCity = $_POST['arrivalCity'];
else
	$arrivalCity = "";

if (!empty($_POST['departureDate']))	
	$departureDate = $_POST['departureDate'];
else
	$departureDate = "";

if (!empty($_POST['returnDate']))	
	$returnDate = $_POST['returnDate'];
else
	$returnDate = "";			 

$url = "https://api.ba.com/rest-v1/v1/flightOfferBasic;departureCity=".$departureCity.";arrivalCity=".$arrivalCity.";cabin=economy;journeyType=roundTrip;departureDate=".$departureDate."T12:00:00Z;checkInDate=2014-03-14T12:00:00Z;returnDate=".$returnDate."T12:00:00Z;range=monthLow.xml";

$response = curl_get($url);

$xml = simplexml_load_string($response);

if (isset($xml->PricedItinerary)){

	foreach($xml->PricedItinerary as $flight)
	{
		$flights[$i][$j++] = $flight->DepartureCity;
		$flights[$i][$j++] = $flight->DepartureCityCode;
		$flights[$i][$j++] = $flight->ArrivalCity;
		$flights[$i][$j++] = $flight->ArrivalCityCode;
		$flights[$i][$j++] = $flight->Cabin;
		$flights[$i][$j++] = $flight->TravelMonth;
		$flights[$i][$j++] = $flight->Price->Amount->Amount;	
		$flights[$i][$j++] = $flight->Price->Amount->CurrencyCode;	
		$flights[$i][$j++] = $flight->Price->IsTaxIncluded;		

		++$i;
		$count = $j;
		$j=0;					 
	}
   $j=-1;
     
     echo "<H2>Results</H2>";
   
	for($i=0; $i < $count; $i++){
         
         	echo " <br><table class='t2'>";
                       echo "<tr><td><h3>From : </h3></td><td>".$flights[$i][0]."</td><td>(".$flights[$i][1].")</td><td></td> <td><h3>TO : </h3></td><td>".$flights[$i][2]."</td><td>(".$flights[$i][3].")</td></tr>";
        
         echo "<tr><td><h3>Type : </h3></td><td>".$flights[$i][4]."</td> <td></td><td><h3>Month : </h3></td><td>".$flights[$i][5]."</td><td></td><td><h3>Price : </h3></td><td>".$flights[$i][6]."(".$flights[$i][7].") </td></tr>" ;

        
echo "</table> <br>";

	}


}



?>

</center>
</div>
<?php include("footer.php"); ?>