<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo('App\ItemMaster', 'item_id');
    }

}
