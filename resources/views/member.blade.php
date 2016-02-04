@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" id="createForm" role="form" method="POST" action="{{ url('createmember') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">User Name</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}"
                                    data-validation="required custom"
                                    data-validation-regexp="^([A-z]+)$"
                                    data-validation-error-msg="Enter User Name (Contains no numeric)"
                                    >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{ old('email') }}"
                                data-validation="required email"
                                data-validation-error-msg="Enter Valid Email"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6">
                                <input
                                type="text"
                                class="form-control"
                                name="phone"
                                value="{{ old('phone') }}"
                                data-validation="required number"
                                data-validation-error-msg="Enter Phone Number"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Date of Birth</label>
                            <div class="col-md-6">
                                <input
                                type="text"
                                class="form-control"
                                name="dob"
                                value="{{ old('phone') }}"
                                data-validation="required date"
                                data-validation-format="yyyy.mm.dd"
                                data-validation-help="yyyy.mm.dd"
                                data-validation-error-msg="Enter Your DOB"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('javascript')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script type="text/javascript">
$.validate({
    form : '#createForm',
    borderColorOnError : '#d3d3d3'
});
</script>
@stop

@endsection