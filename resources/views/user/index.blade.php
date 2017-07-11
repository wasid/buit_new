@extends('layouts.app')

@section('head')
	
	 <title>Index Page</title>

@stop
@section('content')
 
@include('include.message')

    <div class="container">
        <h3 class="text-center">Index Page</h3>
        @include('layouts.datesearchform')
        
        <br><br>

        @include('layouts.createform')

        <div class="text-center">{{ $labinfos->links() }}</div>
        
        <table class="table">
            <thead>
                @include('include.labparam')
            </thead>
            
            @if($labinfos)
            <tbody>
            
                @foreach($labinfos as $index => $labinfo)
                   
                    @include('include.labinfo')

                @endforeach
             </tbody>
    
            @endif
        </table>
        <div class="text-center">{{ $labinfos->links() }}</div>
    </div>
@stop