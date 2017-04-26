<!--Not in use right now-->
@elseif( !(Auth::user()->isAdmin()) )
    <!--Getting only the first row-->
    @if($index == 0)
    <div class="alert alert-danger text-center">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <p><strong>Failed!</strong> You are not allowed to see these data!</p>
    </div>
    @endif
@endif
