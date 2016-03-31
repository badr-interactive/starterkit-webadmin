<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class StoreUserRequest extends Request
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
        $user = User::where(['uuid' => $this->uuid])->first();
        $userId = is_null($user) ? 0 : $user->id;

        return [
            'email' => 'required|email|unique:users,email,'. $userId,
            'name' => 'required',
            'role_id' => 'required'
        ];
    }
}
