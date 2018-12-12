<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Update todo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form action="/todos/{{$todo->id}}/update" method="POST" class="" role="form">
			@csrf
			{{method_field('patch')}}
				<div class="form-group">
					<legend>Update todo</legend>
					@if(session('notification-error'))
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Thông báo!</strong> {{session('notification-error')}}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label class="control-label" for="todo">Todo:</label>
					<input name="todo" type="text" class="form-control" id="todo" placeholder="Enter todo" value="{{$todo->todo}}">
				</div>
				
		
				<div class="form-group">
					<div class="">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
		</form>
	</div>
</body>
	<!-- Latest compiled and minified CSS & JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>