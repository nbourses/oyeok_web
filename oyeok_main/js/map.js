var map;
var location_icon_c;
var location_icon;
var oye_icon_c;
var locality;
var location2;
var oye_icon;
var marker=[];
var infoWindow;
var info=[];
var type=["HOME","SHOP","IND","OFF"];
var flag_sclick=0;
var rent_sale_flag=0;
var property_type=0;
function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 19.1136, lng: 72.8697},
          zoom: 14,
          zoomControl: true,
          mapTypeControl: false,
          scaleControl: true,
          streetViewControl: false,
          rotateControl: true,
          fullscreenControl:false,
          disableDefaultUI: true
        });
        infowindow= new google.maps.InfoWindow({disableAutoPan: true});
        infowindow.setZIndex(100);
         for(i=0;i<10;i++)
        {
          var markers = new google.maps.Marker({
            "icon": 'img/tower.png',
          });
          marker.push(markers);
        }
        locateUser();
        detectmobile();
        var locControlDiv = document.createElement('div');
        var locControl = new locControlc(locControlDiv, map);

        locControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(locControlDiv);

      

      /* var typeControlDiv = document.createElement('div');
        var typeControl = new typeControlc(typeControlDiv, map);

        typeControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(typeControlDiv);*/
         geocoder = new google.maps.Geocoder;

         $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
             //do something onclick
            .click(function(){
            });

          $('<div/>').addClass('flyMarker').appendTo(map.getDiv())
             //do something onclick
            .click(function(){
            });



        var input = (document.getElementById('search'));
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          $("#search").blur();
          if (!place.geometry) {
           // window.alert("Autocomplete's returned place contains no geometry");
            geocodeAddress(geocoder,map);
            new_position(1);
            return;
          }
          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
            map.setCenter(17);
            new_position(1);
          } 
          else {
            map.setCenter(place.geometry.location);
            map.setZoom(14);
            new_position(1);  // Why 17? Because it looks good.
          }
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }
        }); 

          map.addListener('idle',function()
          {
            if(flag_sclick==0){
             new_position(1);
             infowindow.close();
           }

          });

          map.addListener('dblclick',function()
          {
            document.getElementById("ptype").style.visibility="hidden";
            if(flag_sclick==0){
             new_position(1);
             infowindow.close();
           }

          });

          map.addListener('dragstart',function()
          {
            document.getElementById("ptype").style.visibility="hidden";
             for(var i=0;i<10;i++)
                marker[i].setMap(null);
          });



          google.maps.event.addDomListener(window, "resize", function() {
              var center = map.getCenter();
              document.getElementById("ptype").style.visibility="hidden";
              google.maps.event.trigger(map, "resize");
              map.setCenter(center); 
          });
        }


        function getPrice(latlng)
        {
            var counter;
            $.ajax({
              type:"POST",
              url:"get_price.php",
              dataType:"json",
              data:{
                long:latlng.lng(),
                lat:latlng.lat(),
                gcm_id:"123456789"
              },
              success:function(data){
                if(data.responseData.price.message==("We dont cater here yet"))
                  {$(".flyMarker").text("Sorry We Dont Cater Here");
                  }
                else{
                //$("div#rate").text("MinRate:"+data.responseData.price.or_min+" MaxRate:"+data.responseData.price.or_max+" Sq/ft");  
    
                 if(rent_sale_flag==0)
                   $(".flyMarker").html("<div class='typemark'>"+type[property_type]+"</div><div style='margin-left:10px;margin-top:7px;'><span style=' font-size:10px;'>Average Rate @ "+locality+" | Area 950sqft.</span><br><span style='color:#2bc3b4;font-size:17px;'>Min: \u20B9 "+(data.responseData.price.ll_min.valueOf()*1000)+",&nbsp;&nbsp;Max: \u20B9 "+(data.responseData.price.ll_max.valueOf()*1000)+"</span><span style='color:#2bc3b4;'>/month</span></div>");
                 else
                   $(".flyMarker").html("<div class='typemark'>"+type[property_type]+"</div><div style='margin-left:10px;margin-top:7px;'><span style=' font-size:10px;'>Average Rate @ "+locality+" | Area 950sqft.</span><br><span style='color:#2bc3b4;font-size:17px;'>Min: \u20B9 "+data.responseData.price.or_min+",&nbsp;&nbsp;Max: \u20B9 "+data.responseData.price.or_max+"</span><span style='color:#2bc3b4;'>/sq.ft</span></div>");    
                for(i=0;i<data.responseData.buildings.length;i++){
                  marker[i].setMap(map);
                  marker[i].setPosition({lat: data.responseData.buildings[i].loc[1], lng: data.responseData.buildings[i].loc[0]});
                  var markers = marker[i];
                  info[i]={
                    name:data.responseData.buildings[i].name,
                  rent:data.responseData.buildings[i].ll_pm,
                  rate:data.responseData.buildings[i].or_psf
                };
                 

                  google.maps.event.addListener(markers, 'click', function () {
                  // where I have added .html to the marker object.
                   for(var i=0;i<10;i++)
                      marker[i].setIcon("img/tower.png");
                  var search=document.getElementById("search");
                  search.style.background="#fea01b";
                  this.setIcon("img/towers.png");
                  geocodeLatLng2(geocoder,this.getPosition());
                  search.value="Building: "+info[marker.indexOf(this)].name+" , "+location2;
                  if(rent_sale_flag==0)
                   $(".flyMarker").html("<div class='typemark' style='background:#fea01b'>2BHK</div><div style='margin-left:10px;margin-top:7px;'><span style:'font-size:10px;'>Average Rate in Last 1 WEEK</span><br><span style='font-size:15px;'>"+info[marker.indexOf(this)].name+"@<span style='color:#fea01b'> \u20B9 "+info[marker.indexOf(this)].rent+"/m</span></span></div>");
                 else
                   $(".flyMarker").html("<div class='typemark' style='background:#fea01b'>2BHK</div><div style='margin-left:10px;margin-top:7px;'><span style:'font-size:10px;'>Average Rate in Last 1 WEEK</span><br><span style='font-size:15px;'>"+info[marker.indexOf(this)].name+"@<span style='color:#fea01b'> \u20B9 "+info[marker.indexOf(this)].rate+"/sq.ft</span></span></div>");
              });

            }
           }
        }
      });

        }

        function new_position(geo)
        {  
          var search=document.getElementById("search");
          search.style.background="#2bc3b4";
          if(geo==1)
          {
          var geocoder = new google.maps.Geocoder;
          geocodeLatLng(geocoder,map);
        }
          var latlng = map.getCenter();
          getPrice(latlng);
          for(var i=0;i<10;i++)
            marker[i].setIcon("img/tower.png");
        }

        function locateUser(){
          console.log("Called Geolocation");
         if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.panTo(pos);
            map.setZoom(14);
           // getRate(map.getCenter(),map);
          }, 
          function() {
            handleLocationError(true, map.getCenter());
          });
          } else {
          // Browser doesn't support Geolocation
            handleLocationError(false, map.getCenter());
          }
        }
        function OyeControlc(controlDiv, map) {

        // Set CSS for the control border.
        var location_icon_c = document.createElement('div');
        location_icon_c.style.backgroundColor = '#2bc3b4';
        location_icon_c.style.cursor = 'pointer';
        location_icon_c.style.textAlign = 'center';
        location_icon_c.style.marginBottom='5px';
        location_icon_c.style.background='url(img/oyeok.png) no-repeat';
        location_icon_c.title = 'About Us';
        location_icon_c.style.backgroundSize='100%';
        location_icon_c.style.verticalAlign="center";
        controlDiv.appendChild(location_icon_c);

        // Set CSS for the control interior.
        var location_icon = document.createElement('div');
        location_icon.style.fontFamily = 'Roboto,Arial,sans-serif';
        location_icon.innerHTML = '<img  height="80px" width="80px">';
        location_icon_c.appendChild(location_icon);
        // Setup the click event listeners: simply set the map to Chicago.
        location_icon.addEventListener('click', function() {
          document.location.href = "about.html";
        });

      }

      function typeControlc(controlDiv, map) {

        // Set CSS for the control border.
        var location_icon_c = document.createElement('div');
        location_icon_c.style.backgroundColor = '';
        location_icon_c.style.cursor = 'pointer';
        location_icon_c.style.textAlign = 'center';
        location_icon_c.style.marginTop='5px';
        location_icon_c.style.marginLeft='5px';
        location_icon_c.style.marginBottom='5px';
        location_icon_c.style.background='#fff';
        location_icon_c.title = 'About Us';
        location_icon_c.style.backgroundSize='100%';
        location_icon_c.style.verticalAlign="center";
        controlDiv.appendChild(location_icon_c);

        // Set CSS for the control interior.
        var location_icon = document.createElement('div');
        location_icon.style.fontFamily = 'Roboto,Arial,sans-serif';
        location_icon.innerHTML = '<a class="waves-effect waves-light btn " id="rent" onclick="rentClick()">Rent</a><a class="waves-effect waves-light btn" id="sale" onclick="saleClick()" style="color:#000;background:#fff;">Buy/Sell</a>';
        location_icon_c.appendChild(location_icon);
        // Setup the click event listeners: simply set the map to Chicago.
        location_icon.addEventListener('click', function() {
          
        });

      }


        function locControlc(controlDiv, map) {

        // Set CSS for the control border.
        var location_icon_c = document.createElement('div');
        location_icon_c.style.backgroundColor = '#2bc3b4';
        location_icon_c.style.borderRadius = '3px';
        location_icon_c.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        location_icon_c.style.cursor = 'pointer';
        location_icon_c.style.marginBottom = '5px';
        location_icon_c.style.marginRight='10px';
        location_icon_c.style.textAlign = 'center';

        location_icon_c.title = 'Find Your Location';
        controlDiv.appendChild(location_icon_c);

        // Set CSS for the control interior.
        var location_icon = document.createElement('div');
        location_icon.style.color = 'rgb(25,25,25)';
        location_icon.style.fontFamily = 'Roboto,Arial,sans-serif';
        location_icon.style.fontSize = '10px';
        location_icon.style.color='#fff';
        location_icon.style.paddingLeft = '5px';
        location_icon.style.paddingRight = '5px';
        location_icon.style.paddingTop='5px';
        location_icon.innerHTML = '<i class="material-icons">location_searching</i>';
        location_icon_c.appendChild(location_icon);

        // Setup the click event listeners: simply set the map to Chicago.
        location_icon.addEventListener('click', function() {
          locateUser();
        });

      }

      function onsearchClick(){
        var input = (document.getElementById('search'));
        input.value="";
        input.style.background="#fff";
        flag_sclick=1;
      }

      function onsearchBlur(){
        console.log("Search Blurred");
        flag_sclick=0;
        var input = (document.getElementById('search'));
        input.style.background="#2bc3b4";
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('search').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            resultsMap.setZoom(14);
          } else {
            //alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
       function geocodeLatLng(geocoder, map) {
        console.log("Called geocoding");
        var latlng = map.getCenter();
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              document.getElementById("search").value = results[1].formatted_address;
              for(var i=0;i<results[1].address_components.length;i++)
              {
                for(var j=0;j<results[1].address_components[i].types.length;j++)
                  if(results[1].address_components[i].types[j]=="sublocality_level_1")
                   locality=results[1].address_components[i].long_name;
            }
              //locality=results[1].address_component.long_name;
            } else {
              //window.alert('No results found');
                    var $toastContent = $('<span>No Results Found</span>');
                    Materialize.toast($toastContent,2000,'amber accent-4');
            }
          } else {
           // window.alert('Geocoder failed due to: ' + status);
          }
        });
      }


      function geocodeLatLng2(geocoder, latlng) {
        console.log("Called geocoding");
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              location2= results[1].formatted_address;
              for(var i=0;i<results[1].address_components.length;i++)
              {
                for(var j=0;j<results[1].address_components[i].types.length;j++)
                  if(results[1].address_components[i].types[j]=="sublocality_level_1")
                   locality=results[1].address_components[i].long_name;
            }
              //locality=results[1].address_component.long_name;
            } else {
              //window.alert('No results found');
            }
          } else {
           // window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
$( document ).ready(function(){
  $(".button-collapse").sideNav();
  document.getElementById("rentsale").value=0;
  document.getElementById("renticon").style.color="#2bc3b4";
  document.getElementById("ptype").style.visibility="hidden";

})

function rentsClick(){
  var typeslider=document.getElementById("rentsale");
  var renti=document.getElementById("renticon");
  var salei=document.getElementById("saleicon");
  var ptypediv=document.getElementById("ptype");
  console.log(typeslider.value);
  if(typeslider.value==1)
  {
    renti.style.color="#000";
    salei.style.color="#2bc3b4";
    rent_sale_flag=1;
    $('.toast-identifier-for-message').hide()
    var $toastContent = $('<span>Rental Property Type Set</span>');
           //         Materialize.toast($toastContent,2000,'amber accent-4 toast-identifier-for-message');
    ptypediv.style.visibility="";
   // new_position(1);
  }
  else
  {
    renti.style.color="#2bc3b4";
    salei.style.color="#000";
    rent_sale_flag=0;
    $('.toast-identifier-for-message').hide()
    var $toastContent = $('<span>Rental Property Type Set</span>');
                  //  Materialize.toast($toastContent,2000,'amber accent-4 toast-identifier-for-message');
                  ptypediv.style.visibility="";
    //new_position(1);
  }
 
 
  

}
/*
function saleClick(){
  var rentButton=document.getElementById("rent");
  var saleButton=document.getElementById("sale");
  saleButton.style.background="#2bc3b4";
  saleButton.style.color="#fff";
  rentButton.style.background="#fff";
  rentButton.style.color="#000";
  console.log("Sale Active");
  rent_sale_flag=1;
  $('.toast-identifier-for-message').hide()
  var $toastContent = $('<span>Resale Property Type Set</span>');
                    Materialize.toast($toastContent, 2000,'amber accent-4 toast-identifier-for-message');
  new_position(1);
  

}*/
$( document ).ready(function() {
    detectmobile();
   

   $('.range-field > input[type="range"]').on('mouseup', function() {
    var thumbElm = $('.range-field > input[type="range"]').parent().find('.thumb.active');
    
            thumbElm.remove();
        
 
});
    $('.range-field > input[type="range"]').on('mousedown', function() {
    var thumbElm = $(this).parent().find('.thumb.active');
    
            thumbElm.remove();
        
 
});
   $('.range-field > input[type="range"]').on('mousemove', function() {
    var thumbElm = $(this).parent().find('.thumb.active');
    
            thumbElm.remove();
        
 
});
    $('.range-field > input[type="range"]').on('mouseentter', function() {
    var thumbElm = $(this).parent().find('.thumb.active');
    
            thumbElm.remove();
        
 
});

});
function typeset(type)
{
  property_type=type;
   document.getElementById("ptype").style.visibility="hidden";
   new_position(1);
}
function detectmobile(){
  //console.log(checker);

var ua = navigator.userAgent;
var checker = {
  iphone: ua.match(/(iPhone|iPod|iPad)/),
  blackberry: ua.match(/BlackBerry/),
  android: ua.match(/Android/)
};
var callButton=document.getElementById("call");
if(checker.iPhone==null && checker.blackberry==null && checker.android==null)
  callButton.style.visibility = "hidden";
}