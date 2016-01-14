<?php

$tok ="127856919:AAFrmxafGUy9-UvzWrz894F3s1PTcKdYTMI";
 $site = "https://api.telegram.org/bot".$tok;

 $update = file_get_contents("php://input");
 $uarray = json_decode($update, TRUE);
 
 
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
   if($c == 4){
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
// Only save if controller value is matched
    $myVarsArr["lat"][$chatId] = $lat;  
    $myVarsArr["long"][$chatId] = $long;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
}
}
$unglileft = "\xF0\x9F\x91\x88";
$plus = "\xE2\x9E\x95";
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
$earth = "\xF0\x9F\x8C\x8D";
$back = "\xF0\x9F\x94\x99";
/* if(c==10 && !(lat) && !(long)){
 $message = "Location";
 }
 */
 
  if($message == $rocket."start"){
  $message = "/start";
 }
 if($message == $tel."Change no."){
  $message = "/start";
 }
 
 
 $ptypeMarkup = array(
    'keyboard' => array(
        array("House", "Shop"),array("Office", "Industrial"),array("Other", $back." to intend")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$ptypeMarkup = json_encode($ptypeMarkup);

$ttypeMarkup = array(
    'keyboard' => array(
        array("Rental", "Sale"),array("Under Construction Project"),array("Ready Possession Project"),array("Loan", "Auction",$unglileft." Back ".$earth)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$ttypeMarkup = json_encode($ttypeMarkup);

$bhkMarkup = array(
    'keyboard' => array(
        array("1bhk", "2bhk"),array("3bhk","4".$plus."bhk"),array($back." to property type")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$bhkMarkup = json_encode($bhkMarkup);
 
 
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
 
 $seeshowMarkup = array(
    'keyboard' => array(
        array("Give Property".$invcomma),
        array("Take Property".$invcomma),
		array($back. "to transaction type"),
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$seeshowMarkup = json_encode($seeshowMarkup);

 
$leadMarkup = array(
    'keyboard' => array(
        array("1".$invcomma, "2".$invcomma, "3".$invcomma),array("4".$invcomma, "5".$invcomma, "6".$invcomma),array("7".$invcomma, "8".$invcomma, "9".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$leadMarkup = json_encode($leadMarkup); 

$initialMarkup = array(
    'keyboard' => array(
        array($money."Grab deal".$invcomma, $tel."Trade contact".$invcomma),array("OKwallet = 0".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$initialMarkup = json_encode($initialMarkup);

$blankMarkup = array(
    'keyboard' => array(
   
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$blankMarkup = json_encode($blankMarkup);

$shoptypeMarkup = array(
    'keyboard' => array(
        array("Retail", "Food outlet"),array("Bank/office"),array($back." to property type")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$shoptypeMarkup = json_encode($shoptypeMarkup);

$indtypeMarkup = array(
    'keyboard' => array(
        array("Cold storage", "Kitchen"),array("Warehouse", "Office space"),array("Manufacturing", "Workshop"),array($back." to property type")
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$indtypeMarkup = json_encode($indtypeMarkup);
 
$backtoptypeMarkup = array(
    'keyboard' => array(
      array($back." to property type".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtoptypeMarkup = json_encode($backtoptypeMarkup); 

$backtobhkMarkup = array(
    'keyboard' => array(
      array($back." to rooms".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtobhkMarkup = json_encode($backtobhkMarkup);

$backtoshopMarkup = array(
    'keyboard' => array(
      array($back." to shoptype".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtoshopMarkup = json_encode($backtoshopMarkup);

$backtoseatsMarkup = array(
    'keyboard' => array(
      array($back." to seats".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtoseatsMarkup = json_encode($backtoseatsMarkup);


$backtoindMarkup = array(
    'keyboard' => array(
      array($back." to types".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtoindMarkup = json_encode($backtoindMarkup);

$backtoreqMarkup = array(
    'keyboard' => array(
      array($back." to req".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtoreqMarkup = json_encode($backtoreqMarkup);
 
 $backtobudgetMarkup = array(
    'keyboard' => array(
      array($back." to budget".$invcomma)
    ),'resize_keyboard' => True,'one_time_keyboard' => True
);
$backtobudgetMarkup = json_encode($backtobudgetMarkup);
 
 
switch($message){

 
 case "/start":
       $c = 0;
       $c=$c+2;
       $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
    $myVarsArr["controller"][$chatId] = $c;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   //userexists($chatId);
   sendMessage($chatId,urlencode($GLOBALS[rightarr]." Hi ".$fname.", Please enter your 10 digit mobile number.".$c));
       break;
  
 


 case "Location":
     if($c == 4 && $location){
       // fetchData($chatId,$location);
       controller($chatId);
       sendMessage($chatId,urlencode("Please select transaction type.".$c), $ttypeMarkup);
       
     }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
case $money."Grab deal".$invcomma:
sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c);
break;

// all backs
case $unglileft." Back ".$earth:
thugcontroller($chatId);
sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c);
break;


case $back. "to transaction type":
thugcontroller($chatId);
sendMessage($chatId,urlencode("Please select transaction type.".$c), $ttypeMarkup);
break;


case $back." to intend":
thugcontroller($chatId);
sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
break;
case $back." to property type":
thugcontroller($chatId);
sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
break;  

case $back." to rooms".$invcomma:
thugcontroller($chatId);
sendMessage($chatId,"Please select no. of rooms".$c,$bhkMarkup);
break; 

case $back." to shoptype".$invcomma:
thugcontroller($chatId);
sendMessage($chatId,"Please select no. of rooms".$c,$shoptypeMarkup);
break;


case $back." to types".$invcomma:
thugcontroller($chatId);
sendMessage($chatId,"Please select type".$c,$indtypeMarkup);
break;


case $back." to budget".$invcomma:
thugcontroller($chatId);
$path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $ptype = $myVarsArr["ptype"][$chatId];

if($ptype == "House"){
	sendMessage($chatId,urlencode("Enter your budget in".$ptype." Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtobhkMarkup);
  
	}
if($ptype == "Shop"){
	sendMessage($chatId,urlencode("Enter your budget in".$ptype." Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoshopMarkup);
  
	}
if($ptype == "Office"){
	sendMessage($chatId,urlencode("Enter your budget in".$ptype." Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoseatsMarkup);
  
	}
if($ptype == "Industrial"){
	sendMessage($chatId,urlencode("Enter your budget in".$ptype." Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
  
	}	
	
if($ptype == "Other"){
	sendMessage($chatId,urlencode("Enter your budget in".$ptype." Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoreqMarkup);
  
	}

break;



// Back to enter your requirements
case $back." to req".$invcomma:
$c = -3;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $c;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
sendMessage($chatId,"Feel free to type down your requirements.".$c,$backtoptypeMarkup);
break;


//back to no of seats

case $back." to seats".$invcomma:

 $c = -4;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $c;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);

sendMessage($chatId,"Please enter no. of seats".$c,$backtoptypeMarkup);
break;



//back from no. of seats

case $back." to property type".$invcomma:
    $c = 7;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $c;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
 
sendMessage($chatId,"Please select property typer.".$c,$ptypeMarkup);
break;  

case "Take Property".$invcomma:     
   if($c == 6){
       controller($chatId);
      saveintend($chatId,"Take Property");
     sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       } 
      
       break;  
   
  case "Give Property".$invcomma:     
   if($c == 6){
       controller($chatId);
      saveintend($chatId,"Give Property");
     sendMessage($chatId,"Please select property type.".$c,$ptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       } 
      
       break;   
       
    case "Rental":     
   if($c == 5){
       controller($chatId);
       savettype($chatId,Rental);
       
      sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
  
  case "Sale":     
   if($c == 5){
       controller($chatId);
       savettype($chatId,Sale);
       sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
  
  case "Loan":     
   if($c == 5){
       controller($chatId);
       savettype($chatId,Loan);
       sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
   
   case "Auction":     
   if($c == 5){
       controller($chatId);
       savettype($chatId,Auction);
       sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;
       
       case "Under Construction Project":     
   if($c == 5){
       controller($chatId);
       savettype($chatId,"Under Construction Project");
       sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break; 
       
   case "Ready Possession Project":     
   if($c == 5){
       controller($chatId);
       savettype($chatId,"Under Construction Project");
       sendMessage($chatId,"Hey broker, I want to.".$c,$seeshowMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;    
       
 case "House":     
   if($c == 7){
       controller($chatId);
       saveptype($chatId,House);
       sendMessage($chatId,"Select no. of rooms.".$c,$bhkMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;   
       
     case "Shop":     
   if($c == 7){
       controller($chatId);
       saveptype($chatId,Shop);
       sendMessage($chatId,"Select shop type.".$c,$shoptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
       
       case "Office":
   if($c == 7){
       
       $GLOBALS[c] = $GLOBALS[c] - 11;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $GLOBALS[c];  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
      
       saveptype($chatId,Office);
       sendMessage($chatId,"Enter no. of seats".$c,$backtoptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
       
  case "Industrial":     
   if($c == 7){
       controller($chatId);
       saveptype($chatId,Industrial);
       sendMessage($chatId,"Select type.".$c,$indtypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;      
       
       // types of office
  case "Retail":     
   if($c == 8){
       controller($chatId);
       saveshoptype($chatId,Retail);
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoshopMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;   
       
  case "Food outlet":     
   if($c == 8){
       controller($chatId);
       saveshoptype($chatId,"Food outlet");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoshopMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;        
    
  case "Bank/office":     
   if($c == 8){
       controller($chatId);
       saveshoptype($chatId,"Bank/office");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoshopMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;       
   // Industrial     
       
 case "Cold storage":     
   if($c == 8){
       controller($chatId);
       saveindtype($chatId,"Cold storage");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;   
       
 case "Kitchen":     
   if($c == 8){
       controller($chatId);
       saveindtype($chatId,"Kitchen");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;       
       
       case "Warehouse":     
   if($c == 8){
       controller($chatId);
       saveindtype($chatId,"Warehouse");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;       
    
   case "Office space":     
   if($c == 8){
       controller($chatId);
       saveindtype($chatId,"Office space");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;  
 
 case "Manufacturing":     
   if($c == 8){
       controller($chatId);
       saveindtype($chatId,"Manufacturing");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break; 
       
  case "Workshop":     
   if($c == 8){
       controller($chatId);
       saveindtype($chatId,"Workshop");
       sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoindMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;      
       
   case "Other":     
   if($c == 7){
       $GLOBALS[c] = $GLOBALS[c] - 10;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $GLOBALS[c];  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
      
       saveptype($chatId,Other);
       sendMessage($chatId,"Feel free to type down your requirements.".$c,$backtoptypeMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;   
       
            
  
  
  
 
  
  case "1bhk":     
   if($c == 8){
       controller($chatId);
       savebhk($chatId,"1bhk");
       sendMessage($chatId,urlencode("Enter your budgetin Rupees (without any comma)\n\n".$rightarr." for eg. 35000").$c,$backtobhkMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;                  
    case "2bhk":     
   if($c == 8){
       controller($chatId);
       savebhk($chatId,"2bhk");
       sendMessage($chatId,urlencode("Enter your budgetin Rupees (without any comma)\n\n".$rightarr." for eg. 35000").$c,$backtobhkMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break; 
       
       case "3bhk":     
   if($c == 8){
       controller($chatId);
       savebhk($chatId,"3bhk");
       sendMessage($chatId,urlencode("Enter your budgetin Rupees (without any comma)\n\n".$rightarr." for eg. 35000").$c,$backtobhkMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
       break;         
   case "4".$plus."bhk":     
   if($c == 8){
       controller($chatId);
       savebhk($chatId,"4+bhk");
       sendMessage($chatId,urlencode("Enter your budgetin Rupees (without any comma)\n\n".$rightarr." for eg. 35000").$c,$backtobhkMarkup);
       goto end;
      }
      else{
       sendMessage($chatId,urlencode("See.. copypasting doesn't work, I am programmed smartly, so dont try to trick me. please follow my instructions, I am here to help you. Click on ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
   goto end;
       }  
      
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
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
     }
   break; 
   
   case "6".$invcomma:
   if($c == 5){
      $okToken = 6;
      ok($chatId,$okToken);
      }else{
     
     sendMessage($chatId,urlencode("This is an unexpected input, please follow my instructions, I am here to help you. Click on  ".$rocket."start button below. \n\n And, if you keep spamming me like that, I will find you and I will kill you!".$youmadbro." Mind it!!!".$youmadbro.$gun), $startMarkup);
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
   
   default:
 
   if($c == 2){
   if(preg_match('/^[7-9][0-9]{9}$/',$message)){
   
   $path = 'voyevars.json';
  
    $myVarsJson = file_get_contents($path);
    
    $myVarsArr = json_decode($myVarsJson,true);
	if($myVarsArr["savepass"][$chatId] == $message){
	$c = 50;
	$path = 'voyevars.json';
  
    $myVarsJson = file_get_contents($path);
    
    $myVarsArr = json_decode($myVarsJson,true);
	$myVarsArr["controller"][$chatId] = $c;
    
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
     
	 sendMessage($chatId,$rightarr." Please enter client's name ".$c);
     
	 
	 //sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c);
      goto end;
	
	}
        elseif(array_key_exists($message,$myVarsArr[password])){
        $path = 'voyevars.json';
        $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
  
    $myVarsArr["chat_id"][$chatId] = $message;
    
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
        
        
        controller($chatId);
sendMessage($chatId,urlencode($rightarr."Please enter your password below(case sensitive).\n\n".$rightarr." To change mobile number click on  ".$tel."Change No. button below".$c),$changeNoMarkup);

goto end; 
}
else{
sendMessage($chatId,urlencode("This mobile no. is not authorized".$youmadbro." Please enter your authorized 10 digit mobile no."), $changeNoMarkup);
goto end; 

}
        
        
   //sendOtp($chatId,urlencode("We have sent you a 4 digit OTP.\n\n Please enter your 4 digit OTP to complete verification."),$message);
//sendMessage($chatId,urlencode($rightarr." We have sent you a 4 digit OTP.\n\n".$rightarr." Please enter your 4 digit OTP and SEND to complete verification.\n\n".$rightarr." To change mobile number click on  ".$tel."Change No. button below".$c),$changeNoMarkup);
        // goto end;
   
   } else {
       sendMessage($chatId,urlencode("You entered invalid mobile number number. \n\n Enter your 10 digit mobile number and send to recieve OTP."));
          goto end; 
   }
   }
 elseif($c == 50){ 
if(preg_match("/^[a-z,A-Z ,.'-]+$/",$message)){
 $path = 'voyevars.json';
        $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
  
    $myVarsArr["cname"][$chatId] = $message;
    	
   $myVarsJson = json_encode($myVarsArr);
   file_put_contents($path, $myVarsJson);
   controller($chatId);
   sendMessage($chatId,urlencode("Enter clients mobile number."));
     goto end;
       } else{
		   sendMessage($chatId,urlencode("Name you entered is invalid, please enter again."));
	  goto end;
	  }
 }  
 
 elseif($c == 51){ 
if(preg_match('/^[7-9][0-9]{9}$/',$message)){
   
   $path = 'voyevars.json';
  
    $myVarsJson = file_get_contents($path);
    
    $myVarsArr = json_decode($myVarsJson,true);
	
	$c = 4;
	
	$myVarsArr["cmob_no"][$chatId] = $message;
	$myVarsArr["controller"][$chatId] = $c;
    
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
     
	 sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c);
   goto end; 
 }  else{
	 sendMessage($chatId,urlencode("Mobile no you entered is invalid, please enter again."));
	 goto end;
 }
 }
 
 elseif($c == 3){ 
    $path = 'voyevars.json';
        $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
  
     $mob_no = $myVarsArr["chat_id"][$chatId];
    
    if($myVarsArr["password"][$mob_no]==$message){
	$path = 'voyevars.json';
        $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
  
    $myVarsArr["savepass"][$chatId] = $mob_no;
    	
   $myVarsJson = json_encode($myVarsArr);
   file_put_contents($path, $myVarsJson);
      
     controller($chatId);
     sendMessage($chatId,$globe." Please send your location as an attachment(click on the" .$paperclip. "icon on Telegram). We will connect you to the clients nearby.".$c);
      goto end;
      
    }  
      
      else{
      // Reduce c by one here
      thugcontroller($chatId);
      
      sendMessage($chatId,urlencode("Password you entered is wrong. \n\n Please, Enter again, or click on  ".$rocket."start to initiate mobile verification process once again".$c), $startMarkup);
      goto end;
      }	
    
    
    } 
   

elseif($c == 9){
   if(preg_match('/^[1-9][0-9]{4,8}$/',$message)){
  // sendOtp($chatId,urlencode("We have sent you a 4 digit OTP.\n\n Please enter your 4 digit OTP to complete verification."),$message);

     controller($chatId);
     // $c = 4;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
    
    $myVarsArr["budget"][$chatId] = $message;
    //$myVarsArr["controller"][$chatId] = $c;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
	$cname = $myVarsArr["cname"][$chatId];
	$cmob_no = $myVarsArr["cmob_no"][$chatId];
	$ttype = $myVarsArr["ttype"][$chatId];
	$intend = $myVarsArr["intend"][$chatId];
	$ptype = $myVarsArr["ptype"][$chatId];
	$budget = $myVarsArr["budget"][$chatId];
	if($ptype == "House"){
		
		$bhk = $myVarsArr["bhk"][$chatId];
		$txt = urlencode("Hi ".$fname.$GLOBALS[thumbsup]."\n Verify details below: \n\n".$rightarr." Name: ".$cname."\n".$rightarr." mobile no.: ".$cmob_no."\n".$rightarr." Transaction type: ".$ttype."\n".$rightarr." intend: ".$intend."\n".$rightarr." Property type: ".$ptype."\n".$rightarr." No. of rooms: ".$bhk."\n".$rightarr." Budget: ".$budget."\n");
 
 
    sendMessage($chatId,$txt,$backtobudgetMarkup);
		goto end;	
	}
	elseif($ptype == "Shop"){
		
		$shoptype = $myVarsArr["shoptype"][$chatId];
		$txt = urlencode("Hi ".$fname.$GLOBALS[thumbsup]."\n Verify details below: \n\n".$rightarr." Name: ".$cname."\n".$rightarr." mobile no.: ".$cmob_no."\n".$rightarr." Transaction type: ".$ttype."\n".$rightarr." intend: ".$intend."\n".$rightarr." Property type: ".$ptype."\n".$rightarr." Shop type: ".$shoptype."\n".$rightarr." Budget: ".$budget."\n");
 
 
    sendMessage($chatId,$txt,$backtobudgetMarkup);
		goto end;	
	}
	elseif($ptype == "Office"){
		
		$seats = $myVarsArr["seats"][$chatId];
		$txt = urlencode("Hi ".$fname.$GLOBALS[thumbsup]."\n Verify details below: \n\n".$rightarr." Name: ".$cname."\n".$rightarr." mobile no.: ".$cmob_no."\n".$rightarr." Transaction type: ".$ttype."\n".$rightarr." intend: ".$intend."\n".$rightarr." Property type: ".$ptype."\n".$rightarr." No of seats: ".$seats."\n".$rightarr." Budget: ".$budget."\n");
 
 
    sendMessage($chatId,$txt,$backtobudgetMarkup);
		goto end;	
	}
	elseif($ptype == "Industrial"){
		
		$indtype = $myVarsArr["indtype"][$chatId];
		$txt = urlencode("Hi ".$fname.$GLOBALS[thumbsup]."\n Verify details below: \n\n".$rightarr." Name: ".$cname."\n".$rightarr." mobile no.: ".$cmob_no."\n".$rightarr." Transaction type: ".$ttype."\n".$rightarr." intend: ".$intend."\n".$rightarr." Property type: ".$ptype."\n".$rightarr." Type: ".$indtype."\n".$rightarr." Budget: ".$budget."\n");
 
 
    sendMessage($chatId,$txt,$backtobudgetMarkup);
		goto end;	
	}
	elseif($ptype == "Other"){
		
		$requirements = $myVarsArr["requirements"][$chatId];
		$txt = urlencode("Hi ".$fname.$GLOBALS[thumbsup]."\n Verify details below: \n\n".$rightarr." Name: ".$cname."\n".$rightarr." mobile no.: ".$cmob_no."\n".$rightarr." Transaction type: ".$ttype."\n".$rightarr." intend: ".$intend."\n".$rightarr." Property type: ".$ptype."\n".$rightarr." Requirements: ".$requirements."\n".$rightarr." Budget: ".$budget."\n");
 
 
    sendMessage($chatId,$txt,$backtobudgetMarkup);
		goto end;	
	}
	
	
    sendMessage($chatId,"Verify your detais.",$backtobudgetMarkup);
	

         goto end;
   
   } 
   
  
   else {
       sendMessage($chatId,urlencode("You entered invalid budget.Please enter again.\n\n It should be in rupees, in range of(10000-999999999) \n ".$rightarr." For eg. 35000\n\n ".$rightarr."Click on  ".$rocket."start button below if you want to start once again."),$startMarkup);
          goto end; 
 
 }  
   }

elseif($c == -4){
   if(preg_match('/^[1-9][0-9]{1,2}$/',$message)){
  // sendOtp($chatId,urlencode("We have sent you a 4 digit OTP.\n\n Please enter your 4 digit OTP to complete verification."),$message);


 $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["seats"][$chatId] = $message;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    $c = 9;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $c;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoseatsMarkup);
         goto end;
   
   } else {
       sendMessage($chatId,urlencode("You entered invalid no 0f seats.Please enter again.\n\n It should be in range of(50-999) \n ".$rightarr." For eg. 50\n\n ".$rightarr."Click on  ".$rocket."start button below if you want to start once again."),$startMarkup);
          goto end; 
   }
   }


elseif($c == -3){

$path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["requirements"][$chatId] = $message;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    $c = 9;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $c;  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    sendMessage($chatId,urlencode("Enter your budget in Rupees (without any seperator)\n\n".$rightarr." for eg. 35000").$c,$backtoreqMarkup);
         goto end;
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
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $GLOBALS[c];  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
    
   }
 	
function yocontroller($chatId){
     $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
    $GLOBALS[c] = $myVarsArr["controller"][$chatId];
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   } 		

 function thugcontroller($chatId){
     $GLOBALS[c]--;
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["controller"][$chatId] = $GLOBALS[c];  
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
 
 function savebhk($chatId,$bhk){
     
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["bhk"][$chatId] = $bhk;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
 
 function saveshoptype($chatId,$type){
     
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["shoptype"][$chatId] = $type;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   } 
 
 function saveindtype($chatId,$type){
     
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["indtype"][$chatId] = $type;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   } 
 
  function saveintend($chatId,$intend){
     
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["intend"][$chatId] = $intend;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
 
 function saveptype($chatId,$ptype){
     
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["ptype"][$chatId] = $ptype;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	
   
   function savettype($chatId,$ttype){
     
    $path = 'voyevars.json';
 
    $myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);

    $myVarsArr["ttype"][$chatId] = $ttype;
    $myVarsJson = json_encode($myVarsArr);
    file_put_contents($path, $myVarsJson);
   }   	

 
 function userexists($chatId){


/*
$url = 'http://52.25.136.179:9000/telegram/alive/';    

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

$path = 'voyevars.json';
 
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
			
$path = 'voyevars.json';
 
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
   
   
   
 end:
 ?>