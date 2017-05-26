@extends('layouts.main')


@section('title', 'Forma parte de nuestra comunidad')

@section('description', 'Encuentra la pensión de tus sueños, entra y busca la que más se acomode a ti, te esperamos.')

@section('author', 'www.buscapension.com')

@section('content')
	<div id="backgroud-principal">
	</div>

	<section id="login">
		@include('includes.logo')

		<h1>Se parte de nuestra comunidad</h1>
		<button type="button" class="btn btn-fb btn-primary l-facebook" v-on:click="faceLogin">
			<i class="fa fa-facebook left"></i> Facebook
		</button>

		<form action="{{url('/login')}}" enctype="multipart/form-data" method="POST" hidden="hidden">
			<input type="text" name="email" v-model="user.email" required>
			<input type="text" name="password" v-model="user.password" required>
			<input type="text" name="name" v-model="user.name" required>
			<input type="text" name="imagen" v-model="user.imagen" required>

			<input type="text" name="back" value="{{Request::input('back')}}">
			{{ csrf_field() }}
			<button type="submit" id="enviar"></button>
		</form>
	</section>

@endsection

@section('script')

<script src="{{asset('js/vue.js')}}"></script>
<script>

	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '360941974262266',
	      xfbml      : true,
	      version    : 'v2.8'
	    });
	    FB.AppEvents.logPageView();
	};

	(function(d, s, id){
	 var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement(s); js.id = id;
	 js.src = "//connect.facebook.net/en_US/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	
	var loginApp = new Vue({
		delimiters: ['${', '}'],
		el:'#login',
		data:{
			login:false,
			user: {
				email:null,
				password:null,
				name:null,
				imagen:null
			}
		},
		methods: {
		    faceLogin:  function(){
		    	var self  = this;
		    	FB.getLoginStatus(function(e){
		    		if(e.status == "connected"){
		    			FB.api('/me',{fields: 'email,name,picture'}, function(data) {
		    				
		    				self.user.email = data.email;
		    				self.user.name = data.name;
		    				self.user.password = data.id;
		    				self.user.imagen = data.picture.data.url;
		    				self.sendData();
				
						});
		    		}else{
		    			FB.login(function(e) {
						  if(e.status == "connected"){
						  	FB.api('/me',{fields: 'email,name,picture'}, function(data) {
		    				console.log(data)
		    				
		    					self.user.email = data.email;
		    					self.user.name = data.name;
		    					self.user.password = data.id;
		    					self.user.imagen = data.picture.data.url;

		    					self.sendData();
		    				
							});
						  }
						},{scope: 'email'});
		    		}
		    	});
		    },
		    sendData:function(){
		    	setTimeout(function(){ jQuery("#enviar")[0].click();}, 1500);
		    }
	  	}
	});
</script>
@endsection