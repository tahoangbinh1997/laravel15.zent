<a class="btn btn-primary" data-toggle="modal" href='#modal-id-{{$todo->id}}'>Detail</a>
<div class="modal fade" id="modal-id-{{$todo->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thông tin todo: {{$todo->todo}}</h4>
			</div>
			<div class="modal-body">
				<p><span>id: </span><span>{{$todo->id}}</span></p>
				<p><span>todo: </span><span>{{$todo->todo}}</span></p>
				<p><span>created_at: </span><span>{{$todo->created_at}}</span></p>
				<p><span>updated_at: </span><span>{{$todo->updated_at}}</span></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>