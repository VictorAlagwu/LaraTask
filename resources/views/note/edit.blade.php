@extends('layouts.app')
@section('title')
Edit Note
@stop
@section('content')
<div class="row" align="center">
  <h3>Edit Note</h3>
  <form action="/notes/{{$note->id}}" method="POST" class="form-horizontal">
  {{ method_field('PATCH')}}
  {{ csrf_field() }}
  
  <div class="form-group">
    <label for="note" class="col-sm-3 control-label"></label>
    <div class="col-sm-6">
      <textarea name="body" id="note_title" class="form-control">{{ $note -> body }}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Update Note
      </button>
    </div>
  </div>
</form>
</div>

@stop