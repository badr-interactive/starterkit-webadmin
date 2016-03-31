<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    protected $table = 'system_logs';
    protected $fillable = ['timestamp', 'user', 'action'];
    public $timestamps = false;
}
