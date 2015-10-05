<?php
	include 'config.php';
	//$phone_no = $_POST['phone_no'];
	//$otp = $_POST['otp'];
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
    $property = $_POST['property'];
	$intend = $_POST['intend'];
	$size = $_POST['size'];
	$budget = $_POST['budget']; 
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	$mob_no = $_POST['phone_no'];
	$json = array('mobile_no'=>$mob_no,'long'=>$long,'lat'=>$lat,'spec_code'=>"$property-$intend-$size-$budget");
	$myCurl = "curl -i 52.25.136.179:9000/1/user/web -d '". json_encode($json)."' -H 'Content-Type: application/json'";
	echo $myCurl;
	$output = shell_exec($myCurl);
	echo "<pre>$output</pre>";
	

?>