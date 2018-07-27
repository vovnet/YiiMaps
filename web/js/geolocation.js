var map;
var marker;

function initMap() {
  map = new google.maps.Map(
      document.getElementById('map'), {zoom: 2, center: {lat: 0, lng: 0}});

  if (Object.keys(model).length > 0) {
    var location = {};
    location.lat = parseFloat(model.lat);
    location.lng = parseFloat(model.lng);
    marker = new google.maps.Marker({position: location, map: map});
    map.setCenter(new google.maps.LatLng(location));
    map.setZoom(11);
  }
}

$().ready(function(){
  $('#findButton').on('click', function(){
    var area = $('#inputArea').val();
    setArea(area);
  });
});

function setArea(area) {
  $.ajax({
    url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+area+'&key=AIzaSyBulqy7yWI17Qzq-20XQjXXM2j8NzkZfyk',
  }).done(function (data){
    if (data.status != "OK") {
      alert(data.status);
    }
    
    var location = data.results[0].geometry.location;
    var address = data.results[0].formatted_address;

    if (marker) {
      marker.setMap(null);
    }
    marker = new google.maps.Marker({position: location, map: map});
    map.setCenter(new google.maps.LatLng(location));
    
    $('#place-address').val(address);
    $('#place-lat').val(location.lat);
    $('#place-lng').val(location.lng);
  })
  .fail(function(){
    alert('map error');
  });
}