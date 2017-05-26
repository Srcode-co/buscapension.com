@extends('layouts.main')


@section('title')
	Pension en {{$pension->city}} - {{$pension->title}}
@endsection

@section('description')
	Pension en {{$pension->city}} - {{$pension->description}}
@endsection

@section('author', 'www.buscapension.com')

@section('content')

	<section id="userPension">
		@include('includes.nav-two')
		
		<section id="pensionOne">

			<div id="data-pension">

				<div class="mf">

					<div id="mapa" class="shadow">
						...
					</div>

					<div id="fotos" class="shadow">
						@foreach($pension->imagenes as $img)
							<img src="{{asset('images/pensiones')}}/{{$img->imagen}}" 
							alt="" width="110" class="shadow">
							
						@endforeach
					</div>

				</div>

				<div class="datos">

					<div class="section shadow center-h">
						<h1>
							{{$pension->title}}
						</h1>
					</div>
					

					<div class="section shadow">
						<h5>
							<b>Descripción:</b> {{$pension->description}}
						</h5>
					</div>

					<div class="section shadow">
						<h5>
							<b>Reglas:</b> {{$pension->rules}}
						</h5>
					</div>

					<div class="section shadow">
						<h5>
							<b>Precio:</b> 
							<span class="price">{{$pension->price}}</span>
						</h5>
					</div>

					<div class="section shadow">
						<h5>
							<b>Ciudad:</b> {{$pension->city}}
						</h5>
					</div>
				
					<div class="section shadow">
						<h5>
							@if(Auth::guard('usuarios')->check())
								<b>Dirección:</b> {{$pension->direction}}
							@else
								<b>Dirección:</b> ingresa para ver toda la información
							@endif
						</h5>
					</div>

					<div class="section shadow">
						<h5>
							@if(Auth::guard('usuarios')->check())
								<b>Telefono:</b> {{$pension->telefone}}
							@else
								<b>Telefono:</b> ingresa para ver toda la información
							@endif
						</h5>
					</div>
							
					<div class="section shadow">
						<h5>
							<b>Cerca de:</b> {{$pension->near}}
						</h5>
					</div>

					<div class="section shadow">
						<h5>
							<b>Caracteristicas:</b> {{$pension->alone}}
						</h5>
					</div>
				</div>
				
			</div>

			@include('includes.userPanel')
		</section>

	</section>
	
	<section id="oneImage">
		<img src="" alt="{{$pension->description}}" class="shadow">
	</section>

@endsection

@section('script')
	@include('includes.js-userPanel')

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmCi4oIPRtQf5-ncb2w8RLqKstRKQh6YM"
        async defer></script>

     <script src="{{asset('js/jquery.priceformat.min.js')}}"></script>
	
	<script>

		$('.price').priceFormat({
		    prefix: '',
		    centsSeparator: ',',
		    thousandsSeparator: '.',
		    centsLimit: 3
		});

		function acomodarImgs(){
			var w =  120;

			if($('body').width() <= 425){
				w = 90;
			}
		
			var t = $('#fotos').width() - 15;

			var c =  parseInt(t / w);
			
			
			var m = parseInt((t - c * w) / c);

			$("#fotos").css('padding-left', m+"px");
		}

		acomodarImgs();

		

		$(window).resize(function(){
			acomodarImgs();
		});
		

		$('#fotos img').on('click', function(e){
			var img = e.target;
			var img = img.src;

			$('#oneImage img').attr('src', img);
			$('#oneImage').css('top','0px');
		});

		$('#oneImage').on('click', function(){
			$('#oneImage').css('top','-100vh');
		});

		var map;

		function initMap() {

			var lat = parseFloat("{{$pension->latitude}}");
			var lon = parseFloat("{{$pension->longitude}}");

			if( !isNaN(lat) && !isNaN(lon)){


				map = new google.maps.Map(document.getElementById('mapa'), {
				    center: {lat:lat, lng: lon},
				    zoom: 15
				});

				var img = "{{asset('images/marker4.png')}}";

				var marker = new google.maps.Marker({
				    position: {lat: lat, lng: lon},
				    map: map,
				    animation: google.maps.Animation.DROP,
				    title: '{{$pension->title}}',
				    icon:img
				});


				OG(function(o){
					
					var img2 = "{{asset('images/marker5.png')}}";

					var marker2 = new google.maps.Marker({
					    position: {lat: o.lat, lng: o.lon},
					    map: map,
					    animation: google.maps.Animation.DROP,
					    title:"Tu",
					    icon:img2
					});

					

					directionsService = new google.maps.DirectionsService();
					directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

					

					var request = {
						origin:{lat: o.lat, lng: o.lon},
						destination:{lat:lat, lng: lon},
						travelMode: google.maps.DirectionsTravelMode.DRIVING
					};

					directionsService.route(request, function(result, status) {
						if(status == google.maps.DirectionsStatus.OK){
							directionsDisplay.setMap(map);
							//directionsDisplay.setOptions({ preserveViewport: true });
							directionsDisplay.setDirections(result);
							
						}
					});

				});

			}else{

				
				var cadena = "{{$pension->city}} {{$pension->direction}}";
				
				OGRD(function(obj){
					map = new google.maps.Map(document.getElementById('mapa'), {
					    center: {lat:obj.lat, lng: obj.lon},
					    zoom: 16
					});

					var img = "{{asset('images/marker4.png')}}";

					var marker = new google.maps.Marker({
					    position: {lat: obj.lat, lng: obj.lon},
					    map: map,
					    animation: google.maps.Animation.DROP,
					    title: '{{$pension->title}}',
					    icon:img
					});

					OG(function(o){
						
						var img2 = "{{asset('images/marker5.png')}}";

						var marker2 = new google.maps.Marker({
						    position: {lat: o.lat, lng: o.lon},
						    map: map,
						    animation: google.maps.Animation.DROP,
						    title:"Tu",
						    icon:img2
						});

						

						directionsService = new google.maps.DirectionsService();
						directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

						

						var request = {
							origin:{lat: o.lat, lng: o.lon},
							destination:{lat:obj.lat, lng: obj.lon},
							travelMode: google.maps.DirectionsTravelMode.DRIVING
						};

						directionsService.route(request, function(result, status) {
							if(status == google.maps.DirectionsStatus.OK){
								directionsDisplay.setMap(map);
								//directionsDisplay.setOptions({ preserveViewport: true });
								directionsDisplay.setDirections(result);
								
							}
						});

					});
				}, cadena);
			}

		}

		window.onload = function(){
			initMap();
		}

	</script>
@endsection