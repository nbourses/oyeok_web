<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OyeOk</title>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-validation.css">
	<link rel="stylesheet" href="assets/font-awesome.min.css">
	<!--link rel="stylesheet" type="text/css" href="oyeok.css"-->
	<script src="jquery-2.1.4.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQlYSu2KGEA2j9WbAMhdk4z13nDLucuY&signed_in=true"></script>
	<script src="oyeok.js"></script>
</head>
<header>
		<!--<h1>Freebie: 7 Clean and Responsive Forms</h1>
        <a href="http://tutorialzine.com/2015/07/freebie-7-clean-and-responsive-forms/">Download</a> -->
    </header>

<body>
<div class="main-content">
<div id="phverify_continer">
    <div class="form_lable">
        <h2>Your Location</h2>
        <div id ="youraddr"></div>
    </div>
    <form class="form-validation" id="ph_verify" action="phverify.php">
        <div class="form-title-row">
            <h1>OyeOK</h1>
        </div>
        <div class="form-row form-input-name-row">
            <label>
                <span>Enter Phone Number</span>
                <input id="phn_no" type="number" name="phone_no" value=""  minlength="10" maxlength="12">
             </label>
            </div>
            <input type="hidden" class="latitude" name="lat" value="">
                <input type="hidden" class="longitude" name="long" value="">
                    <script type="text/javascript">
						var geocoder = new google.maps.Geocoder();
					       if (navigator.geolocation) {
				   			    navigator.geolocation.getCurrentPosition(showPosition);
				   			} else { 
				   			    alert("Position not found");
				   			}
					  	function showPosition(position) {
					  		var lat =  position.coords.latitude ;
					  		var lng = position.coords.longitude ;
						   	$(".latitude").val(lat);
						  	$(".longitude").val(lng) ;
						  	console.log(lat);
						  	console.log(lng);
						  	var latlng = new google.maps.LatLng(lat, lng);
						  	geocoder.geocode({ 'latLng': latlng }, function (results, status) {
						  	    if (status == google.maps.GeocoderStatus.OK) {
						  	    	console.log(results);
						  	        var address = (results[1].formatted_address);
						  	    	$("#youraddr").html(address);
						  	    	
						  	    }
						  	});
						}
					</script>
                    <div class="form-row">
                        <button type="submit" value="Send OTP" id="send_otp">Send OTP</button>
                        <!--<input type="submit" value="Send OTP">-->
                    </div>
                </form>
                <div id="otp_verification" style="display:none">
                    <form class="form-validation" id="otp_verify">
                        <div class="form-row form-input-name-row">
                            <label>
                                <span>Enter OTP</span>
                                <input type="number" name="otp" minlength="4" maxlength="4">
                                </label>
                                <input type="hidden" id="otp_ph_no" name="phone_no" value="">
                                </div>
                                <div class="form-row">
                                    <button type="submit" value="Verify">Verify</button>
                                    <!--<input type="submit" value="Send OTP">-->
                                </div>
                            </form>
                        </div>
                    </div>
	<div id="hail_container" style="display:none;">
	
	<form class="form-validation" id="hail" action="hail.php" method = "post" >
	
		   <div class="form-title-row">
                <h1>OyeOK</h1>
            </div>
	
		
		
		<div class="form-row form-input-name-row">
		
		<label>
                    <span>Enter Phone Number</span>
					 <input id="oye_phn_no" type="number" name="phone_no" minlength="12" maxlength="12">
					 </label>
			<input type="hidden" class="latitude" name="lat" value="">
			<input type="hidden" class="longitude" name="long" value="">
                
			</div>
		
		
		
		<div class="form-row">
		
		<label class="form-checkbox">
                    <span>What do you want to do?</span>
					 <input type="radio" name="property" value="req" checked> See Property
                     <input type="radio" name="property" value="avl"> Show Property
					 </label>
					
			</div>
			
		<div class="form-row">
		
		<label class="form-checkbox">
                    <span>Intend</span>
					 <input type="radio" name="intend" value="ll" checked> Rent
                     <input type="radio" name="pintend" value="or"> Sell
					 </label>
					 
			</div>
		
		<div class="form-row form-input-name-row">
		
		<label>
                    <span>Size </span>
					 <input type="number" name="size" maxlength="12"> BHK
					 </label>
			</div>
			
			
			<div class="form-row form-input-name-row">
		
		<label>
                    <span>Budget </span>
					 <input type="number" name="budget" maxlength="12"> LAKH
					 </label>
			</div>
		

		
		
		
		
		<div class="form-row">
		    
			<button type="submit" value="hail">Hail</button>
				<!--<input type="submit" value="Send OTP">-->
			</div>
		
	</form>
	</div>	
		
	</div>
	<div id="mytest"></div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

    $(document).ready(function() {

        // Here is how to show an error message next to a form field

        var errorField = $('.form-input-name-row');

        // Adding the form-invalid-data class will show
        // the error message and the red x for that field

        errorField.addClass('form-invalid-data');
        errorField.find('.form-invalid-data-info').text('Please enter your mobile no. to verify!');


        // Here is how to mark a field with a green check mark

        var successField = $('.form-input-email-row');

        successField.addClass('form-valid-data');
    });

</script>

</body>
</html>