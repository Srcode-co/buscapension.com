@extends('layouts.main')

@section('title', 'Publica tu pensión')

@section('description', 'Aumenta de manera increible la visibilidad de tu pensionado,
consige más ofertas,  publica tu pension en www.buscapension.com')

@section('author', 'www.buscapension.com')


@section('content')
	
	@include('includes.load')

	<div id="backgroud-principal">
	</div>
	
	<section id="crearPension">
		
		<div id="s-logo">
			@include('includes.logo')
		</div>

		<div id="formulario">
			
			{{Form::model($pension, array("url" => "pension/create", 'method'=>'post','enctype'=>"multipart/form-data"))}}
				
				{{Form::text('title','', array('required', 'placeholder'=>'Titulo',
					'class'=>'form-control'))}}

				{{Form::textarea('description','', array('required', 'placeholder'=>'Descripcion','class'=>'form-control'))}}

				{{Form::number('telefone','', array('required', 'placeholder'=>'Celular', 'min'=> '0','class'=>'form-control'))}}

				{{Form::text('price','', array('required', 'placeholder'=>'Precio', 'min'=> '0',
					'class'=>'form-control price', 'step'=>'any'))}}
					
				{{Form::text('city','', array('required', 'placeholder'=>'Ciudad',
					'class'=>'form-control', 'id'=>'cities'))}}

				{{Form::text('direction','', array('required', 'placeholder'=>'Direccion',
					'class'=>'form-control'))}}

				{{Form::textarea('rules','', array('required', 'placeholder'=>'Reglas',
					'class'=>'form-control'))}}
				
				{{Form::text('near','', array('required', 'placeholder'=>'Cerca de',
					'class'=>'form-control'))}}

				{{Form::select('alone', array('sola'=>'Sola', 'compartida'=>'Compartida', 'ambas'=>'Ambas'), 
					null, array('class'=>'form-control'))}}
				
				{{Form::file('images[]', array('multiple'=>true, 'required',
					'class'=>'form-control', 'placeholder'=>'Fotos', "accept"=>"image/jpeg, image/jpg, image/png"))}}
				
				{{Form::number('latitude','', array('placeholder'=>'Latitude (opcional)','class'=>'form-control','step'=>'any'))}}

				{{Form::number('longitude','', array('placeholder'=>'Longitude (opcional)', 'class'=>'form-control','step'=>'any'))}}

				<div class="h-aling wrap">
					
					<input type="button" value="Obtener coordenadas" onclick="añadirGeo()"
					title="Esta opcion obtendra tu posicion abtual para mostrarla en el mapa"
					class="btn btn-primary">

					{{Form::submit('Crear',array('class'=>'btn yellow'))}}
				</div>
			

			{{Form::close()}}
			
		</div>
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