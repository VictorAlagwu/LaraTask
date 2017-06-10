

<form action="/card/{{ $card-> id }}/notes" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="note" class="col-sm-3 control-label"></label>
		<div class="col-sm-6">
			<textarea name="body" id="note_title" class="form-control"></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<button type="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add Note
			</button>
		</div>
	</div>
</form>
<!--Class Form not found-->