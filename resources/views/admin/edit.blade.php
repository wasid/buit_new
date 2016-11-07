@extends('layouts.app')

@section('head')
	
	 <title>Edit Users</title>

@stop

@section('content')

@include('include.message')

<ul class="nav nav-tabs">
  <li role="presentation"><a href="{{ route('admin.index') }}">Users</a></li>
  <li role="presentation"><a href="{{ route('admin.create') }}">Create User</a></li>
</ul>

<h1>Edit Users</h1>

        {!! Form::model($user, [ 'method' => 'patch', 'action' => ['AdminUsersController@update', $user->id]]) !!}
        
        <div class="form-group">
            
            {!! Form::label('name', 'Name:'); !!}
            
            {!! Form::text('name', null, ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('email', 'Email:'); !!}
            
            {!! Form::email('email', null, ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('role_id', 'Role:'); !!}
            
            {!! Form::select('role_id', ['' => 'Choose One'] + $roles, null, ['class' => 'form-control']); !!}
            
        </div>

        <div class="form-group">
            
            {!! Form::label('password', 'Password:'); !!}
            
            {!! Form::password('password', ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-goup">
            
            {!! Form::submit('Update User', ['class' => 'btn btn-primary  col-sm-6']); !!}
            
        </div>
        
        {!! Form::close() !!}
        
        <div class="form-goup">
            {!! Form::open([ 'method' => 'delete', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
            
            <div class="form-goup">
                
                {!! Form::submit('Delete User', ['class' => 'btn btn-danger  col-sm-6']); !!}
                
            </div>
            
            {!! Form::close() !!}
        </div>

@stop