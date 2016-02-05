@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New User by <a href="{{ url('member') }}" class="btn btn-link" onclick="unbindExit();">Create Now</a></div>
                <div class="panel-body">
                    @if (! $totalRecords == 0)
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Phone</th>
                          <th>Date of Birth</th>
                          <th>Select to Update</th>
                          <th>Delete User</th>
                        </tr>
                      </thead>
                      @foreach ($members as $key => $value)
                       <tbody>
                        <tr>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->phone }}</td>
                          <td>{{ $value->dob }}</td>
                          <td>
                            <input type="radio" name="optradio" value="{{ $value->id }}">
                          </td>
                          <td><a href="deletemember?id={{ $value->id }}" class="delete btn btn-link">Delete</a></td>
                        </tr>
                       </tbody>
                      @endforeach
                    </table>
                    <p>Select a User From List and <a href="" id="update" class="btn btn-link">Click Here to Update</a></p>
                    @else
                        <p>No Members Data You can <br/><a href="{{ url('member') }}" class="btn btn-link" onclick="unbindExit();">Create Now</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascript')
<script type="text/javascript">
$('.delete').click(function () {
var confirmOnPageExit = function (e)
{
    e = e || window.event;
    var message = 'Are you Sure you Want to Delete This User . . .?';
    if (e)
    {
      e.returnValue = message;
    }
    return message;
};
window.onbeforeunload = confirmOnPageExit;

});
function unbindExit() {
    window.onbeforeunload = null;
}

$('#update').click(function () {
  if ( $("input[name='optradio']:checked").val() != undefined )
  {
    var link = document.getElementById("update");
    // var url = window.location.hostname + '/updatemember?id=' + $("input[name='optradio']:checked").val();
    var url = 'updatemember?id=' + $("input[name='optradio']:checked").val();
    link.setAttribute('href', url);
    return true;
  }
  else
  {
    alert("Please Select Any User to proceed...");
    return false;
  }
});


// var memberId = $(this).attr("value");
</script>

@stop

@endsection