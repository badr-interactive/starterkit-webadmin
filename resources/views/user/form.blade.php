@extends('layouts.app')
@section('page_header', 'Create User')
@section('page_subheader', 'please fill the form below')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('alert-success')}}
                    </div>
                @endif
                <div class="dataTable_wrapper">
                    <form method="POST" class="form-horizontal" action="{{route('user.save')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="uuid" value="{{ $user->uuid }}" />
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                          <label for="email" class="control-label col-sm-2">Email</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" placeholder="User email address" name="email" value="{{$user->email}}" />
                              @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                              @endif
                          </div>
                        </div>
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                          <label for="fullname" class="control-label col-sm-2">Full Name</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" placeholder="User full name" name="name" value="{{$user->name}}"/>
                              @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                              @endif
                          </div>
                        </div>
                        <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                          <label for="phone" class="control-label col-sm-2">Phone</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone" value="{{$user->phone}}"/>
                              @if($errors->has('phone'))
                                <span class="help-block">{{$errors->first('phone')}}</span>
                              @endif
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="roleId" class="control-label col-sm-2">Role</label>
                          <div class="col-sm-10">
                              <select name="role_id" id="roleId" class="form-control">
                                  @foreach(App\Role::all() as $role)
                                  <option value="{{$role->id}}" {{$user->role_id === $role->id ? 'selected' : ''}}>{{$role->display_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                        <div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
