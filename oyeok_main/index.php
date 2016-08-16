<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link type="text/css" rel="stylesheet" href="css/style.css">
      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80809675-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <nav>
    <div class="nav-wrapper " style="background:#011627;">
        <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large" style="margin-left:10px;z-index:0;"><i class="material-icons">menu</i></a>
      <ul class="side-nav" id="mobile-demo" style="background:#011627;" >
      <!-- <li style="margin-top:15px;"><a href="#" style="color:#fff"><img  src="img/oyeok.png" height="80px" width="80px" ></a></li>-->
        <li style="margin-top:80px;"><a href="index.php" style="color:#fff">Home</a></li>
        <li><a href="about.html" style="color:#fff">About Us</a></li>
      </ul>
        <div class="input-field teal accent-4"" style="margin-left:60px;">
          <input id="search" type="search" placeholder="Search Places"  onClick="onsearchClick()" onblur="onsearchBlur()" required>
          <label for="search"><i class="material-icons" style="color:#fff">search</i></label>
          <i class="material-icons">close</i>
        </div>
    </div>
  </nav>
  <div id="map"></div>
    <a  href="tel:+912233836068">
  <div  style="bottom: 75px; left: 15px;  height: 50px; width: 50px; z-index: 1; background:url(img/call.png) no-repeat; position:fixed; background-size:100% 100%;" id="call">
  
  
  </div>
  </a>

   <div class="row grey lighten-4 " style="position:fixed;bottom:-17px;width:100%; z-index:1; margin-bottom:-20px;">
    <div class="row" style="max-width:350px;">
      <div class="col s2 offset-s2" style="margin-left:25px;">
       <div style=""> <p class="right-align" id="renticon" ><img src="img/rent.png" width="30px" height="30px"><br>Rent</img></p> 
     </div> </div>
      <div class="col s6" style="" >
      <form action="#">
    <p class="range-field">
      <input type="range" id="rentsale" min="0" max="1" onchange="rentsClick()" style="color:#fff;" />
    </p>
  </form>
      </div>
      <div class="col s2">
        <p class="left-align" id="saleicon"  style=""><img src="img/sale.png" width="30px" height="30px"><br>Sale</p> 
      </div>
   </div>    
   </div>

    <div class="row grey lighten-4" style="position:fixed; bottom:50px;width:100%; z-index:4; font-size:15px;text-align:center;padding-top:10px;" id="ptype">
    <div class="row" style="text-align:left;margin-left:10px;">Select Type:</div>
   <div class="row">
      <div class="col s3" onclick="typeset(0)">
    <span style="border-style: solid;
    border-width: 2px;padding:7px;">
        Homes
      </span>
      </div>
      <div class="col s3" onclick="typeset(1)">
     <span style="border-style: solid;
    border-width: 2px;padding:7px; ">
      Shop
      </span>
      </div>

       <div class="col s3" onclick="typeset(2)">
     <span style="border-style: solid;
    border-width: 2px;padding:7px;">
      Industrial
      </span>
      </div>
       <div class="col s3" onclick="typeset(3)">
     <span style="border-style: solid;
    border-width: 2px;padding:7px;">
       Office
       </span>
      </div>
   </div>
   </div>
      
  
    </body>
      <script type="text/javascript">
(function(b,r,a,n,c,h,_,s,d,k){if(!b[n]||!b[n]._q){for(;s<_.length;)c(h,_[s++]);d=r.createElement(a);d.async=1;d.src="https://cdn.branch.io/branch-latest.min.js";k=r.getElementsByTagName(a)[0];k.parentNode.insertBefore(d,k);b[n]=h}})(window,document,"script","branch",function(b,r){b[r]=function(){b._q.push([r,arguments])}},{_q:[],_v:1},"addListener applyCode banner closeBanner creditHistory credits data deepview deepviewCta first getCode init link logout redeem referrals removeListener sendSMS setIdentity track validateCode".split(" "), 0);
branch.init('key_live_gpoR1VetegoPeRneNULC1oldDsi2k2bc');
branch.banner({
    icon: 'img/oyeok.png',
    title: 'Oye Ok',
    description: 'Download the App Now!',
    phonePreviewText: '+44 9999-9999',
    openAppButtonText: 'Open',              // Text to show on button if the user has the app installed
    downloadAppButtonText: 'Download',      // Text to show on button if the user does not have the app installed
    sendLinkText: 'Send Link',
    showiOS: true,                          // Should the banner be shown on iOS devices?
    showAndroid: true,                      // Should the banner be shown on Android devices?
    showDesktop: true,                      // Should the banner be shown on desktop devices?
    disableHide: true,                     // Should the user have the ability to hide the banner? (show's X on left side)
    forgetHide: true,  
    mobileSticky: true,                    // Determines whether the mobile banner will be set `position: fixed;` (sticky) or `position: absolute;`, defaults to false *this property only applies when the banner position is 'top'
    desktopSticky: true,
    iframe: true,       
}, {});
</script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
     <script type="text/javascript" src="js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZO6WvwRWW1D2w9RrCYmFtUO572Ml_hmQ  
    &libraries=places&callback=initMap" async defer></script>
    
  </html>