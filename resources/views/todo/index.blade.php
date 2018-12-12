<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Todo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style type="text/css">
		p span:nth-child(1) {
			color: red;
			text-transform: capitalize;
		}

		p span:nth-child(2) {
			font-size: 18;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="/todos" method="POST" class="" role="form">
			@csrf
				<div class="form-group">
					<legend>Add todo</legend>
				</div>
				<div class="form-group">
					<label class="control-label" for="todo">Todo:</label>
					<input name="todo" type="text" class="form-control" id="todo" placeholder="Enter todo">
				</div>
				
		
				<div class="form-group">
					<div class="">
						<button type="submit" id="add" class="btn btn-primary">Add</button>
					</div>
				</div>
		</form>
		@if(session('notification'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{session('notification')}}
			</div>
		@endif
		@if(session('notification-error'))
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{session('notification-error')}}
			</div>
		@endif
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Todo</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					{{-- biến $todos được controller trả cho view
					chứa dữ liệu tất cả các bản ghi trong bảng todos. Dùng foreach để hiển
					thị từng bản ghi ra table này. --}}
					
					@foreach ($todos as $todo)
					<tr>
						<td>{{$todo->id}}</td>
						<td>{{$todo->todo}}</td>
						<td>{{$todo->created_at->diffForHumans()}}</td>
						<td>{{$todo->updated_at->diffForHumans()}}</td>
						<td>
							@include('todo.detail')
							<a style="display: inline-block; width: 67px;" href="todos/{{$todo->id}}" class="btn btn-warning">Edit</a>
							<form style="display: inline-block;" action="/todos/{{$todo->id}}" method="post" accept-charset="utf-8">
								@csrf
								{{method_field('delete')}}
								<button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{$todos->links()}}
	</div>
</body>
	<script src="//code.jquery.com/jquery.js"></script>
	{{-- <script type="text/javascript">
		$('#add').on('click', function(event) {
			event.preventDefault();
			if ($('#todo').val() == '') {

			}
		});
	</script> --}}
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>