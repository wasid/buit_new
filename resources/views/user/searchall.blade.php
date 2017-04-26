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
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>CPU IP</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Detail</th>
                <th>Action</th>
              </tr>
            </thead>
            
            @if($labdata)
            <tbody>
            
                @foreach($labdata as $index => $labinfo)
                   
                    @include('include.labinfo')
                    
                @endforeach
             </tbody>
    
            @endif
        </table>
    </div>
@stop