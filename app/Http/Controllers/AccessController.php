<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\WithDatatables;
use App\Permission;

class AccessController extends Controller
{
    use WithDatatables;
    protected $dtMode = ['checkbox'];

    function __construct(Permission $permission)
    {
        $this->tableModel = $permission;
        $this->permission = $permission;
    }

    public function index(Request $request)
    {
        $permissions = $this->permission->all();
        return response()->view('control.index', ['permissions' => $permissions]);
    }
}
