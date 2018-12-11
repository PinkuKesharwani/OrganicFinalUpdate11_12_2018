<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemBrand extends Model
{
    protected $table = 'item_brand';
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }
}
