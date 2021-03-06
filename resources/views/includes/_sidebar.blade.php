<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @permission('manage-users')
                <li><a href="{{route('user.index')}}"><i class="ion ion-person"></i> Users</a></li>
            @endpermission

            @permission('manage-roles')
            <li><a href="{{route('user_role.index')}}"><i class="ion ion-locked"></i> User Roles</a></li>
            @endpermission

            @permission('manage-controls')
            <li><a href="{{route('control.index')}}"><i class="ion ion-locked"></i> Permissions</a></li>
            @endpermission
        </ul>
    </section>
  <!-- /.sidebar -->
</aside>
