<div class="col-md-6">
    <form action="{{ route('showstudent') }}" method="post">
      <div class="form-group">
        <input class="form-control" type="text" name="studentid" id="search_id" placeholder = "Find With ID"/>
      </div>
      <div class="form-group">
        <input type="submit" value="Find ID" id="find_id" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </div>
    </form>
</div>