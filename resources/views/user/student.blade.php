@extends('layouts.app')

@section('head')
	
	@parent

	<title>Student's Details</title>

@stop
@section('content')
      <div class="container">
        <h2>Student's ID & Passwords</h2>
        <p>Student's ID & Passwords are gven below:</p>
    <form action="{{ route('showstudent') }}" method="post">
    <div class="form-group">
            <label for="labdata">Search ID:</label><br>
            <input type="text" name="studentid" placeholder = "Find With ID"/>
        </div>
      <input type="submit" value="submit" class="btn btn-primary">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
    
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
    </div>
    
@endsection