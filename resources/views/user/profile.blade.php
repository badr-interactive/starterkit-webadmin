@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('profile'))
@section('title', 'User Profile')
@section('page_header', 'User Profile')
@section('page_subheader', 'your profile and activity details')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="profile-user-img img-responsive img-circle hovereffect">
                    <img class="profile-user-img img-responsive img-circle" src="{{route('avatar.url', [$user->uuid])}}" alt="User profile picture">
                    <div class="profile-user-img img-responsive img-circle upload text-center">
                        <a class="info" href="#" data-toggle="modal" data-target="#uploadPicture">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->roles->first()->display_name}}</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                      <i class="fa fa-envelope"></i> <a href="mailto:{{$user->email}}"class="pull-right">{{$user->email}}</a>
                  </li>
                  <li class="list-group-item">
                      <i class="fa fa-phone"></i> <a class="pull-right">{{$user->phone}}</a>
                  </li>
                  <li class="list-group-item">
                      <i class="fa fa-gear"></i> <a class="pull-right">Active</a>
                  </li>
                </ul>
            </div> <!-- .box-body -->
        </div> <!-- .box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Change Password</h3>
            </div>
            <div class="box-body">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('alert-success')}}
                    </div>
                @endif

                @if(Session::has('alert-danger'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('alert-danger')}}
                    </div>
                @endif
                <form method="POST" action="{{route('change_password')}}">
                    <div class="form-group  {{ $errors->has('current_password') ? 'has-error' : ''}}">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="currentPassword">
                        <p class="help-block">You must provide current password to change it.</p>
                    </div>
                    <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="newPassword">
                        @if ($errors->has('new_password'))
                            <p class="help-block">{{ $errors->first('new_password') }}</p>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                        <label for="passwordConfirmation">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="passwordConfirmation">
                        @if ($errors->has('password_confirmation'))
                            <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="submit" class="btn btn-success btn-block" value="Save Password" />
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">System Logs</h3>
            </div>
            <div class="box-body table-responsive dataTable_wrapper">
                <table class="table table-hover dataTable" id="syslogTable">
                    <thead>
                        <tr>
                            <th>Timestamp</th>
                            <th>Action</th>
                            <th>IP</th>
                            <th>User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $index => $log)
                        <tr>
                            <td>{{$log->timestamp}}</td>
                            <td>{{$log->action}}</td>
                            <td>{{$log->ip_address}}</td>
                            <td>{{$log->user_agent}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="uploadPicture" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
                </div>
                <div class="modal-body">
                    @if ($message = Session::get('fail') || count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form class="form-group" action="{{route('update_image')}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                        <div>
                            <div class="cl-md-8">
                                <input type="file" name="image" >
                                <br>
                            </div>
                            <div class="cl-md-8">
                                <input type="submit" class="btn btn-primary btn-flat" href="#" value="Upload"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@if(!empty(Session::get('upload-status')) || count($errors) > 0)
<script type="text/javascript">
$(function() {
    $('#uploadPicture').modal('show');
});
</script>
@endif

<script type="text/javascript">
$('#syslogTable').DataTable({
    order: [[0, "desc"]]
});
</script>
@endsection
