@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('role.index'))
@section('title', 'Manages User Roles')
@section('page_header', 'User Roles')
@section('page_subheader', 'list of user roles')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><i class="ion ion-locked"></i> User Roles</h3>
                <a href="{{route('user_role.form')}}">
                    <button id="btnAdd" class="btn btn-primary pull-right btn-xs"><i class="ion ion-plus"></i> Add</button>
                </a>
            </div>
            <div class="box-body">
                <div class="dataTable_wrapper">
                    <table id="userRoleTable" class="table table-stripped table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Display Name</th>
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
$('#userRoleTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('user_role.data')}}",
    columns: [
        {data: 'name', name: 'name'},
        {data: 'display_name', name: 'display_name'},
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
            url: '{{route("user_role.delete")}}',
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
    window.location.href = 'user_roles/form/' + uuid;
});
</script>
@endsection
