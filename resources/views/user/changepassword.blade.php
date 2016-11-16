@extends('layouts.app')

@section('head')
	
	 <title>Change Password</title>

@stop

@section('content')

@include('include.message')

    <div class="col-sm-6">
    
        {!! Form::open([ 'method' => 'post', 'action' => 'UserPostController@newPassword']) !!}
        
      
        <div class="form-group">
            
            {!! Form::label('old_password', 'Old Password:'); !!}
            
            {!! Form::password('old_password', ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('password', 'New Password:'); !!}
            
            {!! Form::password('password', ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('password_again', 'Confirm Password:'); !!}
            
            {!! Form::password('password_again', ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-goup">
            
            {!! Form::submit('Update Password', ['class' => 'btn btn-primary']); !!}
            
        </div>
        
        {!! Form::close() !!}
    </div>    
@stop