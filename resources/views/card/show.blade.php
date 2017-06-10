@if (!Auth::guest())
@extends('layouts.app')

@section('title')
{{ $card-> title }}
@stop
<style>
  .show {
 {{--background-image: url('{{ asset('assets/img/bg.jpg') }}');--}}
/*  background-color: black;*/
} 
</style>


@section('content')
<div class='show'>
<div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{ $card->title }}</h3>
          </div>
          <ul class="list-group">
            @foreach($card->notes as $note)
              <li class="list-group-item">
                <span class="text-primary">{{ $note->body }}</span>
                <span class="hidden-xs text-muted">
                  @if ( $note->user )
                    added by <a href="/profile/{{ $note->user_id }}">{{ $note->user->username }}</a>
                  @endif
                  {{ $note->user->name }} on <span class="badge badge-blue">{{$note->created_at}}</span>
               </span>
               <span class="">
                  <a href="/notes/{{ $note->id }}/edit"><button type="button" class="btn btn-info"><i class="fa fa-edit"></i> Edit</button></a>
                 </span>  
                 <span class="pull-right">
                 <form action="/notes/{{ $note->id }}/del" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger active btn-lg"><i class='fa fa-trash'></i>Delete</button>
                  </form>
                  </span>
              
               <div class="clearfix clear"></div>
              </li>
            @endforeach
          </ul>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-2"> </div>
  <div class="col-lg-8">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title pull-center">Add a New Note</h4>
      </div>
      <div class="panel-body">
         @include('card/partials/_form')
          @if (count($errors))
          <ul>
            @foreach ($errors ->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
      </div>
    </div>
  </div>
  <div class="col-lg-2"></div>
</div>
</div>
@stop

@else
<p class="pull-center">
  <h2>Please, click to <a href='/login'>Login</a> or <a href='/register'>Register</a></h2>
</p>

@endif