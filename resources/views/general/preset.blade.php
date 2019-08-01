<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="UTF-8">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('videoplayer/build/mediaelementplayer.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.ico') }}">
    @yield('styles')
	<title>@yield('title')</title>
</head>
<body>
	<header>   
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
		    <div class="container">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="{{ url('/') }}"> 
			           	<img class='img-responsive' src="{{ asset('images/benkei_logo.png') }}" alt="Diserrollo web y diseño web benkei">
	                </a>
		        </div>
				
		        <!-- Menu -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
		            <ul class="nav navbar-nav"> 
		            	@if (Auth::guest())
		            	<li><a href="{{ url('/') }}">Inicio</a></li> 
		                @else 
		                <li><a href="{{ url('home')}}">Bandeja</a></li>
                            @if (Auth::user()->premium == 1)
                            <li><a href="#" style="background: #FFA200;">Exclusivo</a></li>
                            @endif
		                @endif 
		                <li><a href="#">Categorias</a></li>
		                <li><a href="#">Trending</a></li>  
                        <li><a href="{{ route('buy_premium') }}">Premium</a></li>
                        <li style="background: #FFA200;"><a href="{{ route('pay') }}">Pay</a></li>
		                </select>
		                </li>   
		            </ul>
		            <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else  
                        	<li><a href="{{ url('subir')}}" class="btn_subir"><button>Subir</button></a></li>  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" width="50" height="50">
                                    {{ Auth::user()->nick }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                	<li><a href="{{ url('mi_cuenta') }}">Mi Cuenta</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
		        </div>
		    </div>
		</nav>
	</header>
	@yield('content')
	<script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script> 
    @yield('scripts')
	<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>  
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>
</body>
</html>