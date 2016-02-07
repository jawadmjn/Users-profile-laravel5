@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>* All Fields are Required.</h4></div>

                <div class="panel-body">
                    @include('forms.memberform')
                </div>
            </div>
        </div>
    </div>
</div>

@section('javascript')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

<!-- Jquery datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">
$.validate({
    form : '#createForm',
    borderColorOnError : '#d3d3d3'
});

$(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
});



</script>
@stop

@endsection