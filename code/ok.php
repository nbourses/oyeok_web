<?php
include 'config.php';

	$json = array('mobile_no'=>$mob_no,'user_role'=>'broker','lat'=>$lat,'long'=>$long);
	$myCurl = "curl 52.25.136.179:9000/1/web/preok -d '". json_encode($json)."' -H 'Content-Type: application/json'";
  $reply = shell_exec($myCurl);

 /* Expected reply

 $json = '{
  "responseData": [
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


*/

echo $reply;

?>