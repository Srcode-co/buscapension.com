@extends('layouts.main')

@section('title', 'Encuentra la pension de tus sueños')

@section('description', 'Encuentra la pensión de tus sueños, entra y busca la que más se acomode a ti, te esperamos.')

@section('author', 'www.buscapension.com')


@section('content')
	
	<div id="backgroud-principal">
	</div>

	<section id="principal" class="shadow">
		<a id="crearPesion" href="{{url('/pension/create')}}">Crear</a>
		<div>
			<h1>Encuentra tu pensión</h1>
		</div>
		<form action="{{url('/pensiones')}}" enctype="multipart/form-data" method="GET">
			<div class="row">
				<div class="col-sm-2 col-sm-offset-2">
					<input type="text" name="city" class="form-control" placeholder="Ciudad" required="required" id="cities">
				</div>

				<div class="col-sm-2">
					<input type="text" name="near" id="autocomplete" class="form-control" placeholder="Cerca de">
				</div>

				<div class="col-sm-2">
					
					<select name="alone" class="form-control">
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
	</section>


	<section class="home1">
		<div>
			<i class="material-icons start">start</i>
		</div>
		<h2 class="">
			El ranking de pensiones lo decides tú, solo las más visitadas están en los primeros puestos.
		</h2>
	</section>

	<section class="home2 shadow">
		<h2 class="shadow">Escoge la pensión que más te guste.</h2>
	</section>
	
	
	<section class="home3">
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


	</section>
	
	
	@include('includes.footer')
@endsection

@section('script')
	@include('includes.geolocation')
@endsection