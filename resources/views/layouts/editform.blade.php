<div class="container">
    <h1>Detail Info</h1>
    @if( $details->user->id == Auth::user()->id )
    <button type="button" class="btn btn-info" data-toggle="modal" data-backdrop="static"  data-target="#update_data">Edit Asset Info</button>
    @endif
    <div class="modal fade" id="update_data">
              				<div class="modal-dialog">
              					<div class="modal-content">
              						<div class="modal-header">
              							<button class="close" data-dismiss="modal">&times;</button>
              							<h4>Update Asset Info</h4>
              						</div>
              						<div class="modal-body">
              						    
    {!! Form::model($details,['method' => 'patch', 'action' => ['UserPostController@update', $details->id]]) !!}
    
    <div class="form-group">
        
        {!! Form::label('location_id', 'Location:'); !!}
        
        {!! Form::select('location_id', array(1=>'UB5', 2=>'UB4'), null, ['class' => 'form-control']); !!}
        
    </div>
    <div class="form-group">
        
        {!! Form::label('cpu_name', 'CPU Name:'); !!}
        
        {!! Form::text('cpu_name', null, ['class' => 'form-control']); !!}
        
    </div>    
    <div class="form-group">
        
        {!! Form::label('cpu_assetno', 'CPU Asset:'); !!}
        
        {!! Form::text('cpu_assetno', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('ip', 'CPU IP:'); !!}
        
        {!! Form::text('ip', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('mac', 'MAC Address:'); !!}
        
        {!! Form::text('mac', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('u_name', 'User Name:'); !!}
        
        {!! Form::text('u_name', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('u_email', 'User Email:'); !!}
        
        {!! Form::email('u_email', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('pc_type', 'PC Type:'); !!}
        
        {!! Form::text('pc_type', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('processor', 'Processor:'); !!}
        
        {!! Form::text('processor', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('motherboard', 'Motherboard:'); !!}
        
        {!! Form::text('motherboard', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('ram', 'RAM:'); !!}
        
        {!! Form::text('ram', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('hdd', 'Hard Disk Space/Model:'); !!}
        
        {!! Form::text('hdd', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('monitor', 'Monitor Model:'); !!}
        
        {!! Form::text('monitor', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('monitor_assetno', 'Monitor Asset:'); !!}
        
        {!! Form::text('monitor_assetno', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-group">
        
        {!! Form::label('printer', 'Printer Model:'); !!}
        
        {!! Form::text('printer', null, ['class' => 'form-control']); !!}
        
    </div>        
    
    <div class="form-group">
        
        {!! Form::label('printer_assetno', 'Printer Asset:'); !!}
        
        {!! Form::text('printer_assetno', null, ['class' => 'form-control']); !!}
        
    </div>    
        
    <div class="form-group">
        
        {!! Form::label('scanner', 'Scanner Model:'); !!}
        
        {!! Form::text('scanner', null, ['class' => 'form-control']); !!}
        
    </div>    

    <div class="form-group">
        
        {!! Form::label('scanner_assetno', 'Scanner Asset:'); !!}
        
        {!! Form::text('scanner_assetno', null, ['class' => 'form-control']); !!}
        
    </div>    

    <div class="form-group">
        
        {!! Form::label('ups', 'UPS Model/Voltage:'); !!}
        
        {!! Form::text('ups', null, ['class' => 'form-control']); !!}
        
    </div>    
    
    <div class="form-group">
        
        {!! Form::label('ups_assetno', 'UPS Asset:'); !!}
        
        {!! Form::text('ups_assetno', null, ['class' => 'form-control']); !!}
        
    </div>      
    
    <div class="form-group">
        
        {!! Form::label('department', 'Department:'); !!}
        
        {!! Form::text('department', null, ['class' => 'form-control']); !!}
        
    </div>      
    <div class="form-group">
        
        {!! Form::label('comment', 'Comment:'); !!}
        
        {!! Form::textarea('comment', null, ['class' => 'form-control']); !!}
        
    </div>    
    
    <div class="form-goup">
        
        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']); !!}
        
    </div>
    
    {!! Form::close() !!}
              						</div>
              						<div class="modal-footer">
              							<div class="text-right">
              								<button class="btn btn-danger" data-dismiss="modal">Close</button>
              							</div>
              						</div>
              					</div>
              				</div>
              			</div>
   </div> 