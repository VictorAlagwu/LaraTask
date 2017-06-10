
@extends('layouts.app')
@section('title')
All Cards
@stop
@section('content')
<style>
  .card_button{
  padding-top: 30px;
}
</style>  
@if (!Auth::guest())
<div class="row">
    @if ( session()->has('flash_message') )
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p>{{ session()->get('flash_message') }}</p>
    </div>
    @endif
  @unless ( $cards->isEmpty() )

	@foreach( $cards as $card)
		<div class="col-lg-4">
		<div class="panel panel-info">
    		<div class="panel-heading">
        		<h3 class="panel-title"><a href="/card/{{ $card-> id }}"> {{ $card-> title }}</a></h3>
    		</div>
    	<div class="panel-body">Created by {{ $card->user->name}} for more details contact the task admin via <p> Email: <i>{{ $card->user->email}}</i></p>.
        <div class="card_button">
      {{--     <span class="pull-left">
            <button type="button" class="btn btn-warning">Edit</button>
          </span> --}}
          <span class="pull-right">
            <form action="card/{{$card->id}}/del" method="POST">
              {{ method_field('DELETE')}}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Delete</button>
              
            </form>
            
          </span>
        </div>
      </div>
		</div>
			
		</div>
	@endforeach
  
  @else
  <h3>No Card Added</h3>
  @endunless
</div>
<div class="row" align="center">
<h3>Add Card</h3>
  <form action="/card/create" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="note" class="col-sm-3 control-label"></label>
    <div class="col-sm-6">
      <input type="text" name="title" id="card_title" class="form-control"/>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Add Card
      </button>
    </div>
  </div>
</form>
</div>
@else
<p class="pull-center">
  <h2>Please, click to <a href='/login'>Login</a> or <a href='/register'>Register</a></h2>
</p>

@endif
@stop
