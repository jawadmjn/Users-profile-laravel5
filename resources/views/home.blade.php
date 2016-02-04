@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Phone</th>
                          <th>Date of Birth</th>
                          <th>Select to Update</th>
                        </tr>
                      </thead>
                      @foreach ($members as $key => $value)
                       <tbody>
                        <tr>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->phone }}</td>
                          <td>{{ $value->dob }}</td>
                          <th scope="row">
                            <div class="radio"><input type="radio" name="optradio" value="{{ $value->id }}"></div>
                          </th>
                        </tr>
                       </tbody>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection