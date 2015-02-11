<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Laravel Admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--[if lt IE 9]>
    		{{ HTML::script('html5shim.googlecode.com/svn/trunk/html5.js') }}
		<![endif]-->

		{{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::style('assets/bootstrap/css/datepicker.css') }}
		{{ HTML::style('assets/bootstrap/css/styles.css') }}
    	{{ HTML::style('assets/css/app.css')}}

		<link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/bootstrap/css/datepicker.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/bootstrap/css/styles.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<!-- Header -->
		<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Laravel Admin</a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							@if(Auth::check())
									<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->first_name }}<span class="caret"></span></a>
									<ul id="g-account-menu" class="dropdown-menu" role="menu">
										<li><a href="{{URL::to('usuarios')}}"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
										<li><a href="{{URL::to('/') }}"><i class="glyphicon glyphicon-exclamation-sign"></i> Alterar senha</a></li>
										<li><a href="{{URL::to('logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
									</ul>
				                @else
									<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Convidado<span class="caret"></span></a>
									<ul id="g-account-menu" class="dropdown-menu" role="menu">
										<li><a href="{{URL::to('login') }}"><i class="glyphicon glyphicon-lock"></i> Login</a></li>
									</ul>
				                @endif
						</li>
					</ul>
				</div>
				</div><!-- /container -->
			</div>
			<!-- /Header -->

			<!-- Main -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3">
						<ul class="list-unstyled">
							<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
								<h5>Configurações <i class="glyphicon glyphicon-chevron-down"></i></h5>
							</a>
							<ul class="list-unstyled collapse in" id="userMenu">
								<li class="active"> <a href="{{URL::to('/')}}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
								@if(Auth::check())
									<li><a href="{{URL::to('usuarios')}}"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>
									<li><a href="{{URL::to('/') }}"><i class="glyphicon glyphicon-exclamation-sign"></i> Permissões</a></li>
									<li><a href="{{URL::to('logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				                @else
									<li><a href="{{URL::to('login') }}"><i class="glyphicon glyphicon-lock"></i> Login</a></li>
				                @endif
							</ul>
						</li>
					</ul>


					@if(Auth::check())
					<hr>
					<ul class="nav nav-pills nav-stacked">
						<li class="nav-header"></li>
						<li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Produtos</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Relatórios</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-book"></i> Categorias</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-star"></i> Mídias Sociais</a></li>
					</ul>
					@endif

					</div><!-- /col-3 -->
					<div class="col-sm-9">
						@yield('content')
					</div>
				</div>
			</div>
			<!-- /Main -->

			<!-- script references -->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
			<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
			<script src="{{ asset('assets/bootstrap/js/bootstrap-datepicker.js') }}"></script>
			<script src="{{ asset('assets/bootstrap/js/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
			<script src="{{ asset('assets/bootstrap/js/scripts.js') }}"></script>
	</body>
</html>