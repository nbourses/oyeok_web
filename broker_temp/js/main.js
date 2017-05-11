									

         $( document ).ready(showlisting());


         function showlisting()
         {

         		$.ajax({
         			type:'GET',
         			url:"get.php",
         			data:{},
         			success:function(data)
         			{
         					fdata=JSON.parse(data);
         					console.log(fdata);

         					for(var i=0;i<fdata.length;i++) {
         					
         						$(".alllist").append("<div class=\"col-sm-2 col-lg-3 col-md-3\"><div class=\"thumbnail\"><img src=\"img/razernew.jpg\" onclick=\"openModal();currentSlide(1)\" class=\"hover-shadow cursor\"><div class=\"caption\">"+fdata[i].buildingName+"</div></div></div>");

         					}

         					

         			},
         			error:function()
         			{
         				console.log("bc error");
         			}

			})
         }