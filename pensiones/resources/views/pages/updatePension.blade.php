@extends('layouts.main')

@section('title')
	{{$pension->title}} 
@endsection

@section('description', 'Encuentra la pensión de tus sueños, entra y busca la que más se acomode a ti, te esperamos.')

@section('author', 'www.buscapension.com')


@section('content')
	
	@include('includes.load')

	<div id="backgroud-principal">
	</div>

	<section id="formPension">

		@include('includes.logo')
			{{Form::model($pension, array("url" => url('pension/update')."/".$pension->id, 'method'=>'post','enctype'=>"multipart/form-data"))}}
			
			{{Form::text('title',$pension->title, array('required', 'placeholder'=>'Titulo',
				'class'=>'form-control'))}}

			{{Form::textarea('description',$pension->description, array('required', 'placeholder'=>'Descripcion','class'=>'form-control'))}}

			{{Form::text('telefone',$pension->telefone, array('required', 'placeholder'=>'Celular', 'min'=> '0','class'=>'form-control'))}}

			{{Form::text('price',$pension->price, array('required', 'placeholder'=>'Precio', 'min'=> '0',
				'class'=>'form-control price', 'step'=>'any'))}}

			{{Form::text('city',$pension->city, array('required', 'placeholder'=>'Ciudad',
				'class'=>'form-control', 'id'=>'cities'))}}

			{{Form::text('direction',$pension->direction, array('required', 'placeholder'=>'Direccion',
				'class'=>'form-control'))}}

			{{Form::textarea('rules',$pension->rules, array('required', 'placeholder'=>'Reglas',
				'class'=>'form-control'))}}
			
			{{Form::text('near',$pension->near, array('required', 'placeholder'=>'Cerca de',
				'class'=>'form-control'))}}

			{{Form::select('alone', array('sola'=>'Sola', 'compartida'=>'Compartida', 'ambas'=>'Ambas'), 
				$pension->alone, array('class'=>'form-control'))}}
			
			{{Form::file('images[]', array('multiple'=>true,
				'class'=>'form-control', 'placeholder'=>'Fotos', "accept"=>"image/jpeg, image/jpg, image/png"))}}
			
			{{Form::number('latitude',$pension->latitude, array('placeholder'=>'Latitude (opcional)','class'=>'form-control','step'=>'any'))}}

			{{Form::number('longitude',$pension->longitude, array('placeholder'=>'Longitude (opcional)', 'class'=>'form-control','step'=>'any'))}}

			<div class="h-aling wrap">
			
				
				<input type="button" value="Obtener coordenadas" onclick="añadirGeo()"
				title="Esta opcion obtendra tu posicion abtual para mostrarla en el mapa"
				class="btn btn-primary">

				<button type="button" class="btn white">
					<a href="{{ redirect()->back()->getTargetUrl() }}" class="white">
						Cancelar
					</a>
				</button>

				{{Form::submit('Editar',array('class'=>'btn yellow'))}}
			</div>
		

		{{Form::close()}}
		
		
	</section>

@endsection


@section('script')
	@include('includes.geolocation')

	<script src="{{asset('js/jquery.priceformat.min.js')}}"></script>
	<script>
		$('.price').priceFormat({
		    prefix: '',
		    centsSeparator: ',',
		    thousandsSeparator: '.',
		    centsLimit: 3
		});

		$('form').on('submit', function(){
			$('#load').css('top', '0');
		});
	</script>
@endsection	
