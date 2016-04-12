<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\WithDatatables;
use App\Permission;
use App\Role;

class AccessController extends Controller
{
    use WithDatatables;
    protected $dtMode = ['checkbox'];

    function __construct(Permission $permission, Role $role)
    {
        $this->tableModel = $permission;
        $this->permission = $permission;
        $this->role = $role;
    }

    public function index(Request $request)
    {
        $roles = $this->role->all();
        $permissions = $this->permission->all();
        return response()->view('control.index', [
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }
}
