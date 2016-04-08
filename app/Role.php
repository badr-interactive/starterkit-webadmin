<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Role extends EntrustPermission
{
    protected $table = 'roles';
    protected $fillable = ['uuid', 'name', 'display_name', 'description', 'created_at', 'updated_at'];
}
