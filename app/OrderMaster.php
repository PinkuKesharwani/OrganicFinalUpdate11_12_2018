<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderMaster extends Model
{
    protected $table = 'order_master';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\UserMaster', 'user_id');
    }

    public function user_address()
    {
        return $this->belongsTo('App\UserAddress', 'address_id');
    }

    public function shop_point()
    {
        return $this->belongsTo('App\ShopPoints', 'shop_address_id');
    }

    public static function distibute_points($total_amt, $user_id)
    {
        $pointAmt = $total_amt * 0.2 / 100;

        $user = UserMaster::find($user_id);
        $user->gain_amount += $pointAmt;
        $user->save();

        $queryResult = DB::select("call getParentId($user_id)");
        if (count($queryResult) > 0) {
            if (count($queryResult) >= 4) {
                for ($i = 0; $i < 4; $i++) {
                    $puser = UserMaster::find($queryResult[$i]->parent_id);
                    $puser->gain_amount += $pointAmt;
                    $puser->save();
                    //gffytffyuff
                }
            } else {
                foreach ($queryResult as $parent_id) {
                    $puser = UserMaster::find($parent_id->parent_id);
                    $puser->gain_amount += $pointAmt;
                    $puser->save();
                }
            }
        }
    }
}
