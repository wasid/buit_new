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
                   
                    @if( $labinfo->user->id == Auth::user()->id )
            
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td><a href="{{ route('filter', ['lab_name' => $labinfo->user->name]) }}">{{ $labinfo->user->name }}</a></td>
                            <td>{{ $labinfo->ip }}</td>
                            <td>{{ $labinfo->created_at->diffForHumans() }}</td>
                            <td>{{ $labinfo->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="form-goup">
                                    {!! Form::open([ 'method' => 'get', 'action' => ['UserPostController@show', $labinfo->id]]) !!}
                                    
                                    <div class="form-goup">
                                        
                                        {!! Form::submit('Show Detail', ['class' => 'btn btn-success']); !!}
                                        
                                    </div>
                                    
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td>
                                @if( $labinfo->user->id == Auth::user()->id )
                                  
                                    {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $labinfo->id]]) !!}
                                    <div class="clearfix">
                              			<a href="#" data-toggle="modal" data-target="#info_delete{{ $labinfo->id }}" class="btn btn-danger btn-md">Delete</a>
                                    </div>
                                       <!--modal-->
                                 	<div class="modal fade" id="info_delete{{ $labinfo->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    @include('layouts.deleteformid')
                                    
                                    {!! Form::close() !!}
                               
                                @else
                                    N\A
                                @endif
                            </td>
                        </tr>
                    @elseif( Auth::user()->isAdmin() )
                    
                        <tr>
                            <td>{{ $index+1 }}</td>
                             <td><a href="{{ route('filter', ['lab_name' => $labinfo->user->name]) }}">{{ $labinfo->user->name }}</a></td>
                            <td>{{ $labinfo->ip }}</td>
                            <td>{{ $labinfo->created_at->diffForHumans() }}</td>
                            <td>{{ $labinfo->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="form-goup">
                                    {!! Form::open([ 'method' => 'get', 'action' => ['UserPostController@show', $labinfo->id]]) !!}
                                    
                                    <div class="form-goup">
                                        
                                        {!! Form::submit('Show Detail', ['class' => 'btn btn-success']); !!}
                                        
                                    </div>
                                    
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td>
                                @if( $labinfo->user->id == Auth::user()->id )
                                  
                                    {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $labinfo->id]]) !!}
                                    
                                    <div class="clearfix">
                              			<a href="#" data-toggle="modal" data-target="#info_delete{{ $labinfo->id }}" class="btn btn-danger btn-md">Delete</a>
                                    </div>
                                       <!--modal-->
                                 	<div class="modal fade" id="info_delete{{ $labinfo->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    @include('layouts.deleteformid')
                                    
                                    {!! Form::close() !!}
 
                                @else
                                    N\A
                                @endif
                            </td>
                        </tr>
                    
                    @elseif( !(Auth::user()->isAdmin()) )
                     
                        <div class="alert alert-danger text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <p><strong>Failed!</strong> You are not allowed to see these data!</p>
                        </div>
                        @break
            
                    @endif
                @endforeach
             </tbody>
    
            @endif
        </table>
    </div>
@stop