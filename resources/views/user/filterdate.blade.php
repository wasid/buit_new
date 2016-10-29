@extends('layouts.app')

@section('head')
	
	 <title>Search Page</title>

@stop
@section('content')
 
@include('include.message')

    <div class="container">
        <h1 class="text-center">Search Results</h1>
        <h4>Search By Date:</h4>
        <div class="form-group">
            <form method="post" action="{{ route('search') }}">
                    Enter a date From:<br>
                    <input type="date" id="from" name="from"><br><br>
                    Enter a date To:<br>
                    <input type="date" id="to" name="to"><br><br>
                    <input type="submit" value="submit" class="btn btn-primary btn-sm">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
        <div class="form-group">
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>CPU IP</th>
                <th>Created</th>
                <th>Updated</th>
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
                        </tr>

                    @endif
                    
                @endforeach
             </tbody>
    
            @endif
        </table>
    </div>
@stop