@extends('errors.master')
@section('title', 'Error: 500')
@section('content')
<div class="error">
    <div class="error-code m-b-10 m-t-20">503 <i class="fa fa-warning"></i></div>
    <h3 class="font-bold">Oops..</h3>

    <div class="error-desc">
        Sorry, there is something wrong with the server
        <div>
            <a class=" login-detail-panel-button btn" href="/">
                    <i class="fa fa-arrow-left"></i>
                    Go back to Homepage
                </a>
        </div>
    </div>
</div>
@stop
