<?php
$tok ="156802898:AAHeHSUaNFqVPjkrGs-07fl7hV3sa-AgXUs";
 $site = "https://api.telegram.org/bot".$tok;
 
 // Emoticons

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

 $update = file_get_contents("php://input");
 $uarray = json_decode($update, TRUE);
 
 
 $chatId = $uarray["message"]["chat"]["id"];
 $fname = $uarray["message"]["chat"]["first_name"];
 $lname = $uarray["message"]["chat"]["last_name"];
 $message = $uarray["message"]["text"];
 $name = $fname." ".$lname;
 
 
 
 
 if($message == $rocket."start"){
  $message = "/start";
 }
 
 
 $oyeokMarkup = array(
    'keyboard' => array(
        array($rocket."OyeOk")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$oyeokMarkup = json_encode($oyeokMarkup);
 
 $startMarkup = array(
    'keyboard' => array(
        array($rocket."start")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$startMarkup = json_encode($startMarkup);

$defaultMarkup = array(
    'keyboard' => array(
        array($rocket."Sign up".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$defaultMarkup = json_encode($defaultMarkup);


$threeMarkup = array(
    'keyboard' => array(
        array("Region1"),array("Region2", "Region3")),'resize_keyboard' => True,'one_time_keyboard' => True
);
$threeMarkup = json_encode($threeMarkup);

$fourMarkup = array(
    'keyboard' => array(
        array("Region1","region2"),array("Region3", "Region4")),'resize_keyboard' => True,'one_time_keyboard' => True
);
$fourMarkup = json_encode($fourMarkup);



$fiveMarkup = array(
    'keyboard' => array(
        array("Region1", "Region2"),array("Region3", "Region4"),array("Region5")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$fiveMarkup = json_encode($fiveMarkup);

$sixMarkup = array(
    'keyboard' => array(
        array("Region1", "Region2"),array("Region3", "Region4"),array("Region5","Region6")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$sixMarkup = json_encode($sixMarkup);

$ptypeMarkup = array(
    'keyboard' => array(
        array("Residential"),array("Commertial", "Industrial")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$ptypeMarkup = json_encode($ptypeMarkup);

$ttypeMarkup = array(
    'keyboard' => array(
        array("Rental", "Sell"),array("Loan", "Auction"),array("Builder")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
 );
$ttypeMarkup = json_encode($ttypeMarkup);

 $leadMarkup = array(
    'keyboard' => array(
        array("1", "2", "3")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$leadMarkup = json_encode($leadMarkup);

$timeMarkup = array(
    'keyboard' => array(
        array("10 min".$invcomma, "20 min".$invcomma), array($hourglass."Reschedule".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$timeMarkup = json_encode($timeMarkup);

yocontroller($chatId); 

if($c == 5){
 $path = 'tempvars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

   $reg1 = $myVarsArr["areg"][$chatId][1];  
     $reg2 = $myVarsArr["areg"][$chatId][2];
      $reg3 = $myVarsArr["areg"][$chatId][3];
       $reg4 = $myVarsArr["areg"][$chatId][4];
        $reg5 = $myVarsArr["areg"][$chatId][5];
     
 $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

   $reg = $myVarsArr["region"][$chatId];
 }



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
       
      sendMessage($chatId,urlencode("Please complete one time mobile number verification. \n\n Enter your 10 digit mobile number and send to recieve OTP.".$c));
       break;
   
  case "1":
       
       if($c == 8){
       // Function to send user choice to shlok
      
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\n Click below button to fix meeting"),$timeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("Invalid input, please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
 case "2":
       
        if($c == 8){
       // Function to send user choice to shlok
      
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\n Click below button to fix meeting"),$timeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("Invalid input, please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
       break;        
   
   case "3":
       
        if($c == 8){
       // Call unction to send user choice to erlang server
      
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\n Click below button to fix meeting"),$timeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("Invalid input, please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
       break;  
       
 case "4":
       
        if($c == 8){
       // Call function to send user choice to earlang server
      
       sendMessage($chatId,urlencode("Set time to meet property holder/seeker \n\n Click below button to fix meeting"),$timeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("Invalid input, please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
       break;        
   
   
 case $reg1:
      
       if($c == 5){
       controller($chatId);
       savereg($chatId,$reg1);
       sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
       
     case $reg2:
      
       if($c == 5){
       controller($chatId);
       savereg($chatId,$reg2);
       sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
       
       
        case $reg3:
      
       if($c == 5){
       controller($chatId);
       savereg($chatId,$reg3);
       sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;   
       
        case $reg4:
      
       if($c == 5){
       controller($chatId);
       savereg($chatId,$reg4);
       sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;    
       
        case $reg5:
      
       if($c == 5){
       controller($chatId);
       savereg($chatId,$reg5);
       sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
       
  case "Residential":     
   if($c == 6){
       controller($chatId);
       saveptype($chatId,Residential);
       sendMessage($chatId,"Please select property type.".$c,$ttypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;     
       
 // reduce it later, only one test for all regions
  case "Commertial":     
   if($c == 6){
       controller($chatId);
       saveptype($chatId,Commertial);
       sendMessage($chatId,"Please select property type.".$c,$ttypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
       
       
       case "Industrial":     
   if($c == 6){
       controller($chatId);
       saveptype($chatId,Industrial);
       sendMessage($chatId,"Please select property type.".$c,$ttypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;     
       
  case "Rental":     
   if($c == 7){
       controller($chatId);
       savettype($chatId,Rental);
       fetchdata($chatId);
      
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
  
  case "Sell":     
   if($c == 7){
       controller($chatId);
       savettype($chatId,Sell);
       sendMessage($chatId,"Please select transaction type.".$c,$leadMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
  
  case "Loan":     
   if($c == 7){
       controller($chatId);
       savettype($chatId,Loan);
       sendMessage($chatId,"Please select transaction type.".$c,$leadMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
   
   case "Auction":     
   if($c == 7){
       controller($chatId);
       savettype($chatId,Auction);
       sendMessage($chatId,"Please select transaction type.".$c,$leadMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
       
       case "Builder":     
   if($c == 7){
       controller($chatId);
       savettype($chatId,Builder);
       sendMessage($chatId,"Please select transaction type.".$c,$leadMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
   
 case $rocket."OyeOk":
       
       if($c == 4){
       oyeOk($chatId);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
   
       
 case $rocket."Sign up".$invcomma: 
     if($c == 3){
       
       signUp($chatId);  
      
    
      goto end;
       }
       else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
       break;        
       
 default:
       
       
      if($c == 1){
   if(preg_match('/^[7-9][0-9]{9}$/',$message)){
   sendOtp($chatId,urlencode("We have sent you a 4 digit OTP. \n\n Please enter your 4 digit OTP to complete verification."),$message);
sendMessage($chatId,urlencode("We have sent you a 4 digit OTP. \n\n Please enter your 4 digit OTP and SEND to complete verification. \n\n If you want to initiate verification process again then click on the ".$rocket."start button below".$c),$startMarkup);
         goto end;
   
   } else {
       sendMessage($chatId,urlencode("You entered invalid mobile number number. \n\n Enter your 10 digit mobile number and send to recieve OTP."));
          goto end; 
   }
   }
 elseif($c == 2){
    if(is_numeric($message) && (strlen($message) == 4)){
    $path = 'variables.json';
 
 $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

 
    $mob_no = $myVarsArr["chat_id"][$chatId];
    $otp = $myVarsArr["otp"][$mob_no];      
  
      
     controller($chatId);
      
      if($message == $otp){
      sendMessage($chatId,urlencode("Verification suceeded. \n\n Click ".$rocket."sign up button below to proceed?".$c), $defaultMarkup);
      goto end;
      }
      
      else{
      
      thugcontroller($chatId);
      
      sendMessage($chatId,urlencode("Varification code you entered is wrong. \n\n Please, Enter again, or click on  ".$rocket."start to initiate mobile verification process once again".$c), $startMarkup);
      goto end;
      }	
    
    
    } else {
      
       sendMessage($chatId,urlencode("Varification code you entered is invalid. \n\n Please, Enter again, or click on ".$rocket."start to initiate mobile verification process once again".$c), $startMarkup);
    
    }
}   

elseif(($c >= 3) && is_numeric($message)){
   sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
}
else{
sendMessage($chatId,$GLOBALS[santa]."Howdy Sir? Wanna get some hot deals today? Click ".$rocket."start button below",$startMarkup);
}
   
       
       
       
        
      
     
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
  function saveptype($chatId,$ptype){
     
    $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["ptype"][$chatId] = $ptype;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
   
   function savettype($chatId,$ttype){
     
    $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["ttype"][$chatId] = $ttype;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
   
   function savereg($chatId,$reg){
     
    $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["region"][$chatId] = $reg;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	


function fetchData($chatId,$region,$location){
    $path = 'variables.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

     $reg = $myVarsArr["region"][$chatId];  
     $ptype = $myVarsArr["ptype"][$chatId];
     $ttype = $myVarsArr["ptype"][$chatId];

   
    $url = 'http://52.25.136.179:9000/1/web/preok/';    
    $chatId = $chatId;
    $lat = 19.123057;
    $long = 72.8356868;
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
 
 controller(chatId); 
 sendMessage($chatId,$txt,$GLOBALS[leadMarkup]);
 

   }




function oyeOk($chatId){
$data = array('reg1'=>'Andheri west','reg2'=>'Andheri east','reg3'=>"Bandra",'reg4'=>'Powai','reg5'=>'Gilbert hill');
if(sizeof($data)==5){
$reg1 = $data["reg1"];
$reg2 = $data["reg2"];
$reg3 = $data["reg3"];
$reg4 = $data["reg4"];
$reg5 = $data["reg5"];

$path = 'tempvars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["areg"][$chatId][1] = $reg1;  
    $myVarsArr["areg"][$chatId][2] = $reg2;
    $myVarsArr["areg"][$chatId][3] = $reg3;
    $myVarsArr["areg"][$chatId][4] = $reg4;
    $myVarsArr["areg"][$chatId][5] = $reg5;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);

$dyMarkup = array(
    'keyboard' => array(
        array($reg1, $reg2),array($reg3, $reg4),array($reg5)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$dyMarkup = json_encode($dyMarkup);


}

 controller($chatId);
 sendMessage($chatId,urlencode("Thanks ".$GLOBALS[name].". Select your region of interest by clicking button below to get new leads.".$GLOBALS[c]),$dyMarkup);
 
}


function signUp($chatId){


$path = 'variables.json';
 
 $myVarsJson = file_get_contents($path);

    $myVarsArr = json_decode($myVarsJson,true);

   $mob_no = $myVarsArr["chat_id"][$chatId];  


$url = 'http://52.25.136.179:9000/1/user/signup/';    
    
$data = array('mobile_no'=>$mob_no,'mobile_code'=>'+91','email'=>"ritesh3warke@gmail.com",'name'=>$GLOBALS[name],'user_role'=>'broker','gcm_id'=>'yo man','long'=>78.8,'locality'=>'andheri west','platform'=>'telegram','lat'=>89.3,'device_id'=>$chatId);
  
$content = json_encode($data);
echo $content;
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_IPRESOLVE, 'CURL_VERSION_IPV6');

$json_response = curl_exec($curl); 


 $uarray = json_decode($json_response, TRUE);
 $userId = $uarray["responseData"]["user_id"];
 
 controller($chatId);
 sendMessage($chatId,urlencode("Thanks ".$GLOBALS[name]." for registering. Click OyeOk button below to get new leads.".$GLOBALS[c]."your userId is".$userId),$GLOBALS[oyeokMarkup]);
 
 
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

$error = curl_error($ch);
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
			
	
	return;	

   
   }  
   
  end: 
?>