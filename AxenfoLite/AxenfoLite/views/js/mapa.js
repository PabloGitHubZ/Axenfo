      var map;
  	 function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: 42.763394, lng: -8.019231},
          zoom: 8,
        });
        var marker = new google.maps.Marker({
          position: {lat: 42.8777797, lng: -8.5498146},
          map: map,
	  title: 'Nodo de Santiago',
           icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
          }
        });
        var marker = new google.maps.Marker({
          position: {lat: 43.369197, lng: -8.419311},
          map: map,
	  title: 'Nodo de A Coruña',
        });
        var marker = new google.maps.Marker({
          position: {lat: 42.229440, lng: -8.707562},
          map: map,
	  title: 'Nodo de Vigo',
        });
      }
