@extends('layouts.app')

@section('head')
	
	 <title>Users</title>

@stop

@section('content')

@include('include.message')

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="{{ route('admin.index') }}">Users</a></li>
  <li role="presentation"><a href="{{ route('admin.create') }}">Create User</a></li>
</ul>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
         <th>Name</th>
        <th>Email</th>
        <th>Role</th>
         <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if($users)
            @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><a href="{{route('admin.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      
            @endforeach
     </tbody>
     
     @endif
  </table>

@stop
