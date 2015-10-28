<?php
//include 'config.php';

/*
$mob_no = $_POST['phone_no'];
$lat = $_POST['lat'];
$long = $_POST['long'];


  
  
  /*$json = array('mobile_no'=>$mob_no,'user_role'=>'broker','lat'=>$lat,'long'=>$long);
  $reply = shell_exec($myCurl);*/

 // Expected reply

 //$json= { "responseData": [ { "mobile_no": "8483014575", "spec_code": "OR-4BHK-6,00,00,000", "name": "Ritesh Warke" }, { "mobile_no": "9870628969", "spec_code": "OR-3.5BHK-6,00,00,000", "name": "Mayuresh Gomai" }, { "mobile_no": "7710813199", "spec_code": "OR-3BHK-5,50,00,000", "name": "Dilip Chaurasya" }, { "mobile_no": "7208475355", "spec_code": "OR-7BHK-9,00,00,000", "name": "Nikhil Dange" } ] };
 
 //echo $json;
 
 /* $json = '{
  "responseData":[
    {
      "mobile_no": "8483014575",
      "spec_code": "OR-4BHK-6,00,00,000",
      "name": "Ritesh Warke"
    },
    {
      "mobile_no": "9870628969",
      "spec_code": "OR-3.5BHK-6,00,00,000",
      "name": "Mayuresh Gomai"
    },
    {
      "mobile_no": "7710813199",
      "spec_code": "OR-3BHK-5,50,00,000",
      "name": "Dilip Chaurasya"
    },
    {
      "mobile_no": "7208475355",
      "spec_code": "OR-7BHK-9,00,00,000",
      "name": "Nikhil Dange"
    }
  ]
 }';

echo $json;

*/


$mob_no = 9870628969;
$lat = 19.123;
$long = 72.8356;


$url = 'http://52.25.136.179:9000/1/web/preok/';    

$data = array('mobile_no'=>$mob_no,'user_role'=>'broker','lat'=>$lat,'long'=>$long);
/*  
$content = json_encode($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');*/
  $myCurl = "curl 52.25.136.179:9000/1/web/preok -d '". json_encode($content)."' -H 'Content-Type: application/json'";
 $json_response = shell_exec($myCurl);
 echo $myCurl;
 print_r($json_response);
//$json_response = curl_exec($curl);
echo $json_response;
if(curl_exec($curl))
{curl_error($curl);
echo 'Curl error:';
}

else{
	
	//$json_response="'$json_response'";
    
   echo $json_response;
}


?>