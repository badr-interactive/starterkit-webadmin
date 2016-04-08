<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Carbon\Carbon;

class User extends Authenticatable
{
    use CanResetPassword;
    use EntrustUserTrait;

    protected $table = 'users';
    protected $fillable = ['uuid', 'name', 'email', 'password', 'phone', 'role_id', 'created_at', 'updated_at'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['role_id' => 'integer'];

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    public function role()
    {
        return $this->hasOne('App\UserRole', 'id', 'role_id');
    }
}
