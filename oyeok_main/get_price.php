<?php

 /*curl -i ssl.hailyo.com/1/lets/oye -d '{"long":"72.866202","lat":"19.14356","gcm_id":"12233423","locality":"mumbai","signature":"'+signature+'"}' -H 'Content-Type: application/json'*/

$data = array("long"=>"72.866202","lat"=>"19.14356","gcm_id"=>"12233423","locality"=>"mumbai");                                                                    
$data_string = json_encode($data);      

//echo $data_string."\n";

$url='https://ssl.hailyo.com/1/get/price';
/*$ch = curl_init('http://ssl.hailyo.com/1/get/price');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json')                                                                       
);         


 $result = curl_exec($ch);*/
// use key 'http' even if you send the request to https://...
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            "https://ssl.hailyo.com/1.01/get/price" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     
'{
	"gcm_id": "elEpyI5-h7o:APA91bHEn-EEbCkEbD6nCTkB2OinDeg-lkhbPvNH-xs1GtoMFxROV7dJue8YYwPIKRm6KCqYSKdA0XjFmqtkaGaO26DvpzWk_RgCJcT6qDmJ9WNFHzbcm6tq_TbvGtLJBa6ILDbWvLYZ",
"device_id":"hardware",
"locality":"mumbai", 
"lat":"'.$_POST["lat"].'",
"long":"'.$_POST["long"].'",
"property_type":"home",
"user_id":"himxurwhiwv2oxh1zv73j9kezeazckit",
"platform":"android"
}' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

$result=curl_exec ($ch);

echo $result;

;
 ?>
