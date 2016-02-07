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

<form class="form-horizontal" id="createForm" role="form" method="POST" action="{{ Session::get('update') ? url('updatemember') : url('createmember') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">User Name</label>
        <div class="col-md-6">
            <input
                type="text"
                class="form-control"
                name="name"
                value="{{ isset($member->name) ? $member->name : old('name') }}"
                data-validation="required length"
                data-validation-regexp="^([A-z]+)$"
                data-validation-length="max30"
                data-validation-error-msg="Enter User Name (Only Alphabets and Not more than 30 characters)"
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
            value="{{ isset($member->email) ? $member->email : old('email') }}"
            data-validation="required email length"
            data-validation-length="max50"
            data-validation-error-msg="Enter Valid Email And Not more than 50 characters"
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
            value="{{ isset($member->phone) ? $member->phone : old('phone') }}"
            data-validation="required number length"
            data-validation-length="max20"
            data-validation-error-msg="Enter Valid Phone Number Not more than 20 characters"
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
            id="datepicker"
            value="{{ isset($member->dob) ? $member->dob : old('dob') }}"
            data-validation="required date"
            data-validation-format="yyyy-mm-dd"
            data-validation-help="yyyy-mm-dd"
            data-validation-error-msg="Enter Valid Your DOB (yyyy-mm-dd)"
            >
        </div>
    </div>

    <input type="hidden" class="form-control" name="id" value="{{ isset($member->id) ? $member->id : old('id') }}">

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
            <a href="{{ url('/') }}" class="btn btn-default" role="button">Cancel</a>
        </div>
    </div>
</form>