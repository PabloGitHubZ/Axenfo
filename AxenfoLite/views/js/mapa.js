      var map;
  	 function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: 42.8777797, lng: -8.5498146},
          zoom: 9,
        });
        var marker = new google.maps.Marker({
          position: {lat: 42.8777797, lng: -8.5498146},
          map: map,
	  title: 'Santiago de Compostela'
        });
      }
