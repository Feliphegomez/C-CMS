<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css);
@import url(//yui.yahooapis.com/pure/0.3.0/pure-min.css);

html{
  background: #222;
}
body{
  background: #fff;
  font-family: 'Open Sans', sans-serif;
  max-width: 380px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 1px #000; 
  margin: 1em auto;
  padding: 0 1em 1em 1em;
  text-align: center;
}
.fa-map-marker{
  width:100%;
  font-size: 10em;
  color: #cf483e;
  text-shadow: 0 0 1px #000; 
  animation: bounce 1s linear 3;
}
button{
  box-shadow: 0 0 1px #000; 
}
.result{
  margin: 2em 2em 1em 2em;
}
.result img{
  margin-top: 1em;
  border: 1px solid #333; 
}
.fa-spinner{
  font-size: 3em;
}
span{font-size:.7em;color: #777;}
@keyframes bounce {
	/* thx to https://github.com/daneden/animate.css */
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
	40% {transform: translateY(-15px);}
	60% {transform: translateY(-7px);}
}
</style>

<h1>A super-simple geolocatio&#8203;n example</h1>
<i class="fa fa-map-marker"></i>
<button class="pure-button pure-button-primary">Get my location</button>
<div class="result"></div>
<span>see link in "details" for more information</span>

<script>
/** NOTE: uses jQuery for quick & easy DOM manipulation **/

function getLocation(){
  var msg; 

  /** 
  first, test for feature support
  **/
  if('geolocation' in navigator){
    // geolocation is supported :)
    requestLocation();
  }else{
    // no geolocation :(
    msg = "Sorry, looks like your browser doesn't support geolocation";
    outputResult(msg); // output error message
    $('.pure-button').removeClass('pure-button-primary').addClass('pure-button-success'); // change button style
  }

  /*** 
  requestLocation() returns a message, either the users coordinates, or an error message
  **/
  function requestLocation(){
    /**
    getCurrentPosition() below accepts 3 arguments:
    a success callback (required), an error callback  (optional), and a set of options (optional)
    **/
  
    var options = {
      // enableHighAccuracy = should the device take extra time or power to return a really accurate result, or should it give you the quick (but less accurate) answer?
      enableHighAccuracy: false,
      // timeout = how long does the device have, in milliseconds to return a result?
      timeout: 5000,
      // maximumAge = maximum age for a possible previously-cached position. 0 = must return the current position, not a prior cached position
      maximumAge: 0
    };
  
    // call getCurrentPosition()
    navigator.geolocation.getCurrentPosition(success, error, options); 
  
    // upon success, do this
    function success(pos){
      // get longitude and latitude from the position object passed in
      var lng = pos.coords.longitude;
      var lat = pos.coords.latitude;
      // and presto, we have the device's location!
      msg = 'You appear to be at longitude: ' + lng + ' and latitude: ' + lat  + '<img src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=300x300&maptype=roadmap&markers=color:red%7Clabel:A%7C' + lat + ',' + lng+ '&sensor=false">';
      outputResult(msg); // output message
      $('.pure-button').removeClass('pure-button-primary').addClass('pure-button-success'); // change button style
    }
  
    // upon error, do this
    function error(err){
      // return the error message
      msg = 'Error: ' + err + ' -------- ' + JSON.stringify(err) + ' :(';
      outputResult(msg); // output button
      $('.pure-button').removeClass('pure-button-primary').addClass('pure-button-error'); // change button style
    }  
  } // end requestLocation();

  /*** 
  outputResult() inserts msg into the DOM  
  **/
  function outputResult(msg){
    $('.result').addClass('result').html(msg);
  }
} // end getLocation()

// attach getLocation() to button click
$('.pure-button').on('click', function(){
  // show spinner while getlocation() does its thing
  $('.result').html('<i class="fa fa-spinner fa-spin"></i>');
  getLocation();
});
</script>