@extends('layouts.app')

@section('head')
	
	 <title>Show Detail Page</title>

@stop
@section('content')
 
@include('include.message')

    @include('layouts.editform')
    <div class="container">
      @if($details)
        <table class="table table-bordered">
                <tbody>
                    <tr>
                      <th>ID</th>
                        <td>{{ $details->id }}</td>
                    </tr>
                    <tr>
                      <th>Created By</th>
                        <td>{{ $details->user->name }}</td>
                    </tr>
                    <tr>
                      <th>CPU Name</th>
                        <td>{{ $details->cpu_name }}</td>
                    </tr>
                    <tr>
                      <th>CPU Assetno</th>
                        <td>{{ $details->cpu_assetno }}</td>
                    </tr>
                    <tr>
                      <th>PC IP</th>
                        <td>{{ $details->ip }}</td>
                    </tr>
                    <tr>
                      <th>CPU MAC</th>
                        <td>{{ $details->mac }}</td>
                    </tr>
                    <tr>
                      <th>User Name</th>
                        <td>{{ $details->u_name }}</td>
                    </tr>
                    <tr>
                      <th>User Email</th>
                        <td>{{ $details->u_email }}</td>
                    </tr>
                    <tr>
                      <th>PC Type</th>
                        <td>{{ $details->pc_type }}</td>
                    </tr>
                    <tr>
                      <th>Processor</th>
                        <td>{{ $details->processor }}</td>
                    </tr>
                    <tr>
                      <th>Motherboard</th>
                        <td>{{ $details->motherboard }}</td>
                    </tr>
                    <tr>
                      <th>RAM</th>
                        <td>{{ $details->ram }}</td>
                    </tr>
                    <tr>
                      <th>Hard Disk</th>
                        <td>{{ $details->hdd }}</td>
                    </tr>
                    <tr>
                      <th>Monitor</th>
                        <td>{{ $details->monitor }}</td>
                    </tr>
                    <tr>
                      <th>Monitor Asset No.</th>
                        <td>{{ $details->monitor_assetno }}</td>
                    </tr>
                    <tr>
                      <th>Vendor Name</th>
                        <td>{{ $details->vendor_name }}</td>
                    </tr>
                    <tr>
                      <th>Delivery Date</th>
                        <td>{{ $details->delivery_date }}</td>
                    </tr>
                    <tr>
                      <th>Printer</th>
                        <td>{{ $details->printer }}</td>
                    </tr>
                    <tr>
                      <th>Printer Asset No.</th>
                        <td>{{ $details->printer_assetno }}</td>
                    </tr>
                    <tr>
                      <th>Scanner</th>
                        <td>{{ $details->scanner }}</td>
                    </tr>
                    <tr>
                      <th>Scanner Asset No.</th>
                        <td>{{ $details->scanner_assetno }}</td>
                    </tr>
                    <tr>
                      <th>UPS</th>
                        <td>{{ $details->ups }}</td>
                    </tr>
                    <tr>
                      <th>UPS Asset No.</th>
                        <td>{{ $details->ups_assetno }}</td>
                    </tr>
                    <tr>
                      <th>Department</th>
                        <td>{{ $details->department }}</td>
                    </tr>
                    <tr>
                      <th>Comment</th>
                       <td>{{ $details->comment }}</td>
                    </tr>
                    <tr>
                      <th>Created</th>
                        <td>{{ $details->created_at->diffForHumans() }}</td>
                    </tr>
                    <tr>
                      <th>Updated</th>
                        <td>{{ $details->updated_at->diffForHumans() }}</td>
                    </tr>
                </tbody>
        </table>
                @if( $details->user->id == Auth::user()->id )
                
                  {!! Form::open(['method' => 'delete', 'action' => ['UserPostController@destroy', $details->id]]) !!}
                  
                    @include('layouts.deleteform')
                    
                  {!! Form::close() !!}
                
                @endif
                
        @endif
    </div>
    
@stop