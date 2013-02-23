<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Laravel 4 Sample Site
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        {{{ Basset::show('public-css.css') }}}

		<style>
		@section('styles')

			html,
			body {
			height: 100%;
			/* The html and body elements cannot have any padding or margin. */
			}

			/* Wrapper for page content to push down footer */
			#wrap {
			min-height: 100%;
			height: auto !important;
			height: 100%;
			/* Negative indent footer by it's height */
			margin: 0 auto -60px;
			}

			/* Set the fixed height of the footer here */
			#push,
			#footer {
			height: 60px;
			}
			#footer {
			background-color: #f5f5f5;
			}


			#wrap > .container {
			padding-top: 60px;
			}
			.container .credit {
			margin: 20px 0;
			}

			/* Lastly, apply responsive CSS fixes as necessary */
			@media (max-width: 767px) {
			#footer {
			  margin-left: -20px;
			  margin-right: -20px;
			  padding-left: 20px;
			  padding-right: 20px;
			}
			}
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<div class="nav-collapse collapse">
						<ul class="nav">
							<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('') }}">Home</a></li>
						</ul>

			                        <ul class="nav pull-right">
			                            @if (Auth::check())
			                            <li><a href="{{ URL::to('user/settings') }}">Logged in as {{ Auth::user()->username }}</a></li>
			                            <li><a href="{{ URL::to('user/logout') }}">Logout</a></li>
			                            @else
			                            <li {{ (Request::is('user/login') ? 'class="active"' : '') }}><a href="{{ URL::to('user/login') }}">Login</a></li>
			                            <li {{ (Request::is('user/register') ? 'class="active"' : '') }}><a href="{{ URL::to('user/create') }}">Sign Up</a></li>
			                            @endif
			                        </ul>
					</div>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="container">
	        <p class="muted credit">Laravel 4 starter template on <a href="https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site">Github</a>.</p>
	      </div>
	    </div>

		<!-- Javascripts
		================================================== -->
        {{{ Basset::show('public-js.js') }}}
	</body>
</html>
