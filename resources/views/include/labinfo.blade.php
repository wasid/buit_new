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

@endif