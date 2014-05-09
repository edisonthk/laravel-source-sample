<!-- app/views/shops/index.blade.php -->

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

<h1>All the shops</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Phone number</td>
			
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($shops as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->phone_number }}</td>
			

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the shop (uses the destroy method DESTROY /shops/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				{{ Form::open(array('url' => 'shops/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Shop', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the shop (uses the show method found at GET /shops/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('shops/' . $value->id) }}">Show this shop</a>

				<!-- edit this shop (uses the edit method found at GET /shops/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('shops/' . $value->id . '/edit') }}">Edit this shop</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>