<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRoleRequest;
use App\Traits\WithDatatables;
use App\UserRole;
use Uuid\Uuid;

class UserRoleController extends Controller
{
    use WithDatatables;

    function __construct(UserRole $userRole)
    {
        $this->tableModel = $userRole;
        $this->userRole = $userRole;
    }

    public function index(Request $request)
    {
        return response()->view('role.index');
    }

    public function form(Request $request, $uuid = 0)
    {
        $userRole = $this->userRole->firstOrNew(['uuid' => $uuid]);
        return response()->view('role.form', ['userRole' => $userRole]);
    }

    public function save(StoreUserRoleRequest $request)
    {
        $uuid = $request->uuid;
        $userRole = $this->userRole->firstOrNew(['uuid' => $uuid]);
        $userRole->uuid = empty($uuid) ? \Uuid::generate(4) : $uuid;
        $userRole->name = $request->name;
        $userRole->description = $request->description;
        $userRole->is_admin = $request->is_admin ? 1 : 0;
        $userRole->save();

        if (empty($uuid)) {
            $request->session()->flash('alert-success', 'User Role was successfully saved!');
        } else {
            $request->session()->flash('alert-success', 'User Role data was successfully updated!');
        }

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $uuid = $request->uuid;
        $userRole = $this->userRole->where(['uuid' => $uuid])->first();

        if(!is_null($userRole)) {
            $userRole->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
