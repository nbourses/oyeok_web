<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <title>OyeOK</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <link rel="stylesheet" href="./bootstrap.css" media="screen">
	    <link rel="stylesheet" href="../assets/css/custom.min.css">
	    <link rel="stylesheet" type="text/css" href="oyeok.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="oyeok.js"></script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQlYSu2KGEA2j9WbAMhdk4z13nDLucuY&signed_in=true"></script>
    </head>
    <body>
    	<div class="navbar navbar-default navbar-fixed-top">
    		<div class="container">
    			<div class="navbar-header"><span class="navbar-brand">OyeOk</span></div>
    		</div>
    	</div>
    	<!--Phone Verifictation Container strats-->
    	<div id="phone_verification" class="container">
    		<div class="row">
		        <div class="col-lg-12">
		            <div class="page-header">
		              <h3>Phone Verification</h3>
		            </div>
	        	</div>
	        	<div class="panel panel-info">
	        	  <div class="panel-heading">Your Location</div>
	        	  <div class="panel-body" id ="youraddr">
	        	    
	        	  </div>
	        	</div>
	           	<form id="to_send_otp" class="form-vertical">
	        		<fieldset>
	        			<div class="form-group">
	        			  <label for="phone_no" class="col-lg-2 control-label">Phone Number</label>
	        			  <div class="col-lg-10">
	        			    <input type="number" class="form-control" id="phone_no" placeholder="Phone Number" name="phone_no">
	        			  </div>
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
	        			<div class="form-group">
	        			  <div class="col-lg-10 col-lg-offset-4">
	        			        <button type="submit" class="btn btn-success col-xs-4">Send OTP</button>
	        			  </div>
	        			</div>
	        		</fieldset>
	        	</form>
	        	<form id="confirm_otp" class="form-vertical" style="display:none">
	        		<fieldset>
	        			<div class="form-group">
	        			  <label for="phone_no_otp" class="col-lg-2 control-label">Phone Number</label>
	        			  <div class="col-lg-10">
	        			    <input type="number" class="form-control" id="phone_no_otp" placeholder="Phone Number" readonly name="phone_no">
	        			  </div>
	        			</div>
	        			<div class="form-group">
	        			  <label for="otp" class="col-lg-2 control-label">OTP</label>
	        			  <div class="col-lg-10">
	        			    <input type="number" class="form-control" id="otp" placeholder="Enter OTP"  name="otp" minlength="4" maxlength="4">
	        			  </div>
	        			</div>
	        			<div class="form-group">
	        			  <div class="col-xs-12">
	        			    <button type="submit" class="btn btn-success col-xs-4 ">Verify</button>
	        			    <button id="change_no" type="reset" class="btn btn-default col-xs-4 col-xs-offset-1">Change No</button>
	        			  </div>
	        			</div>  
	        		</fieldset>
	        	</form>
	        </div>
    	</div>
    	<div class="container" id="info_panel" style="display:none">
    		<div class="row">
	    		<div class="panel panel-default oye_panel">
	    		  <div class="panel-heading">
	    		    <h3 class="panel-title">OYE</h3>
	    		  </div>
	    		  <div class="panel-body">
	    		    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam laoreet malesuada lorem non luctus. Quisque eleifend ante nunc, in finibus mi efficitur id. Vestibulum congue.
	    		    <div class="btn btn-primary go_oye">Oye</div>
	    		  </div>
	    		</div>
	    		<div class="panel panel-default ok_panel">
	    		  <div class="panel-heading">
	    		    <h3 class="panel-title">OK</h3>
	    		  </div>
	    		  <div class="panel-body">
	    		   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam laoreet malesuada lorem non luctus. Quisque eleifend ante nunc, in finibus mi efficitur id. Vestibulum congue.
	    		    <div class="btn btn-primary go_ok">Ok</div>
	    		  </div>
	    		</div>
	    	</div>	
    	</div>
    	<!--Oye Container strats-->
    	<div class="container">

	    	<div id="switch_tabs" class="bs-component" style="display:none">
	    		<div class="btn-group btn-group-justified">
				  <div class="btn col-xs-6 go_oye_tab">Oye</div>
				  <div class="btn col-xs-6 go_ok_tab">Ok</div>
				</div>
			</div>	

    	</div>

    	<div id="oye_container" class="container" style="display:none">
    		<div id="oye_container_row">
    			<form id="oye_form" class="form-vertical">
	        		<fieldset>
        			    <input type="hidden" class="form-control" id="phone_no_oye_form" name="phone_no">
	        			<input type="hidden" class="latitude" name="lat" value="">
						<input type="hidden" class="longitude" name="long" value="">
        				<div class="form-group">
		                    <label class="col-lg-2 control-label">What do you want to do ?</label>
		                    <div class="col-lg-10">
		                      <div class="radio">
		                        <label>
		                          <input type="radio" name="property" id="optionsRadios1" value="req" checked="">
		                          See Property
		                        </label>
		                      </div>
		                      <div class="radio">
		                        <label>
		                          <input type="radio" name="property" value="avl" id="optionsRadios2">
		                          Show Property
		                        </label>
		                      </div>
		                   </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-lg-2 control-label">Intend</label>
		                    <div class="col-lg-10">
		                      <div class="radio">
		                        <label>
		                          <input type="radio" name="intend" id="optionsRadios1" value="ll" checked="">
		                          Rent
		                        </label>
		                      </div>
		                      <div class="radio">
		                        <label>
		                          <input type="radio" name="intend" id="optionsRadios2" value="or">
		                          Sell
		                        </label>
		                      </div>
		                   </div>
		                </div>
		                <div class="form-group">
		                    <label for="size" class="col-lg-2 control-label">Size (BHK)</label>
		                    <div class="col-lg-10">
		                      <select class="form-control" name="size" id="size">
		                        <option>0</option>
		                        <option>1</option>
		                        <option>2</option>
		                        <option>3</option>
		                        <option>4</option>
		                      </select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="budget" class="col-lg-2 control-label">Budget</label>
		                    <div class="col-lg-10">
		                      <input type="number" class="form-control" name="budget" id="budget">
		                    </div>
		                 </div>
	        			<div class="form-group">
	        			  	<div class="col-xs-12">
	        			    	<button type="submit" value="hail" class="btn btn-success col-xs-8 col-xs-offset-2">Hail</button>
							</div>
	        			</div>  
	        		</fieldset>
	        	</form>
    		</div>
    	</div>
    	<!--OK Container strats-->
    	<div id="ok_container"  class="container" style="display:none">
    		<div id="ok_container_row">
		    	<br>Test<br>Test<br>Test<br>Test<br>Test<br>Test<br>Test<br>Test<br>Test<br>Test<br>Test    
	        </div>
    	</div>
    </body>