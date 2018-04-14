function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map1'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsDisplay);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: 'Long Xuyên, Phúc Thọ, Hanoi, Vietnam',
          destination: 'Tòa nhà CIT, Phố Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hanoi, Vietnam',
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }