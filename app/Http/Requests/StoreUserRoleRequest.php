<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Role;

class StoreUserRoleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userRole = Role::where(['uuid' => $this->uuid])->first();
        $userRoleId = is_null($userRole) ? 0 : $userRole->id;

        return [
            'name' => 'required|unique:roles,name,' . $userRoleId,
            'display_name' => 'required|unique:roles,display_name,' . $userRoleId,
            'description' => 'required'
        ];
    }
}
