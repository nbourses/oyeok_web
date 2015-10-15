$(document).ready(function(){
	
	//to send otp from ajax
	$("#to_send_otp").on('submit', function (e) {
	e.preventDefault();
	$('#to_send_otp').hide();
   	var k =$("#phone_no").val();
 	//$("#phone_no").val("");
 	$('#phone_no_otp').val(k);
 	$('#confirm_otp').show();
 	
 	//* Submit the form here
	$.ajax({ 
			url: 'phverify.php',
	        type: 'post',
	        data: $('#to_send_otp').serialize(),
	        success: function(data) {
	        		//alert("success");
	        	   	
                 	$("#oye_phn_no").prop('readonly', true);
                 	$("#phn_no").prop('readonly', true);
                 	$("#otp_verification").show();
				},
			error: function(data) {
				//alert("failed Data :- ");
				console.log(data);
			}
		});//*/
	});


	$("#confirm_otp").on('submit', function (e) {
	e.preventDefault();
	//alert("confirm_otp");
 	$("#phone_verification").hide()
 	$("#info_panel").show();
 	//* Submit the form here
	$.ajax({ 
			url: 'phverify.php',
	        type: 'post',
	        data: $('#to_send_otp').serialize(),
	        success: function(data) {
	        		//alert("success");
	        	   	var k =$("#phone_no").val();
                 	$("#oye_phn_no").prop('readonly', true);
                 	$("#phn_no").prop('readonly', true);
                 	$("#otp_verification").show();
                 	$("#phone_no_oye_form").val(k);
				},
			error: function(data) {
				//alert("failed Data :- ");
				console.log(data);
			}
		});
	});
	//change no button click
	$("#change_no").click( function() {
		$('#confirm_otp').hide();
		$('#to_send_otp').show();
		$("#phone_no").parent().parent().addClass("has-error");
	});

//for developing
//$("#phone_verification").hide()
//$("#info_panel").show();
//$("#switch_tabs").show();

	$(".go_ok").click(function(){
		//the CSS changes
		$("#switch_tabs").show();
		$("#info_panel").hide();
		$("#oye_container").hide();
		$("#ok_container").show();
		$(".go_oye_tab").addClass("not_selected_tab");
		$(".go_ok_tab").addClass("selected_tab");

		//e.preventDefault();
		$.ajax({
	    url      : 'ok.php',//note that this is setting the `url` property to the value of the `url` variable
	    data     : $("#to_send_otp").serialize(),
	    dataType : 'json',
	    type     : 'post',
	    success  : function(Result){
			console.log(Result);		
			alert(Result.responseData[0].name);
			alert(Result.responseData[2].mobile_no);
	        },
		error: function(Result) {
			alert('An error occurred');
			console.log(Result);
			}
	    });
	});

	$(".go_ok_tab").click(function(){
		//the CSS changes
		$(".go_oye_tab").addClass("not_selected_tab");
		$(".go_oye_tab").removeClass("selected_tab");
		$("#oye_container").hide();
		$("#ok_container").show();
		$(this).addClass("selected_tab");
		$(this).removeClass("not_selected_tab");

		//e.preventDefault();
		$.ajax({
	    url      : 'ok.php',//note that this is setting the `url` property to the value of the `url` variable
	    data     : $("#to_send_otp").serialize(),
	    dataType : 'json',
	    type     : 'post',
	    success  : function(Result){
			console.log(Result);		
			alert(Result.responseData[0].name);
			alert(Result.responseData[2].mobile_no);
	        },
		error: function(Result) {
			alert('An error occurred');
			console.log(Result);
			}
	    });
	});

	$(".go_oye").click(function(){
		$("#switch_tabs").show();
		$("#info_panel").hide();
		$("#ok_container").hide();
		$("#oye_container").show();
		$(".go_ok_tab").addClass("not_selected_tab");
		$(".go_oye_tab").addClass("selected_tab");
	});

	$(".go_oye_tab").click(function(){
		$(".go_ok_tab").addClass("not_selected_tab");
		$(".go_ok_tab").removeClass("selected_tab");
		$("#ok_container").hide();
		$("#oye_container").show();
		$(this).addClass("selected_tab");
		$(this).removeClass("not_selected_tab");
	});


	$("#oye_form").on('submit', function (e) {
		//alert("otp_verify");
		e.preventDefault();
		$.ajax({ 
				url: 'hail.php',
		        type: 'post',
		        data: $(this).serialize(),
		        success: function(output) {
		                     console.log(output);
		                  }
		});

		});



// end of document.ready()
});