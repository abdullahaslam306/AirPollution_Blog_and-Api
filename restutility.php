<?php
   function curl_get($url)
   {
	 //initialise a new curl session and return a curl handle
      $c = curl_init($url);
  
     //set various options for the session
      curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
      $headers = array(
                      'Client-Key:qrunn24sskdjag6dbb43m3w6','Accept:text/xml'
                       );
 
      curl_setopt($c, CURLOPT_HEADER, false);
	  curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	  
	  //disable SSL checks
	  curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
	  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	  
	  
	  //disable cache
	  curl_setopt($c, CURLOPT_FORBID_REUSE,true);
	  curl_setopt($c, CURLOPT_FRESH_CONNECT,true);
	  
	  //execute and fetch data from the server
	  $response = curl_exec($c);
	  
	  if ($response === false)
	  {
		 echo 'Curl error: '. curl_error($c);
	  }
	  
	  //close the session
	   curl_close($c);
	   
	  return $response;
   }  
	 
  
 ?>