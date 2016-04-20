@extends('layouts.app')
@section('title', 'User Profile')
@section('page_header', 'User Profile')
@section('page_subheader', 'your profile and activity details')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{route('avatar.url', [$user->uuid])}}" alt="User profile picture">

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
                <form method="POST" action="{{route('user.change_password')}}">
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
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
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
</div>
@endsection
