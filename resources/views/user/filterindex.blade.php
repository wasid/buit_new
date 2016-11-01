@extends('layouts.app')

@section('head')
	
	 <title>Filter Page</title>

@stop
@section('content')
 
@include('include.message')

    @include('layouts.createform')
    
    <div class="container">
        <h1 class="text-center">Filter Results</h1>
        <h4>Search By Date:</h4>
        <div class="form-group">
        <form method="post" action="{{ route('search') }}">
            Enter a date From:<br>
            <input type="date" name="from"><br><br>
            Enter a date To:<br>
            <input type="date" name="to"><br><br>
            <input type="submit" value="submit" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
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