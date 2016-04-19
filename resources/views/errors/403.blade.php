@extends('errors.master')
@section('title', 'Error: 404')
@section('content')
<div class="error">
    <div class="error-code m-b-10 m-t-20">403 <i class="fa fa-warning"></i></div>
    <h3 class="font-bold">Permission Denied..</h3>

    <div class="error-desc">
        Sorry, but you don't have permission to access this page. <br/>
        Try to cantact your system administrator to fix this issue.
        <div>
            <a class=" login-detail-panel-button btn" href="/">
                    <i class="fa fa-arrow-left"></i>
                    Go back to Homepage
                </a>
        </div>
    </div>
</div>
@stop
