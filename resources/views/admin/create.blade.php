@extends('layouts.app')

@section('head')
	
	 <title>Create User</title>

@stop

@section('content')

@include('include.message')

<ul class="nav nav-tabs">
  <li role="presentation"><a href="{{ route('admin.index') }}">Users</a></li>
  <li role="presentation" class="active"><a href="{{ route('admin.create') }}">Create User</a></li>
</ul>
    
    {!! Form::open([ 'method' => 'post', 'action' => 'AdminUsersController@store']) !!}
    
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
        
        {!! Form::submit('Create User', ['class' => 'btn btn-primary']); !!}
        
    </div>
    
    {!! Form::close() !!}
    
@stop