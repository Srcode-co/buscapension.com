@extends('layouts.main')

@section('title', 'Pensiones')

@section('description', 'Encuentra la pensión de tus sueños, entra y busca la que más se acomode a ti, te esperamos.')

@section('author', 'www.buscapension.com')


@section('content')
	
	<span id="token" hidden>{{csrf_token()}}</span>

	<section class="all-pensions">

		<!--******************************Navegacion************************ -->
			<div class="shadow hidden-xs hidden-sm" id="nav">
				
				@include('includes.logo')
				<form action="{{url('/pensiones')}}" enctype="multipart/form-data" method="GET">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2">
							<input type="text" name="city" class="form-control" placeholder="Ciudad" required="required" value="{{Request::input('city')}}" 
							id="citiesNav">

						</div>

						<div class="col-sm-2">
							<input type="text" name="near" id="autocomplete" class="form-control" placeholder="Cerca de" value="{{Request::input('near')}}">
						</div>

						<div class="col-sm-2">
							
							<select name="alone" class="form-control" data="{{Request::input('alone')}}">
								<option value="sola">Solo</option>
								<option value="compartida">Compartido</option>
								<option value="ambas" selected>Ambas</option>
							</select>
						</div>

						<div class="col-sm-2">
							<input type="submit" value="Buscar" class="btn btn-block yellow">
						</div>
					</div>
				</form>

				@if(!Auth::guard('usuarios')->check())
					<a href="{{url('/login')}}" class="ingresar">
						<span class="">Ingresar</span>
					</a>
				@else
					<img src="{{Auth::guard('usuarios')->user()->imagen}}" alt="" 
					class="user-img user-menu">
				@endif
				
			</div>

			<div class="shadow nav-mb" id="nav">
				<i class="material-icons" id="filtros">filter_list</i>
				@include('includes.logo')

				@if(!Auth::guard('usuarios')->check())
					<a href="{{url('/login')}}" class="ingresar">
						<span class="">Ingresar</span>
					</a>
				@else
					<img src="{{Auth::guard('usuarios')->user()->imagen}}" alt="" 
					class="user-img user-menu">
				@endif
				
			</div>
		
		<!--******************************Navegacion************************ -->
		
		<!--****************************** Contenedor Global ************************ -->
			
			<div class="g-container">

				<!--****************************** Filtros para mobil ************************ -->
		
					<div class="filtros-panel shadow">
						<br>
						<form action="{{url('/pensiones')}}" enctype="multipart/form-data" method="GET">
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<input type="text" name="city" class="form-control" placeholder="Ciudad" required="required" value="{{Request::input('city')}}" id="citiesFilter">
								</div>

								<div class="col-xs-10 col-xs-offset-1">
									<input type="text" name="near" id="autocompleteFilter" class="form-control" placeholder="Cerca de" value="{{Request::input('near')}}">
								</div>

								<div class="col-xs-10 col-xs-offset-1">
									
									<select name="alone" class="form-control" data="{{Request::input('alone')}}">
										<option value="sola">Solo</option>
										<option value="compartida">Compartido</option>
										<option value="ambas" selected>Ambas</option>
									</select>
								</div>

								<div class="col-xs-10 col-xs-offset-1">
									<input type="submit" value="Buscar" class="btn btn-block yellow">
								</div>
							</div>
						</form>
					</div>

				<!--****************************** Filtros para mobil ************************ -->

				<!--****************************** Todas las pensiones ************************ -->

					<div class="p-container">
						@if(!$pensiones->isEmpty())
							@foreach($pensiones as $pension)

								<div class="p-pension shadow">
									<a href="
									{{url('/pension')}}/{{$pension->id}}/{{str_slug($pension->title, '-')}}">
										
										<div class="p-pension-title">
											<h4>{{$pension->title}}</h4>
										</div>

										<div class="p-pension-img" style='background-image:url("{{asset('images/pensiones')}}/{{$pension->imagenes->first()['imagen']}}")'>
										</div>
									
										<div class="p-pension-content">
										
											<span><b>Precio:</b> {{$pension->price}}</span>

											<span><b>Ciudad:</b> {{$pension->city}}</span>

											<span><b>Cerca de:</b> {{$pension->near}}</span>

											<span>
												<b>Descripcion:</b> {{$pension->description}}
											</span>

											<span><b>Reglas:</b> {{$pension->rules}}</span>

										</div>
									</a>
								
										<div class="p-acciones">
											@if(Auth::guard('usuarios')->check())
												@if(!is_null(Auth::guard('usuarios')->user()->favoritos()->find($pension->id)))
													<i class="material-icons start addFavorite" data-add="true" data-id="{{$pension->id}}">star</i>
												@else
													<i class="material-icons addFavorite" data-add="false" data-id="{{$pension->id}}">star_border</i>
												@endif
											@else
												<i class="material-icons" aria-hidden="true">
													star_border
												</i>
											@endif
										</div>
									</a>
								</div>
								
							@endforeach
							<div class="navegacion">
								@if(empty(Request::input('page')) || Request::input('page')==1)
									<a class="pages shadow" href="{{url('/pensiones')}}?city={{Request::input('city')}}&near={{Request::input('near')}}&alone={{Request::input('alone')}}&page=2">2</a>
								@else
								<a href="{{url('/pensiones')}}?city={{Request::input('city')}}&near={{Request::input('near')}}&alone={{Request::input('alone')}}&page={{Request::input('page') -1}}" class="pages shadow">{{Request::input('page') - 1}}
								</a>
								<a href="{{url('/pensiones')}}?city={{Request::input('city')}}&near={{Request::input('near')}}&alone={{Request::input('alone')}}&page={{Request::input('page') +1}}" class="pages shadow">{{Request::input('page') + 1}}</a>

								@endif
							</div>
						@else
							<div class="full-notificaciones">
								<h3>No se encontraron pensiones :(</h3>
								<button class="btn back shadow">
									<a href="{{ redirect()->back()->getTargetUrl() }}">
										<-
									</a>
								</button>
							</div>
							
						@endif


					</div>
					
				<!--****************************** Todas las pensiones ************************ -->

				<!--****************************** Panel de usuario ************************ -->
					@include('includes.userPanel')
				<!--****************************** Panel de usuario ************************ -->
				
			</div>
		<!--****************************** Contenedor Global ************************ -->

	</section>
	
@endsection

@section('script')
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
	
	@include('includes.js-userPanel')

	<script>
	
		var data = $('select[name="alone"]').attr('data');
		$('option[value="'+data+'"]').attr('selected', 'selected');

		$(".addFavorite").on('click', function(){
			var start = $(this);
			$.ajax({
				method:'post',
				url:'{{ asset('/user/favoritos/') }}/'+start.data().id+'',
				data:{"_token":$('#token').text()},
				success:function(d){
					if(d.msg == "add"){
						start.addClass('start');
						start.html('start');
					}else{
						start.removeClass('start');
						start.html('star_border');
					}
					
				},

			});
		});


	</script>
@endsection