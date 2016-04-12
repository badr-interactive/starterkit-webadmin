<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Carbon\Carbon;

class Role extends EntrustRole
{
    protected $table = 'roles';
    protected $fillable = ['uuid', 'name', 'display_name', 'description', 'created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }
}
