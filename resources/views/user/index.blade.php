@extends('layouts.app')
@section('title', 'Manages Users')
@section('page_header', 'Users')
@section('page_subheader', 'list of registered users')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="ion ion-person"></i> Users</h3>
                <a href="{{route('user.form')}}">
                    <button class="btn btn-primary pull-right btn-xs"><i class="ion ion-plus-round"></i> Add</button>
                </a>
            </div>
            <div class="box-body">
                <div class="dataTable_wrapper">
                    <table id="userTable" class="table table-stripped table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th width="10%">ID.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$('#userTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route('user.data')}}',
    columns: [
        {data: 'rownum', name: 'rownum'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'role.name', name: 'role'},
        {data: 'created_at', name: 'created_at'},
        {data: 'updated_at', name: 'updated_at'},
        {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-right'}
    ]
});

$('table').on('click', '.btn-delete', function () {
    var uuid = $(this).attr('data-value');
    var info = $(this).attr('data-info');
    $('#deleteInfo').text(info);
    $('#deleteModal').modal('show').one('click', '#confirmDelete', function () {
        $.ajax({
            method: 'POST',
            url: '{{route("user.delete")}}',
            data: {_token: '{{csrf_token()}}', uuid: uuid}
        }).done(function(result) {
            if(result.success === true) {
                window.location.reload();
            }
        })
    });
});

$('table').on('click', '.btn-edit', function () {
    var uuid = $(this).attr('data-value');
    window.location.href = 'users/form/' + uuid;
});
</script>
@endsection
