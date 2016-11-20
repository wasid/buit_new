@extends('layouts.app')

@section('head')
	
	 <title>Search Page</title>

@stop
@section('content')
 
@include('include.message')

    <div class="container">
        <h1 class="text-center">Search Results</h1>
            
            @include('layouts.datesearchform')
        
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
            
            @if($input)
            <tbody>
            
                @foreach($input as $index => $data)
                    
                    @if(Auth::user()->isAdmin())
                       
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><a href="{{ route('filter', ['lab_name' => $data->user->name]) }}">{{ $data->user->name }}</a></td>
                            <td>{{ $data->ip }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                                <div class="form-goup">
                                    {!! Form::open([ 'method' => 'get', 'action' => ['UserPostController@show', $data->id]]) !!}
                                    
                                    <div class="form-goup">
                                        
                                        {!! Form::submit('Show Detail', ['class' => 'btn btn-success']); !!}
                                        
                                    </div>
                                    
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td>
                                @if( $data->user->id == Auth::user()->id )
                                  
                                    {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $data->id]]) !!}
            
                                    <div class="clearfix">
                              			<a href="#" data-toggle="modal" data-target="#info_delete{{ $data->id }}" class="btn btn-danger btn-md">Delete</a>
                                    </div>
                                       <!--modal-->
                                 	<div class="modal fade" id="info_delete{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    
                                    @include('layouts.deleteformid')
                                    
                                    {!! Form::close() !!}
                                  
                                @else
                                    N\A
                                @endif
                            </td>
                        </tr>
                        
                    @elseif( $data->user->id == Auth::user()->id )
                    
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><a href="{{ route('filter', ['lab_name' => $data->user->name]) }}">{{ $data->user->name }}</a></td>
                            <td>{{ $data->ip }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                                <div class="form-goup">
                                    {!! Form::open([ 'method' => 'get', 'action' => ['UserPostController@show', $data->id]]) !!}
                                    
                                    <div class="form-goup">
                                        
                                        {!! Form::submit('Show Detail', ['class' => 'btn btn-success']); !!}
                                        
                                    </div>
                                    
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td>
                                @if( $data->user->id == Auth::user()->id )
                                  
                                    {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $data->id]]) !!}
                                    
                                    <div class="clearfix">
                              			<a href="#" data-toggle="modal" data-target="#info_delete{{ $data->id }}" class="btn btn-danger btn-md">Delete</a>
                                    </div>
                                       <!--modal-->
                                 	<div class="modal fade" id="info_delete{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    @include('layouts.deleteformid')
                                    
                                    {!! Form::close() !!}
                                  
                                @else
                                    N\A
                                @endif
                            </td>
                        </tr>

                    @endif
                    
                @endforeach
             </tbody>
    
            @endif
        </table>
@stop