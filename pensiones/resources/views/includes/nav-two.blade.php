<div class="shadow" id="nav-two">
	@include('includes.logo')
	@if(Auth::guard('usuarios')->check())
		<img src="{{Auth::guard('usuarios')->user()->imagen}}" alt="" 
		class="user-img user-menu">
	@else
		<a href="{{url('/login')}}" class="ingresar">
			<span class="">Ingresar</span>
		</a>
	@endif
	
</div>