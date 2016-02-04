@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @include('forms.memberform')
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