$(document).ready(function(){
	$("#ph_verify").on('submit', function (e) {
	e.preventDefault();
	$('#send_otp').hide();
	$.ajax({ 
			url: '/final/phverify.php',
	        type: 'post',
	        data: $('#ph_verify').serialize(),
	        success: function(data) {
	        		//alert("success");
	        	   	var k =$("#phn_no").val();
                 	$("#otp_ph_no").val(k);
                 	$('#oye_phn_no').val(k);
                 	$("#oye_phn_no").prop('readonly', true);
                 	$("#phn_no").prop('readonly', true);
                 	$("#otp_verification").show();
				},
			error: function(data) {
				//alert("failed Data :- ");
				console.log(data);
			}
		});
	});



	$("#otp_verify").on('submit', function (e) {
	//alert("otp_verify");
	e.preventDefault();
	$.ajax({ 
			url: '/final/otpverify.php',
	        type: 'post',
	        data: $(this).serialize(),
	        success: function(output) {
	                      if(output){
	                      	//alert("true");
	                      	$("#otp_verification").hide();
	                      	$("#phverify_continer").hide();
	                      	$("#hail_container").show();
	                      }
	                      else{
	                      	alert("Please check the OTP");
	                      }
	                  }
	});

	});

/*$("#hail").on('submit', function (e) {
	//alert("otp_verify");
	e.preventDefault();
	$.ajax({ 
			url: '/final/hail.php',
	        type: 'post',
	        data: $(this).serialize(),
	        success: function(output) {
	                     console.log(output);
	                  }
	});

	});*/


//end of document.ready()
});