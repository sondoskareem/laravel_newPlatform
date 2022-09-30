<!DOCTYPE html>
<html>
<head>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <title>Get latitude and longitude from address google map api javascript</title>
    
<style>
#map {
    position: relative;
    height: 500px;
    overflow: hidden!important; //important
}
#map .gm-style {
    position: absolute;
    width: 100%;
    height: 104%!important;  //that will do the trick
    left: 0;
    top: 0;
}
 
</style>
    <style>
        .scroll-bar {
            max-height: calc(100vh - 100px);
            overflow-y: auto !important;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 1px #cfcfcf;
            /*border-radius: 5px;*/
        }

        ::-webkit-scrollbar {
            width: 3px;
            height: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            /*border-radius: 5px;*/
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #673ab7;
        }
    </style>

</head>
<body>
<script src="{{asset('public/app-assets/js/jquery.min.js')}}"></script>
     <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label  class="input-label" >{{trans('messages.store')}} {{trans('messages.location')}}</label>
                        <div class='col-12'>
                           <div id="map" ></div>
                        </div>
                </div>
            </div>
                                            
            <div class="col-6">
               <div class="form-group">
                    <input type="text" id="latitude" name="latitude" class="form-control"   required >
                </div>
            </div>
           
            <div class="col-6">
                <div class="form-group">
                   <input type="text" id="longitude" name="longitude" class="form-control"  required >
                </div>
            
            </div>
                
     </div>

<!--{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCclp0Fl5QpMbUrcAa9Sha2U2Cp_hoikdg&libraries=geometry" type="text/javascript"></script> --}}-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCclp0Fl5QpMbUrcAa9Sha2U2Cp_hoikdg"></script>-->
    
 <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCclp0Fl5QpMbUrcAa9Sha2U2Cp_hoikdg&callback=initMap&libraries=&v=weekly"
      async
    ></script>
 <script>
 renderMap = () => {
  loadScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyCclp0Fl5QpMbUrcAa9Sha2U2Cp_hoikdg&callback=initMap");
  window.initMap = this.initMap;
}
		$(function () {
	
	
	var markerPosition ={lat:'',lng:''};
    var map;
	var markers = [];
 


    var lebanon = {lat:33.315172, lng: 44.366107};
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: lebanon,
          zoom: 10
        });
	google.maps.event.addListener(map, 'click', function(event) {
	if(markers.length <1) 
          addMarker(event.latLng, map);
        });
		
	//Edit Map 
	
	var x=document.getElementById("latitude").value ;
	var y=document.getElementById("longitude").value ;
	
	if(x>0){
	var siteLatLng = new google.maps.LatLng(x, y);
     addMarker(siteLatLng,map);
	 }
	 
     }
 initMap();
    function addMarker(location, map) {


	markerPosition.lat=location.lat();
	    markerPosition.lng=location.lng();
		console.log(markerPosition);
		
	  document.getElementById("latitude").value = markerPosition.lat;
	  document.getElementById("longitude").value= markerPosition.lng;
      
		//var variableToSend = markerPosition;
        //$.post('offer-add.php', {variable: variableToSend});
        var marker = new google.maps.Marker({
         position: location ,
         map: map
        });
   markers.push(marker);
   marker.addListener("click", function() {
			deleteMarkers(marker);
		
        });
      }
	  
	  
	  
	  
 function deleteMarkers(marker) {
       marker.setMap(null);
 
        markers = [];
	document.getElementById("latitude").value = '';
	   document.getElementById("longitude").value= '';
      }
      
      
      
      function selectLocation(){
          var lat=document.getElementById("latitude").value
          var lng=document.getElementById("longitude").value
 
          
      var siteLatLng = new google.maps.LatLng(lat, lng);
       map = new google.maps.Map(document.getElementById('map'), {
          center: lebanon,
          zoom: 10
        });
     addMarker(siteLatLng,map);
         
          
      }
         
        
    });
    
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });


        function show_item(type) {
            if (type === 'product') {
                $("#type-product").show();
                $("#type-category").hide();
            } else {
                $("#type-product").hide();
                $("#type-category").show();
            }
        }
</script>
</body>
</html>