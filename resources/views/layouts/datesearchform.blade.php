    <div class="row">
        <div class="col-sm-8">
            @include('layouts.createform')
        </div>
        <div class="col-sm-4">
            <div class="pull-right">
                <h4>Search By Date:</h4>
                <form method="post" action="{{ route('search') }}">
                    Enter a date From:<br>
                    <input type="date" id="from" name="from"><br><br>
                    Enter a date To:<br>
                    <input type="date" id="to" name="to"><br><br>
                    <input type="submit" value="submit" class="btn btn-primary btn-sm">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
        </div>
    </div>