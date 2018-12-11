<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menurolemodel extends Model
{
    protected  $table='menu_role';
    public $timestamps=false;

    public function mnmy()
    {
        return $this->belongsTo('App\Menumodel', 'menu_id');
    }

}
