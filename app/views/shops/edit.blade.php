<!-- app/views/shops/edit.blade.php -->

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

<h1>Edit {{ $shop->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($shop, array('route' => array('shops.update', $shop->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('phone_number', 'Phone number') }}
		{{ Form::text('phone_number', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('fax_number', 'shop Level') }}
		{{ Form::text('fax_number', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the shop!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>