@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New User by <a href="{{ url('member') }}" class="btn btn-link">Create Now</a></div>
                <div class="panel-body">
                    @if (! $totalRecords == 0)
                    @include('forms.modalform')
                    @include('forms.pagination')
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Phone</th>
                          <th>Date of Birth</th>
                          <!-- if you do not want to show these rows to guest users than just en-able this @ if auth checker and down @ endif also -->
                          <!-- @ if (! Auth::guest()) -->
                          <th>Select to Update</th>
                          <th>Delete User</th>
                          <!-- @ endif -->
                        </tr>
                      </thead>
                      <?php $i = 1; ?>
                      @foreach ($members as $key => $value)
                       <tbody>
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->phone }}</td>
                          <td>{{ $value->dob }}</td>
                          <!-- if you do not want to show these rows to guest users than just en-able this @ if auth checker and down @ endif also -->
                          <!-- @ if (! Auth::guest()) -->
                          <td>
                            <input type="radio" name="optradio" value="{{ $value->id }}">
                          </td>
                          <td>
                            <button type="button" value="{{ $value->id }}" class="delete btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                          </td>
                          <!-- @ endif -->
                        </tr>
                       </tbody>
                       <?php $i++; ?>
                      @endforeach
                    </table>
                    <p>Select a User From List and <a href="" id="update" class="btn btn-link">Click Here to Update</a></p>
                    @else
                        <p>No Members Data You can <br/><a href="{{ url('member') }}" class="btn btn-link">Create Now</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascript')
<script type="text/javascript">
$('.delete').click(function () {
  var memberId = $(this).attr("value");
  var link = document.getElementById("deleteLink");
  var url = 'deletemember?id=' + memberId;
  link.setAttribute('href', url);
});

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
</script>

@stop

@endsection