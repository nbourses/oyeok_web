<?php

$tok ="156802898:AAHeHSUaNFqVPjkrGs-07fl7hV3sa-AgXUs";
 $site = "https://api.telegram.org/bot".$tok;

 $update = file_get_contents("php://input");
 $uarray = json_decode($update, TRUE);
 
 
 $chatId = $uarray["message"]["chat"]["id"];
 $message = $uarray["message"]["text"];
 $location = $uarray["message"]["location"];
 $_SESSION["id"] = $chatId;
 
 // Emoticons
$rocket = "\xF0\x9F\x9A\x80";
$santa = "\xF0\x9F\x8E\x85";
$hourglass = "\xE2\x8C\x9B";
$paperclip = "\xF0\x9F\x93\x8E";
$globe = "\xF0\x9F\x8C\x90";
$lol = "\xF0\x9F\x98\x86";
$nam = "\xF0\x9F\x99\x8F";
$invcomma = "\xE2\x81\xA3";
 

 if($message == "Back".$globe.$invcomma)
 {
    $message = $rocket."OK".$invcomma;
 }
 
 if($location){
   
   $message = "Powai".$invcomma;
 }
 
 $leadMarkup = array(
    'keyboard' => array(
        array("1".$invcomma, "2".$invcomma, "3".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$leadMarkup = json_encode($leadMarkup);
 
 
 $replyMarkup1 = array(
    'keyboard' => array(
        array("Andheri".$invcomma, "Powai".$invcomma), array($globe."PickLocation".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$encodedMarkup1 = json_encode($replyMarkup1);

$defaultMarkup = array(
    'keyboard' => array(
        array($rocket."OK".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$defaultMarkup = json_encode($defaultMarkup);

$timeMarkup = array(
    'keyboard' => array(
        array("10 min".$invcomma, "20 min".$invcomma), array($hourglass."Reschedule".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$timeMarkup = json_encode($timeMarkup);
 
$endMarkup = array(
    'keyboard' => array(
        array("Thanks".$nam.$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True);
$endMarkup = json_encode($endMarkup);

$backlocMarkup = array(
    'keyboard' => array(
        array("Back".$globe.$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backlocMarkup = json_encode($backlocMarkup);

$ptypeMarkup = array(
    'keyboard' => array(
        array("Residential".$invcomma),array("Commertial".$invcomma, "Industrial".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$ptypeMarkup = json_encode($ptypeMarkup);

$ttypeMarkup = array(
    'keyboard' => array(
        array("Rental".$invcomma, "Sell".$invcomma),array("Loan".$invcomma, "Auction".$invcomma),array("Builder".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$ttypeMarkup = json_encode($ttypeMarkup);

$sendotpMarkup = array(
    'keyboard' => array(
        array("Send OTP".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$sendotpMarkup = json_encode($sendotpMarkup);

$startMarkup = array(
    'keyboard' => array(
        array("/start")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$startMarkup = json_encode($startMarkup);

if(is_numeric($message) && (strlen($message) == 10)){
	if(preg_match('/^[7-9][0-9]{9}$/',$message)){
sendOtp($chatId,urlencode("We have sent you a 4 digit OTP. \n\n Please enter your 4 digit OTP to complete verification."),$message);
sendMessage($chatId,urlencode("We have sent you a 4 digit OTP. \n\n Please enter your 4 digit OTP and send to complete verification. \n\n If you want to initiate verification process again then click on the /start button below"),$startMarkup);
         goto end;
          }
        else {
  sendMessage($chatId,urlencode("You entered invalid mobile number number. \n\n Enter your 10 digit mobile number and send to recieve OTP."));
          goto end; 
          }  
          
 }
 
 if(is_numeric($message) && (strlen($message) == 4)){
 
   $path = 'variables.json';
 
 $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

   
    $mob_no = $myVarsArr["chat_id"][$chatId];
    $otp = $myVarsArr["otp"][$mob_no];      
    $myVarsJson = json_encode($myVarsArr);
  
      
     
      
      if($message == $otp){
      sendMessage($chatId,urlencode("Verification suceeded. \n\n Wanna get some good deals today? Click OK button below"), $defaultMarkup);
      goto end;
      }
      
      else{
      sendMessage($chatId,urlencode("Varification code you entered is invalid. \n\n Please, Start verification process again"), $startMarkup);
      goto end;
      }
     
      
	
 }
   
 
 switch($message){
 
 case "/start":
       
       sendMessage($chatId,urlencode("Please complete one time mobile number verification. \n\n Enter your 10 digit mobile number and send to recieve OTP."));
       break;
 
 
 
       
 
 case "oye".$invcomma:
       
       sendMessage($chatId,"Reply with your option",$encodedMarkup1);
       break;
 case $rocket."OK".$invcomma:
       
       sendMessage($chatId,"Please, Select your area of interest on the keyboard shown below",$encodedMarkup1);
       break;
       
 case "Andheri".$invcomma:
             
           sendMessage($chatId,"Please select property type.",$ptypeMarkup);
 
    
       break;
       
 case "Powai".$invcomma:
 
       if($location){
       
       fetchData($chatId,NULL,$location);
       }else{
       fetchData($chatId,"powai");
       
       }
       
       break;
 case $globe."PickLocation".$invcomma:
       
        sendMessage($chatId,"Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram)",$backlocMarkup);
          
       break;
 case "Residential".$invcomma:
 case "Commertial".$invcomma:
 case "Industrial".$invcomma:
       
       sendMessage($chatId,"Please select Transaction type",$ttypeMarkup);
       break;
       
 case "Rental".$invcomma:
 case "Sell".$invcomma:
 case "Loan".$invcomma:
 case "Auction".$invcomma:
 case "Builder".$invcomma:
       
       fetchData($chatId,"andheri");
       break;      
 
 
 
 case "1".$invcomma:
       
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\n Click below button to fix meeting"),$timeMarkup);
       break;
 case "2".$invcomma:
       
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\n Click below button to fix meeting"),$timeMarkup);
       break;
 case "3".$invcomma:
      
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\nClick below button to fix meeting"),$timeMarkup);
       break;  
 case "10 min".$invcomma:
 case "20 min".$invcomma:
 case $hourglass."Reschedule".$invcomma:  
       sendMessage($chatId,urlencode("Thanks for confirming the meeting time.\n Please meet client in promised time span\n your time is running".$hourglass),$endMarkup);    
       break; 
 case "Thanks".$nam.$invcomma:
       sendMessage($chatId,urlencode("Thanks".$nam),$endMarkup);
       break;
 default:
        
      sendMessage($chatId,$GLOBALS[santa]."Howdy Sir? Wanna get some hot deals today? Click OK button below",$defaultMarkup);
      
  
 }
 
 
 function sendMessage($chatId,$message,$encodedMarkup){
      
      file_get_contents($GLOBALS[site]."/sendmessage?chat_id=".$chatId."&text=" .$message."&reply_markup=".$encodedMarkup);
      }
    
 function fetchData($chatId,$region,$location){
    if($location){
         $long = $location["longitude"];
         $lat = $location["latitude"];
      
    } else{
         $long =NULL;
         $lat = NULL;
    }
    $url = 'http://52.25.136.179:9000/1/web/preok/';    
    $chatId = $chatId;
$data = array('user_role'=>'broker','gcm_id'=>'yo man','long'=>$long,'lat'=>$lat,'device_id'=>"telegram");
 
$content = json_encode($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');

$json_response = curl_exec($curl); 

 $uarray = json_decode($json_response, TRUE);
 
 

 $name1 = $uarray["responseData"][0]["name"];
 $name2 = $uarray["responseData"][1]["name"];
 $name3 = $uarray["responseData"][3]["name"];
 
 $spec1 = $uarray["responseData"][0]["spec_code"];
 $spec2 = $uarray["responseData"][1]["spec_code"];
 $spec3 = $uarray["responseData"][3]["spec_code"];
 
 $txt = urlencode("Click on the button below to grab deal \n\n 1.".$name1."-".$spec1."\n \n 2.".$name2."-".$spec2."\n \n 3.".$name3."-".$spec3);
  
 sendMessage($chatId,$txt,$GLOBALS[leadMarkup]);
 

   }
   
 function sendOtp($chatId,$message,$mob_no){  
 $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

 
 		$post_data = array(
    'From'   => '8808891988',
    'To'    => $mob_no,
    'Priority' => 'high',
    'Body'  => 'OTP from OyeOK = '.$otp.'. Thank you for registering',
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

$error = curl_error($ch);

$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 
curl_close($ch);
			
$path = 'variables.json';
 
 $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["otp"][$mob_no] = $otp;  
    $myVarsArr["chat_id"][$chatId] = $mob_no;

    $myVarsJson = json_encode($myVarsArr);
    $d = file_put_contents($path, $myVarsJson);
	
	return;	
   
   }
 end:
 
 
 ?> 