<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
	<title>Cobalt CMS &bull; {{ $head_title or 'No title' }}</title>
	<link href="{{ asset('theme/admin/css/style.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header id="header">
		<div class="inner-header">
			<h1 id="logo"><a class="fastbutton" href="{{ url('/') }}">Cobalt</a></h1>
			<nav id="primary">
				<ul>
					<li><a data-icon="b" href="{{ action('PostController@getCreate') }}">Write a post</a></li>
					<li><a data-icon="U" href="">Users</a></li>
					<li {{ Helper::adminMenuClass('settings', $menu_section) }}><a data-icon="y" href="{{ action('Admin\SettingsController@getIndex') }}">Settings</a></li>
				</ul>
			</nav>
			<div class="pull-right">
				<div class="button-well button-well-dark">
					<div class="button-group">
						<a class="button button-dark" data-icon="e" href="/">View website</a>
						<a class="button button-dark icon-only" data-icon="Q" href="{{ action('UserController@getLogout') }}"></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<aside id="notifications">
		@yield('notifications')
	</aside>
	<main id="main">
		<nav class="submenu" id="secondary">
			<ul>
				<li {{ Helper::adminMenuClass('dashboard', $menu_section) }}><a data-icon="S" href="{{ action('Admin\DashboardController@getIndex') }}">Dashboard</a></li>
				<li {{ Helper::adminMenuClass('posts', $menu_section) }}><a data-icon="p" href="{{ action('PostController@getManage') }}">Posts</a></li>
				<li><a data-icon="l" href="">Pages</a></li>
			</ul>
		</nav>
		<section id="content">
			@yield('content')
		</section>
	</main>
	<script src="{{ asset('theme/admin/js/scripts.js') }}"></script>
</body>
</html>