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
                                  <div class="form-goup">
                                    {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $labinfo->id]]) !!}
                
                                    <div class="form-goup">
                                        
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']); !!}
                                        
                                    </div>
                                    
                                    {!! Form::close() !!}
                                  </div>
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
                                  <div class="form-goup">
                                    {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $labinfo->id]]) !!}
                
                                    <div class="form-goup">
                                        
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']); !!}
                                        
                                    </div>
                                    
                                    {!! Form::close() !!}
                                  </div>
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
    </div>
@stop