<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{ $head_title or 'No title' }}</title>
	<link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&amp;subset=latin-ext" rel="stylesheet">
	<meta name="viewport" content="width=device-width; initial-scale=1">
	<link href="{{ URL::asset('theme/site/css/style.css') }}" rel="stylesheet">
	<!--[if lte IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	<div id="header-wrapper">
		<header id="header">
			<h1 id="logo"><a href="{{ URL::action('PostController@getList') }}">Site title</a></h1>
			<nav id="nav">
				<ul>
					<li class="current"><a href="">This is</a></li>
					<li><a href="">Only a</a></li>
					<li><a href="">Dummy</a></li>
					<li><a href="">I need more</a></li>
					<li><a href="">Time</a></li>
				</ul>
			</nav>
		</header>
	</div>

	<main>
		@yield('content')
	</main>

	<footer id="footer">
		<p class="copyright">
			&copy; Site title. All rights reserved. | Powered by Cobalt CMS.
		</p>
	</footer>
</body>
</html>