<div class="user-panel shadow">
	@if(Auth::guard('usuarios')->check())
		<a href="{{url('/pensiones')}}">Pensiones</a>
		<a href="{{url('/pension/create')}}">Crear pensión</a>
		<a href="{{url('/user/favoritos')}}">Favoritas</a>
		<a href="{{url('/user/pensiones')}}">Mis pensiones</a>
		<a href="{{url('/logout')}}">Desconectar</a>
	@endif
</div>