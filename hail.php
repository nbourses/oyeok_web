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
	$json = 
	
	
	
	$url = 'http://52.25.136.179:9000/1/web/oye/';    

$data = array('mobile_no'=>$mob_no,'long'=>$long,'lat'=>$lat,'spec_code'=>"$property-$intend-$size-$budget");
    
$content = json_encode($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');

$json_response = curl_exec($curl);
	

?>