<?php
	include 'config.php';
	/*$phone_no = "918657753917";
	$lat="12";
	$long="34";*/
	$phone_no = $_POST['phone_no'];
	$lat = $_POST["lat"];
	$long= $_POST["long"];
	
 
	$conn = new mysqli($servername, $username, $password, $dbname);
	//Check connection
	if ($conn->connect_error) {
	   // echo "failed";//die("Connection failed: " . $conn->connect_error);
	}else {
	//	echo "SUccess";
	} 

	$seed = str_split('0123456789'.$phone_no); 
	shuffle($seed); // optional since array_is randomized; this may be redundant
	$rand = '';
	foreach (array_rand($seed, 4) as $k) $rand .= $seed[$k];
	//echo $rand;
	$sql = "INSERT INTO Web_Authentication (id, phone_no, link, latitude, longitude) VALUES ('NULL', $phone_no, '$rand', '$lat', '$long')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();



	//Send SMS
		function sendMsg(){
			
			global $phone_no;
			global $rand;
			
			
			//exotel
			
			
			$post_data = array(
    'From'   => '8808891988',
    'To'    => $phone_no,
    'Priority' => 'high',
    'Body'  => 'OTP from OyeOK = '.$rand.'. Thank you for registering',
);
 
$exotel_sid = "nexchanges1"; 
$exotel_token = "5347ce6a334ccc65d2ac9612dd4814824dc9e618";
 
$url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Sms/send";

$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 
$http_result = curl_exec($ch);
echo $http_result;
$error = curl_error($ch);
echo $error;
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 
curl_close($ch);
			
			
			
			
	/*		
			
		
		$url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
	    'api_key' => de1cc5e1,
	    'api_secret' => ritesh,
	    'to' => $phone_no,
	    'from' => 'OyeOK',
	    'text' => 'Your OyeOK OTP is . '.$rand.''
	]);


	print file_get_contents($url);
	 
	//$url = 'http://example.com';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	echo $result;
	curl_close ($ch);
	*/
	return;
	}	




	 if(isset($_POST['phone_no']))
	{
	echo "1";
    $t=sendMsg();
    echo $t;
}
	else
	{
	    echo "0";
	}





?>