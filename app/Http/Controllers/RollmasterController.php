<?php

namespace App\Http\Controllers;

use App\LoginModel;
use App\Menumodel;
use App\Menurolemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class RollmasterController extends Controller
{
    public function view($id)
    {
        $tee = decrypt($id);
        if ($tee == 1) {
            return view('adminview.rollmaster');
        }
    }

    public function postrollmaster()
    {
        $userdata = new LoginModel();
        $userdata->username = request('username');
        $userdata->password = request('password1');
        $userdata->password = request('password1');
        $userdata->rollmaster_id = 2;
        $userdata->save();


        $finalcat = request('menuid');
        if (request('menuid') != null) {
            for ($i = 0; $i < sizeof($finalcat); $i++) {
                $item_category = new Menurolemodel();
                $item_category->user_id = $userdata->id;
                $item_category->menu_id = $finalcat[$i];
                $item_category->save();
            }
        }
        return Redirect::back();
    }

    public function postrollmasterupdate()
    {

        $data = array(
            'password' => request('password1'),

        );
        LoginModel::where('id', request('myid'))
            ->update($data);

        Menurolemodel::where('user_id', request('myid'))
            ->delete();
        $finalcat = request('menuid');
        if (request('menuid') != null) {
            for ($i = 0; $i < sizeof($finalcat); $i++) {
                $item_category = new Menurolemodel();
                $item_category->user_id = request('myid');
                $item_category->menu_id = $finalcat[$i];
                $item_category->save();
            }
        }
        return Redirect::back();
    }


    public function getfullrole($id)
    {
        $mydata = LoginModel::where(['id' => $id])->first();

        $myallmenuid = \App\Menurolemodel::where(['user_id' => $id])->get();

        return view('adminview.updateroll', ['mydata' => $mydata, 'myallmenuid' => $myallmenuid]);
    }
}

