@extends('layouts.main')

@section('title')
	Favoritas - {{Auth::guard('usuarios')->user()->email}} - buscapension.com
@endsection

@section('description', 'Encuentra la pensión de tus sueños, entra y busca la que más se acomode a ti, te esperamos.')

@section('author', 'www.buscapension.com')

@section('content')
	<span id="token" hidden>{{csrf_token()}}</span>
	<section id="userPension">

		@include('includes.nav-two')
		
		<section class="userPensiones">
			<section class="pensiones favoritos">
				@foreach($favoritos as $pension)

								<div class="p-pension">
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
										@if(Auth::guard('usuarios')->check())
											@if(!is_null(Auth::guard('usuarios')->user()->favoritos()->find($pension->id)))
												<i class="material-icons start addFavorite" data-add="true" data-id="{{$pension->id}}">
													star
												</i>
											@else
												<i class="material-icons addFavorite" data-add="false" data-id="{{$pension->id}}">
													star_border
												</i>
											@endif
										@else
											<i class="fa fa-star-o" aria-hidden="true"></i>
										@endif
									</div>
								</div>
							
				@endforeach
			</section>
			@include('includes.userPanel')
		</section>

	</section>
@endsection


@section('script')
	
	@include('includes.js-userPanel')
	
	<script>


		$(".addFavorite").on('click', function(){
			var start = $(this);
			console.log($(this).parents('.p-pension')[0].remove())
			$.ajax({
				method:'post',
				url:'/pensiones/public_html/user/favoritos/'+start.data().id+'',
				data:{"_token":$('#token').text()},
				success:function(d){
					if(d.msg == "add"){
						start.addClass('start');
						start.removeClass('fa-star-o');
						start.addClass('fa-star');
					}else{
						start.removeClass('start');
						start.removeClass('fa-star');
						start.addClass('fa-star-o');
					}
				},

			});
		});

	</script>
@endsection