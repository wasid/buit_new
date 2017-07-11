@extends('layouts.app')

@section('head')
	
	 <title>Filter Page</title>

@stop
@section('content')
 
@include('include.message')

    @include('layouts.createform')
    
    <div class="container">
        <h1 class="text-center">Filter Results</h1>
        
                    @include('layouts.datesearchform')
        
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
    </div>
@stop