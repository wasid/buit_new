@extends('layouts.app')

@section('head')
	
	 <title>Filter Page</title>

@stop
@section('content')
 
@include('include.message')

    <div class="container">
        <h1 class="text-center">Search Results</h1>
        
        <table class="table">
            <thead>
               @include('include.labparam')
            </thead>
            
            @if(!$labdata->isEmpty())
            <tbody>
            
                @foreach($labdata as $index => $labinfo)
                   
                    @include('include.labinfo')
                    
                @endforeach
             </tbody>
            @else
                <h1 class="text-center">No Data Found!</h1>
            @endif
        </table>
    </div>
@stop