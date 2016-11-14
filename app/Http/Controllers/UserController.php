<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Traits\WithDatatables;
use App\Events\UserHasRegistered;
use App\Events\UserPasswordHasChanged;
use App\User;
use App\Role;
use App\SystemLog;
use Uuid\Uuid;
use Identicon\Identicon;
use Storage;
use Auth;
use Event;

class UserController extends Controller
{
    use WithDatatables;
    protected $relation = 'roles';
    protected $dtMode = ['action:uuid'];

    function __construct(
        User $user,
        Role $role,
        Identicon $identicon,
        SystemLog $log)
    {
        $this->tableModel = $user;
        $this->user = $user;
        $this->role = $role;
        $this->identicon = $identicon;
        $this->log = $log;
    }

    public function index(Request $request)
    {
        return response()->view('user.index');
    }

    public function form(Request $request, $uuid = 0)
    {
        $user = $this->user->firstOrNew(['uuid' => $uuid]);
        return response()->view('user.form', ['user' => $user]);
    }

    public function save(StoreUserRequest $request)
    {
        $uuid = $request->get('uuid');
        $email = $request->get('email');

        $user = $this->user->firstOrNew(['uuid' => $uuid, 'email' => $email]);
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->save();

        $role = $this->role->where(['uuid' => $request->role_id])->first();
        if ($this->isNewUser($user)) {
            $this->registerNewUser($user, $role);
            $message = trans('users.registered', ['name' => $user->name]);
        } else {
            $this->updateUserRole($user, $role);
            $message = trans('users.updated', ['name' => $user->name]);
        }

        $request->session()->flash('alert-success', $message);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $uuid = $request->get('uuid');
        $user = $this->user->where('uuid', $uuid)->first();

        if(!is_null($user)) {
            $user->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function profile(Request $requrest)
    {
        $user = Auth::user();
        $logs = $this->log->where('user', $user->email)
            ->orderBy('timestamp', 'desc')
            ->limit(50)
            ->get();

        return response()->view('user.profile', compact('user', 'logs'));
    }

    public function activation(Request $request)
    {
        $email = $request->get('email');
        $token = $request->get('token');

        $user = $this->user->where([
            'email' => $email,
            'activation_token' => $token,
            'is_active' => false
        ])->first();

        if (!is_null($user)) {
            $user->is_active = true;
            $user->save();

            return redirect()->to('/');
        }

        abort(404);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (Auth::attempt(['email' => $user->email, 'password' => $request->current_password])) {
            $user->password = bcrypt($request->new_password);
            $user->save();

            $request->session()->flash('alert-success', trans('profile.change_password_success'));
            Event::fire(new UserPasswordHasChanged($user));
        }
        else {
            $request->session()->flash('alert-danger', trans('profile.invalid_password'));
        }

        return redirect()->back();
    }

    private function updateUserRole(User $user, Role $role)
    {
        $user->detachRoles();
        $user->attachRole($role);
    }

    private function isNewUser(User $user)
    {
        return $user->uuid === '0';
    }

    private function registerNewUser(User $user, Role $role)
    {
        $generatedPassword = bin2hex(random_bytes(8));
        $user->password = bcrypt($generatedPassword);
        $user->activation_token = bin2hex(random_bytes(8));
        $user->uuid = \Uuid::generate(4);
        $user->save();
        $user->attachRole($role);

        $image = $this->identicon->getImageData($user->name);
        Storage::put('avatars/' . $user->uuid . '.png', $image);
        Event::fire(new UserHasRegistered($user, $generatedPassword));
    }

    public function updateImage(Request $request)
    {
        $user = Auth::user();
        $uuid = $user->uuid;

        $img = $request->image;

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!is_null($img)){
            
            $filename       = $uuid.'.'.$request->image->getClientOriginalExtension();
            Storage::put('avatars/'. $uuid . '.png', file_get_contents($img->getRealPath()));
            
            return back()
                ->with('upload-status', 1)
                ->with('success','Image Uploaded successfully.')
                ->with('path',$filename);
        }
        else{
            return back()
                ->with('upload-status', 2)
                ->with('fail','Please Choose the image to upload.');
        }
    }
}
