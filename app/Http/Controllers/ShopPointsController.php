<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\ShopPoints;
use Illuminate\Http\Request;

session_start();

class ShopPointsController extends Controller
{
    public function shop_points($id)
    {
        $tee = decrypt($id);
        if ($tee == 1) {
            $citydata = CityModel::where(['is_deleted' => 0])->get();
            $shop_points = ShopPoints::where(['is_active' => 1])->get();
            return view('adminview.shop_points', ['citydata' => $citydata, 'shop_points' => $shop_points]);
        }
    }

    public function add_shop_points()
    {
        $data = new ShopPoints();
        $data->city_id = request('cityid');
        $data->shop_address = request('shop_address');
        $data->save();
        return 'success';
    }

    public function update_shop_points()
    {
        try {
            $data = array(
                'city_id' => request('cityid'),
                'shop_address' => request('shop_address'),
            );
            ShopPoints::where('id', request('idd'))
                ->update($data);
            return '1';
        } catch (\Exception $ex) {
            $ex->getMessage();
        }


        /* echo request('cityid').request('area').request('pin').request('amount').request('del_charge').request('idd');*/
    }

    public function delete_shop_points()
    {
        $data = array(
            'is_active' => '0',
        );
        ShopPoints::where('id', request('idd'))->update($data);
        return '1';

        /* echo request('cityid').request('area').request('pin').request('amount').request('del_charge').request('idd');*/
    }
}
