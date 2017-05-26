@extends('layouts.main')

@section('title')
	Pensiones - {{Auth::guard('usuarios')->user()->email}} - buscapension.com
@endsection

@section('description', 'Encuentra la pensión de tus sueños, entra y busca la que más se acomode a ti, te esperamos.')

@section('author', 'www.buscapension.com')


@section('content')
	
	<section id="userPension">
	
		@include('includes.nav-two')

		<section class="userPensiones">
			<section class="pensiones">
				@foreach($pensiones as $pension)

								<div class="p-pension shadow">
									<a href="{{url('/pension')}}/{{$pension->id}}/{{str_slug($pension->title, '-')}}">
									
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
										<a href="{{url('/pension/delete')}}/{{$pension->id}}">
											<i class="material-icons p-delete">
												delete
											</i>
										</a>
										<a href="{{url('/pension/update')}}/{{$pension->id}}">
											<i class="material-icons p-update">
												settings
											</i>	
										</a>
									</div>
								</div>
							
				@endforeach
				
				@if(count($pensiones) == 0)
					<div class="full-center">
						
						<a href="{{ asset('/pension/create') }}">
							<button class="btn yellow shadow">
								Crea una pensión
							</button>
						</a>
						
					</div>
				@endif
			</section>
			@include('includes.userPanel')
		</section>
	</section>



@endsection

@section('script')
	
	@include('includes.js-userPanel')

@endsection