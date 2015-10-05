<?php
	include 'config.php';
	//$phone_no = $_POST['phone_no'];
	$phone_no = "918657753917";
	$lat = $_POST["lat"];
	$long= $_POST["long"];
	//echo $lat;
 
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
	    //echo "New record created successfully";
	} else {
	    //echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();



	//Send SMS
		function sendMsg(){
			
			global $phone_no;
			global $rand;
			
			//$msg_url = 'http://oyeok.com/oyeok.php?mob_no='.$phone_no.'?rand='.$rand.'';
	//echo $msg_url;
		
				$url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
	    'api_key' => de1cc5e1,
	    'api_secret' => ritesh,
	    'to' => $phone_no,
	    'from' => 'OyeOK',
	    'text' => 'Your OyeOK OTP is . '.$rand.''
	]);


	print file_get_contents($url);
	 /*
	//$url = 'http://example.com';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	//echo $result;
	curl_close ($ch);*/
	return;
	}	




	 if(isset($_POST['phone_no']))
	{
	    sendMsg();
	    echo "1";
	}
	else
	{
	    echo "0";
	}





?>