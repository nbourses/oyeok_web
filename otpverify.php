<?php
	include 'config.php';
	$phone_no = $_POST['phone_no'];
	$otp = $_POST['otp'];
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$check = mysqli_query($conn,"SELECT * FROM `Web_Authentication` WHERE `phone_no` = $phone_no AND `link` = '$otp'" )or die(mysql_error());
//	echo 
	$check2 = mysqli_num_rows($check);
	 if ($check2 == 0) 
	 	echo false;
	else
		echo true;
?>