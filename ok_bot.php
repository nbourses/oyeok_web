<?php

$tok ="156802898:AAHeHSUaNFqVPjkrGs-07fl7hV3sa-AgXUs";
 $site = "https://api.telegram.org/bot".$tok;
$botan_token = "ZY77joTvllhMR0RtqZS6MpzEyxrnYhAM";
 $update = file_get_contents("php://input");
 $uarray = json_decode($update, TRUE);
 $ragnar = json_encode($uarray);
 
 $chatId = $uarray["message"]["chat"]["id"];
 $message = $uarray["message"]["text"];
 $location = $uarray["message"]["location"];
 $fname = $uarray["message"]["chat"]["first_name"];
 $lname = $uarray["message"]["chat"]["last_name"];
 
 $name = $fname." ".$lname;

  $long = $uarray["message"]["location"]["longitude"];
 $lat = $uarray["message"]["location"]["latitude"];
   
 // Emoticons
yocontroller($chatId);

if($location){

$message = "Location";
$path = 'variables.json';
 if($c == 4){
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["lat"][$chatId] = $lat;  
    $myVarsArr["long"][$chatId] = $long;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);

}
}
$tel = "\xF0\x9F\x93\x9E";
$money = "\xF0\x9F\x92\xB0";
$thumbsup = "\xF0\x9F\x91\x8D";
$one = "\x31\xE2\x83\xA3";
$two = "\x32\xE2\x83\xA3";
$three = "\x33\xE2\x83\xA3";
$four = "\x34\xE2\x83\xA3";
$five = "\x35\xE2\x83\xA3";
$six = "\x36\xE2\x83\xA3";
$seven = "\x37\xE2\x83\xA3";
$eight = "\x38\xE2\x83\xA3";
$nine = "\x39\xE2\x83\xA3";
$rightarr = "\xE2\x9E\xA1";
$youmadbro = "\xF0\x9F\x98\x92";
$gun = "\xF0\x9F\x94\xAB";
$rocket = "\xF0\x9F\x9A\x80";
$santa = "\xF0\x9F\x8E\x85";
$hourglass = "\xE2\x8C\x9B";
$paperclip = "\xF0\x9F\x93\x8E";
$globe = "\xF0\x9F\x8C\x90";
$lol = "\xF0\x9F\x98\x86";
$nam = "\xF0\x9F\x99\x8F";
$invcomma = "\xE2\x81\xA3";
$back = "\xF0\x9F\x94\x99";

 
  if($message == $rocket."start"){
  $message = "/start";
 }
 if($message == $tel."Change no."){
  $message = "/start";
 }
 
 
 
 $startMarkup = array(
    'keyboard' => array(
        array($rocket."start")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$startMarkup = json_encode($startMarkup);
 $changeNoMarkup = array(
    'keyboard' => array(
        array($tel."Change no.")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$changeNoMarkup = json_encode($changeNoMarkup);
 

 
$leadMarkup = array(
    'keyboard' => array(
        array("1".$invcomma, "2".$invcomma, "3".$invcomma),array("4".$invcomma, "5".$invcomma, "6".$invcomma),array("7".$invcomma, "8".$invcomma, "9".$invcomma),array($back." to Location".$invcomma.$globe)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$leadMarkup = json_encode($leadMarkup); 

$initialMarkup = array(
    'keyboard' => array(
        array($money."Grab deal".$invcomma, $tel."Trade contact".$invcomma),array("OKwallet = 0".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$initialMarkup = json_encode($initialMarkup);
 
 $backtomenuMarkup = array(
    'keyboard' => array(
      array($back." to menu".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtomenuMarkup = json_encode($backtomenuMarkup);
 
switch($message){

 
 case "/start":
       $c = 0;
       $c++;
       $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
    $myVarsArr["controller"][$chatId] = $c;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
  botan($chatId,"start"); 
   userexists($chatId);
   //sendMessage($chatId,urlencode("Please complete one time mobile number verification. \n\n Enter your 10 digit mobile number and send to recieve OTP.".$c));
       break;
  
  //    

 case "Location":
     if($c == 4 && $location){   
        botan($chatId,"Location");
        fetchData($chatId,$location);
     }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
       
     }
   break; 
   
case $money."Grab deal".$invcomma:
sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c,$backtomenuMarkup);
break;   
   
   
case "1".$invcomma:
   if($c == 5){
      $okToken = 1;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break;
   
  case "2".$invcomma:
   if($c == 5){
      $okToken = 2;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
 case "3".$invcomma:
   if($c == 5){
      $okToken = 3;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break;   
   
   case "4".$invcomma:
   if($c == 5){
      $okToken = 4;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
   case "5".$invcomma:
   if($c == 5){
      $okToken = 5;
      ok($chatId,$okToken);
	  goto end;
      }
	  else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
   case "6".$invcomma:
   if($c == 5){
      $okToken = 6;
      ok($chatId,$okToken);
	  goto end;
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun.$c), $startMarkup);
     }
   break; 
   
   case "7".$invcomma:
   if($c == 5){
      $okToken = 7;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
  case "8".$invcomma:
   if($c == 5){
      $okToken = 8;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break;  
   
   case "9".$invcomma:
   if($c == 5){
      $okToken = 9;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
   //all backs
   
   
   case $back." to menu".$invcomma:
     $txt = urlencode("Hey ".$fname.", \n\n".$rightarr."Grab new leads.\n \n".$rightarr."Trade contact of impossible deals to get new deal opportunity in your OK wallet.\n \n".$rightarr."By default you can get upto five leads per day but if you trade one lead contact with us, your OKwallet will be credited with bonus leads for each contact you trade");
      sendMessage($chatId,$txt.$c,$initialMarkup);
   break; 
   
    case $back." to Location".$invcomma.$globe:
    thugcontroller($chatId);
	
     sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c,$backtomenuMarkup);

   break;
   
   
   default:
 
   if($c == 2){
   if(preg_match('/^[7-9][0-9]{9}$/',$message)){
   botan($chatId,"mobile_no");
   sendOtp($chatId,urlencode("We have sent you a 4 digit OTP.\n\n Please enter your 4 digit OTP to complete verification."),$message);
sendMessage($chatId,urlencode($rightarr." We have sent you a 4 digit OTP.\n\n".$rightarr." Please enter your 4 digit OTP and SEND to complete verification.\n\n".$rightarr." To change mobile number click on  ".$tel."Change No. button below".$c),$changeNoMarkup);
         goto end;
   
   } else {
       sendMessage($chatId,urlencode("You entered invalid mobile number number. \n\n Enter your 10 digit mobile number and send to recieve OTP."));
          goto end; 
   }
   }
 elseif($c == 3){
    if(is_numeric($message) && (strlen($message) == 4)){
    botan($chatId,"OTP");
    $path = 'variables.json';
 
 $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

 
    $mob_no = $myVarsArr["chat_id"][$chatId];
    $otp = $myVarsArr["otp"][$mob_no];      
   // $myVarsJson = json_encode($myVarsArr);
  //  $d = file_put_contents($path, $myVarsJson);
      
     controller($chatId);
      
      if($message == $otp){
      botan($chatId,"CorrectOTP");
      //sendMessage($chatId,urlencode("Verification suceeded. \n\n Click ".$rocket."sign up button below to proceed?".$c), $defaultMarkup);
      //sendMessage($chatId,"Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c,$initialMarkup);
      $txt = urlencode("Hey ".$fname.", \n\n".$rightarr."Grab new leads.\n \n".$rightarr."Trade contact of impossible deals to get new deal opportunity in your OK wallet.\n \n".$rightarr."By default you can get upto five leads per day but if you trade one lead contact with us, your OKwallet will be credited with bonus leads for each contact you trade");
      sendMessage($chatId,$txt.$c,$initialMarkup);
      goto end;
      }
      
      else{
      // Reduce c by one here
      thugcontroller($chatId);
      botan($chatId,"WrongOTP");
      sendMessage($chatId,urlencode("Varification code you entered is wrong. \n\n Please, Enter again, or click on  ".$rocket."start to initiate mobile verification process once again".$c), $startMarkup);
      goto end;
      }	
    
    
    } else {
       botan($chatId,"InvalidOTP");
      
       sendMessage($chatId,urlencode("Varification code you entered is invalid. \n\n Please, Enter again, or click on ".$rocket."start to initiate mobile verification process once again".$c), $startMarkup);
    goto end;
    } 
}   

elseif(($c >= 4) && is_numeric($message)){
   sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
}
else{
sendMessage($chatId,$GLOBALS[santa]."Howdy ".$name."? Wanna get some hot deals today? Click ".$rocket."start button belowp",$startMarkup); 


goto end;
}  

sendMessage($chatId,$GLOBALS[santa]."Howdy ".$name."? Wanna get some hot deals today? Click ".$rocket."start button belowq",$startMarkup);

 }
 
 
 function sendMessage($chatId,$message,$encodedMarkup){
      file_get_contents($GLOBALS[site]."/sendmessage?chat_id=".$chatId."&text=" .$message."&reply_markup=".$encodedMarkup);
      return;
      }


function controller($chatId){
    $GLOBALS[c]++;
    $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $GLOBALS[c];  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    
   }
 	
function yocontroller($chatId){
     $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
    $GLOBALS[c] = $myVarsArr["controller"][$chatId];
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   } 		

 function thugcontroller($chatId){
     $GLOBALS[c]--;
    $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $GLOBALS[c];  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
 
 

 
 function userexists($chatId){


/*
$url = 'http://52.25.136.179:9000/telegram/ok/';    

$data = array('chat_id'=>$chatId,'platform'=>'Telegram');
 
$content = json_encode($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');

$json_response = curl_exec($curl); */
$json_response = '{
  "errors": [],
  "exceptions": [],
  "success": true,
  "responseData": {
    "present":0,
    "ok_quota":3
  }
}';

 $uarray = json_decode($json_response, TRUE);
 $present = $uarray["responseData"]["present"];
 $okQuota = $uarray["responseData"]["ok_quota"];
 controller($chatId);
 if($present == 0){
    sendMessage($chatId,urlencode($GLOBALS[rightarr]." Hey ".$GLOBALS[fname].", Please complete one time mobile number verification.\n\n".$GLOBALS[rightarr]."Enter your 10 digit mobile number and send to recieve OTP.".$c));
        }
 elseif(!(okQuota)==0){
 

 sendMessage($chatId,"Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram)");
 }
 else{
 sendMessage($chatId,"your quota for the day is finished, please come tommorow.");
 
 }

$path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["user_id"][$chatId] = $userId;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);


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
//echo $http_result;
$error = curl_error($ch);
//echo $error;
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 
curl_close($ch);
			
$path = 'variables.json';
 
 $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["otp"][$mob_no] = $otp;  
    $myVarsArr["chat_id"][$chatId] = $mob_no;
    
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    controller($chatId);		
//sendMessage($chatId,$GLOBALS[santa]."yo man".$GLOBALS[c]);			
	
	return;	

   
   }  
   
   function fetchData($chatId,$location){
   
         $long = $location["longitude"];
         $lat = $location["latitude"];
      
    $url = 'http://52.25.136.179:9000/1/web/preok/';    
    
$data = array('user_role'=>'broker','gcm_id'=>'$chatId','long'=>$long,'lat'=>$lat,'device_id'=>"telegram");
  //  {"user_role":"broker", "gcm_id": "gyani","long":72.8356868, "lat":19.123057,"device_id":"hardware"}
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
 
 
$txt = urlencode("25Rs/sq.ft -Colaba(400005) \n ".$GLOBALS[thumbsup]."Rental deals: \n\n".$GLOBALS[one]." ".$name1."-".$spec1."\n \n".$GLOBALS[two]." ".$name2."-".$spec2."\n \n".$GLOBALS[three]." ".$name3."-".$spec3."\n----------------------------------------------------------\n\n 50,000Rs/sq.ft -Colaba(400005) \n".$GLOBALS[thumbsup]."Sale deals: \n\n".$GLOBALS[four]." ".$name1."-".$spec1."\n \n".$GLOBALS[five]." ".$name2."-".$spec2."\n \n".$GLOBALS[six]." ".$name3."-".$spec3."\n----------------------------------------------------------\n\n 9.55 interest rate -Colaba(400005) \n".$GLOBALS[thumbsup]."Loan deals: \n\n".$GLOBALS[seven]." ".$name1."-".$spec1."\n \n".$GLOBALS[eight]." ".$name2."-".$spec2."\n \n".$GLOBALS[nine]." ".$name3."-".$spec3);
 
 controller($chatId);
sendMessage($chatId,$txt,$GLOBALS[leadMarkup]);
 

   }
   
   
   function ok($chatId,$okToken){
        
 /*     
    $url = 'http://52.25.136.179:9000/1/preok/telegram/ok';    
    
$data = array('chat_id'=>$chatId,'ok_token'=>$okToken);
  //  {"chat_id":"1438743747945984","ok_token" :1}
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
 
 controller($chatId);
 sendMessage($chatId,$txt,$GLOBALS[leadMarkup]);
 
 */
 controller($chatId);
 sendMessage($chatId,urlencode("Client's mobile no. is ______\n\nYour cool off period is started, we will notify you after 30 seconds.".$GLOBALS[hourglass]));
 
 sleep(30);
 
 $path = 'variables.json';
    $c = 4;
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $c;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
 
 sendMessage($chatId,"30 seconds passed from last ok, you may want to ok once again.".$GLOBALS[thumbsup].$c,$GLOBALS[initialMarkup]);


   }
   
   function botan($chatId,$command){
      
//$txt = file_get_contents("https://api.botan.io/track?token=".$GLOBALS[botan_token]."&uid=".$chatId."&name=".$command);
//echo $txt;


 $url = "https://api.botan.io/track?token=".$GLOBALS[botan_token]."&uid=".$chatId."&name=".$command;    
    
//$data = array('user_role'=>'broker','gcm_id'=>'$chatId','long'=>$long,'lat'=>$lat,'device_id'=>"telegram");
  //  {"user_role":"broker", "gcm_id": "gyani","long":72.8356868, "lat":19.123057,"device_id":"hardware"}
//$content =  json_encode($data);
$content = $GLOBALS[ragnar];
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');

$json_response = curl_exec($curl); 

//sendMessage($chatId,$json_response);
//sendMessage($chatId,$command);
//sendMessage($chatId,$content);

      
      
      
      }
 
 
 end:
 ?>