<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmCi4oIPRtQf5-ncb2w8RLqKstRKQh6YM&libraries=places&callback=initAutocomplete"
        async defer></script>


<script>

		var auto  = document.getElementById('autocomplete');
		var autoFilter  = document.getElementById('autocompleteFilter');

		var cities = document.getElementById('cities');
		var citiesNav = document.getElementById('citiesNav');
		var citiesFilter = document.getElementById('citiesFilter');

		var options = {
			componentRestrictions: {country: "co"}
		};

		var options2 = {
			types: ['(cities)'],
			componentRestrictions: {country: "co"}
		};
		
		function initAutocomplete() {
			
			var displaySuggestions = function(predictions, status){
				console.log(predictions);
			}


			if(auto != null){

				var geo = new google.maps.places.Autocomplete(auto);
					google.maps.event.addListener(geo, 'place_changed', function(){
					auto.value = geo.getPlace().name;
					
				});

			}
			
			if(cities != null){
				var geo2 = new google.maps.places.Autocomplete(cities, options2);
					google.maps.event.addListener(geo2, 'place_changed', function(){
						cities.value = geo2.getPlace().name;
						
				});
			}
			
			if(citiesFilter != null){
				var geo3 = new google.maps.places.Autocomplete(citiesFilter, options2);
					google.maps.event.addListener(geo3, 'place_changed', function(){
					citiesFilter.value = geo3.getPlace().name;
					
				});
			}
			

			if(citiesNav != null){
				var geo4 = new google.maps.places.Autocomplete(citiesNav, options2);
					google.maps.event.addListener(geo4, 'place_changed', function(){
					citiesNav.value = geo4.getPlace().name;
					
				});
			}

			if(autoFilter != null){
				var geo5 = new google.maps.places.Autocomplete(autoFilter, options2);
					google.maps.event.addListener(geo5, 'place_changed', function(){
					autoFilter.value = geo5.getPlace().name;
					
				});
			}


			
		}
</script>	

<script>
	var añadirGeo = function(){
		OG(function(pos){
			document.getElementsByName('latitude')[0].value = pos.lat;
	        document.getElementsByName('longitude')[0].value = pos.lon;
		});
	}

	OGR(function(data){
		var c = document.getElementById('cities');
		if(c != null){
			c.value = data.city;
		}
		
	});
	
</script>