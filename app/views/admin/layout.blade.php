<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
	<title>{{ $head_title or 'No title' }}</title>
	<link href="{{ URL::asset('theme/admin/css/style.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header id="header">
		<div class="inner-header">
			<h1 id="logo"><a class="fastbutton" href="/">Cobalt</a></h1>
			<nav id="primary">
				<ul>
					<li><a data-icon="b" href="{{ URL::to('admin/post/new') }}">Write a post</a></li>
					<li><a data-icon="U" href="">Users</a></li>
					<li><a data-icon="y" href="">Settings</a></li>
				</ul>
			</nav>
			<div class="pull-right">
				<div class="button-well button-well-dark">
					<div class="button-group">
						<a class="button button-dark" data-icon="e" href="/">View website</a>
						<a class="button button-dark icon-only" data-icon="Q" href="{{ URL::action('UserController@getLogout') }}"></a>
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
				<li class="active"><a data-icon="S" href="{{ URL::route('admin.dashboard') }}">Dashboard</a></li>
				<li><a data-icon="p" href="{{ URL::to('admin/posts') }}">Posts</a></li>
				<li><a data-icon="l" href="">Pages</a></li>
			</ul>
		</nav>
		<section id="content">
			@yield('content')
		</section>
	</main>
	<script src="{{ URL::asset('theme/admin/js/scripts.js') }}"></script>
</body>
</html>