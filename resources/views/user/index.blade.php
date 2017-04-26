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