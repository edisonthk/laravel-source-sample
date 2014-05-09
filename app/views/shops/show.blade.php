<!-- app/views/shops/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('shops') }}">shop Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('shops') }}">View All shops</a></li>
		<li><a href="{{ URL::to('shops/create') }}">Create a shop</a>
	</ul>
</nav>

<h1>Showing {{ $shop->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $shop->name }}</h2>
		<p>
			<strong>Phone number:</strong> {{ $shop->phone_number }}<br>
			<strong>Fax number:</strong> {{ $shop->fax_number }}
		</p>
	</div>

</div>
</body>
</html>