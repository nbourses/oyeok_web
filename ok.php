<?php


/*$mob_no = 918657753917;
$lat = 19.120930599999998;
$long = 72.234567;*/

$phone_no = $_POST['phone_no'];
	$lat = $_POST["lat"];
	$long= $_POST["long"];

	
$url = 'http://52.25.136.179:9000/1/web/preok/';    

$data = array('mobile_no'=>$mob_no,'user_role'=>'broker','lat'=>$lat,'long'=>$long);
    
$content = json_encode($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');

$json_response = curl_exec($curl);
//echo "Error CURL: " . curl_error($curl) . " \nError number: " . curl_errno($curl);
echo $json_response;

?>