@extends('layouts.app')
@section('title', 'Manages Access Control')
@section('page_header', 'Access Control')
@section('page_subheader', 'list of role privilleges')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><i class="ion ion-locked"></i> Permission</h3>
                <div class="pull-right">
                    <select id="roleQuery" name="query" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->uuid}}">{{$role->display_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="box-body">
                <div class="dataTable_wrapper">
                    <table id="permissionTable" class="table table-stripped table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Allow</th>
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
$('#permissionTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('control.data')}}",
    columns: [
        {data: 'name', name: 'name'},
        {data: 'display_name', name: 'display_name'},
        {data: 'description', name: 'description'},
        {data: 'checkbox', name: 'checkbox'}
    ],

    drawCallback: function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });

        updatePermissionChecklist();
    }
});

$('#roleQuery').change(function () {
    updatePermissionChecklist();
});

function updatePermissionChecklist(roleId)
{
    var roleId = $('#roleQuery').val();
    $.ajax({
        url: "controls/permission/" + roleId,
        method: "GET"
    }).done(function (data) {
        $('input[name="checkbox"]').each(function () {
            if (data.indexOf($(this).val()) >= 0) {
                $(this).iCheck('check');
            } else {
                $(this).iCheck('uncheck');
            }
        });
    });
}
</script>
@endsection
