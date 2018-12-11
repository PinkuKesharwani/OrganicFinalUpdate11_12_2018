<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

session_start();

class BrandController extends Controller
{
    public function brands($id)
    {
        $tee = decrypt($id);
        if ($tee == 1) {
            $brands = Brand::where(['is_active' => 1])->get();
            return view('adminview.brand', ['brands' => $brands]);
        }
    }

    public function add_brand()
    {
        $data = new Brand();
        $data->brand = request('brand');
        $data->save();
        return 'success';
    }

    public function update_brand()
    {
        try {
            $data = array(
                'brand' => request('brand'),
            );
            Brand::where('id', request('idd'))
                ->update($data);
            return '1';
        } catch (\Exception $ex) {
            $ex->getMessage();
        }


        /* echo request('cityid').request('area').request('pin').request('amount').request('del_charge').request('idd');*/
    }

    public function delete_brand()
    {
        $data = array(

            'is_active' => '0',
        );
        Brand::where('id', request('idd'))
            ->update($data);
        return '1';

        /* echo request('cityid').request('area').request('pin').request('amount').request('del_charge').request('idd');*/
    }
}
