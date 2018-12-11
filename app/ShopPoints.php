<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopPoints extends Model
{
    protected $table = 'shop_points';
    public $timestamps = false;

    public function cityname()
    {
        return $this->belongsTo('App\CityModel', 'city_id');
    }
}
