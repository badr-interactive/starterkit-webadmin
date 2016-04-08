@extends('layouts.app')
@section('title', 'Manages Access Control')
@section('page_header', 'Access Control')
@section('page_subheader', 'list of role privilleges')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title"><i class="ion ion-locked"></i> Access Control</h3>
                <a href="{{route('user_role.form')}}">
                    <button id="btnAdd" class="btn btn-primary pull-right btn-xs"><i class="ion ion-plus"></i> Add</button>
                </a>
            </div>
            <div class="box-body">
                <div class="dataTable_wrapper">
                    <table id="controlTable" class="table table-stripped table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th width="10%">ID.</th>
                                <th>Name</th>
                                <th>Path</th>
                                <th>Allow</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($routes as $index => $route)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$route->getName()}}</td>
                                    <td>{{$route->getPath()}}</td>
                                    <td><input type="checkbox" name="routes[]" value="{{$route->getName()}}" /></td>
                                </tr>
                            @endforeach
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
var table = $('#controlTable').DataTable({
    drawCallback: function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
    }
});
</script>
@endsection
