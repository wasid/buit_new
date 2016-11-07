@extends('layouts.app')

@section('head')
	
	 <title>Index Page</title>

@stop
@section('content')
 
@include('include.message')
<div class="bg"></div>
<div class="jumbotron text-center">
 <h1>BRACU IT System</h1>
  <p class="lead">Asset Management Tool.</p>
</div>
  @if( Auth::user()->isAdmin() )  
    <div class="container">
      <div class="row">
        @if($users)
            @foreach($users as $index => $user)
        <div class="col-sm-4 text-center">
            <h3>LAB {{ $index+1 }}</h3>
           
            <p>
               <a href="{{ route('filter', ['lab_name' => $user->name]) }}">{{ $user->name }}</a>
            </p>
    
        </div>
           @endforeach
        @endif
      </div>
    </div>
  @endif
@stop