<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'admin_master';
    public $timestamps = false;

    public function rm()
    {
        return $this->belongsTo('App\rollmaster', 'rollmaster_id');
    }
}
