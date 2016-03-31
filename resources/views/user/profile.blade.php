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

            <p class="text-muted text-center">{{$user->role->name}}</p>

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

            <a href="#" class="btn btn-primary btn-block"><b>Save</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
                            <th>No.</th>
                            <th>Timestamp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $index => $log)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$log->timestamp}}</td>
                            <td>{{$log->action}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
