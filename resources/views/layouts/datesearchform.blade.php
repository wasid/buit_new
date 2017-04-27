<div class="row">
        
    <div class="search-container">
                                        
           <div class="search-button">
               <button id="toggle-search" class="btn btn-primary">Get Data</button>
           </div>
        
        <div class="search-bar col-sm-4">

            <h4>Search By Date:</h4>

            {!! Form::open([ 'method' => 'post', 'action' => 'UserPostController@search']) !!}
                   
                    <div class="form-group">
        
                        {!! Form::label('from', 'Enter a date From:'); !!}
                        
                        {!! Form::text('from', null, ['class' => 'form-control datepicker']); !!}
                        
                    </div>
                     <div class="form-group">
        
                        {!! Form::label('to', 'Enter a date To:'); !!}
                        
                        {!! Form::text('to', null, ['class' => 'form-control datepicker']); !!}
                        
                    </div>
                    
                    @if( Auth::user()->isAdmin() )
                    
                    <div class="form-group">
                
                        {!! Form::label('name', 'Lab Name:'); !!}
                        
                        {!! Form::select('name', ['' => 'Choose One'] + $labname, null, ['class' => 'form-control']); !!}
                        
                    </div>
                    
                    @endif                    

                    <div class="form-goup">
                        
                        {!! Form::submit('Search', ['class' => 'btn btn-primary']); !!}
                        
                    </div>
            {!! Form::close() !!}
        </div>
    </div>    
</div>