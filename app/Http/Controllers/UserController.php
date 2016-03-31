<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Traits\WithDatatables;
use App\User;
use App\SystemLog;
use Uuid\Uuid;
use Identicon\Identicon;
use Storage;
use Mail;
use Auth;

class UserController extends Controller
{
    use WithDatatables;
    protected $relation = 'role';

    function __construct(
        User $user,
        Identicon $identicon,
        SystemLog $log)
    {
        $this->tableModel = $user;
        $this->user = $user;
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
        $user->uuid = empty($uuid) ? \Uuid::generate(4) : $uuid;
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->role_id = $request->get('role_id');
        $user->save();

        $image = $this->identicon->getImageData($request->name);
        Storage::put('avatars/' . $request->get('uuid') . '.png', $image);

        Mail::send('emails.registration', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Account Activation');
        });

        if (empty($uuid)) {
            $request->session()->flash('alert-success', 'User was successfully saved! '
                . 'Please inform the user to check their email for account activation');
        } else {
            $request->session()->flash('alert-success', 'User account was successfully updated!');
        }

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
            ->get();

        return response()->view('user.profile', compact('user', 'logs'));
    }
}
