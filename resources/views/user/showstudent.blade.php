@extends('layouts.app')

@section('head')
	
	@parent

	<title>Student's Details</title>

@stop
@section('content')
      <div class="container">
        <h2>Student's ID & Passwords</h2>
        
        @include('include.studentsearch')
      
      @if(count($students))
          <table class="table table-bordered">
          <thead>
            <tr>
              <th>Student ID</th>
              <th>Name</th>
              <th>Password</th>
            </tr>
          </thead>
          @foreach($students as $student)
          <tbody>
            <tr>
              <td>{{ $student->studentid }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->pass }}</td>
       	  </tr>
          </tbody>
          @endforeach
        </table>
      @endif
    </div>
@endsection