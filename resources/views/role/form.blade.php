@extends('layouts.app')
@section('page_header', 'Create User Role')
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
                    <form method="POST" class="form-horizontal" action="{{route('user_role.save')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="uuid" value="{{ $userRole->uuid }}" />
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                          <label for="name" class="control-label col-sm-2">Name</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" placeholder="Role Name" name="name" value="{{$userRole->name}}" />
                              @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                              @endif
                          </div>
                        </div>
                        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                          <label for="fullname" class="control-label col-sm-2">Description</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="description" placeholder="Role Description" name="description" value="{{$userRole->description}}"/>
                              @if($errors->has('description'))
                                <span class="help-block">{{$errors->first('description')}}</span>
                              @endif
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="isAdmin" class="control-label col-sm-2">Is Admin</label>
                          <div class="col-sm-10">
                              <input type="checkbox" id="isAdmin" name="is_admin" value="true" {{$userRole->is_admin ? "checked" : ""}} />
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

@section('script')
<script type="text/javascript">
$('#userTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route('user.data')}}',
    columns: [
        {data: 'id', name: 'id'},
        {data: 'picture', name: 'picture'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'created_at', name: 'created_at'},
        {data: 'updated_at', name: 'updated_at'},
        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-right'}
    ]
});
</script>
@endsection
