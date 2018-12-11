<?php

namespace App\Http\Controllers;

use App\Categorymaster;
use App\LoginModel;
use App\UserMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function admin($id)
    {

        $tee = decrypt($id);
        if ($tee == 1) {
//            UserMaster::reset_cache();
            if ($_SESSION['admin_master'] != null) {
                $alldata = Categorymaster::where(['is_active' => 1])->paginate(10);
                $allcat = Categorymaster::where(['is_active' => 1])->get();
                $alldata1 = Categorymaster::where(['is_active' => 1])->get();
                $data = LoginModel::find(['id' => $_SESSION['admin_master']['id']])->first();
                return view('adminview.dashboard', ['alldata' => $alldata, 'alldata1' => $alldata1, 'allcat' => $allcat, 'data' => $data])->with('no', 1);
            } else {
                return redirect('/adminlogin');
            }
        } else {
            return Redirect::back();
        }

    }

    public function category($id)
    {
        $tee = decrypt($id);
        if ($tee == 1) {

            if ($_SESSION['admin_master'] != null) {
                $alldata = Categorymaster::where(['is_active' => 1])->orderBy('id', 'desc')->paginate(10);
                $allcat = Categorymaster::where(['is_active' => 1])->get();
                $alldata1 = Categorymaster::where(['is_active' => 1])->get();
                return view('adminview.category', ['alldata' => $alldata, 'alldata1' => $alldata1, 'allcat' => $allcat])->with('no', 1);
            } else {
                return redirect('/adminlogin');
            }
        }
    }

    public function adminlogin()
    {
        $_SESSION['admin_master'] = null;
        $_SESSION['user_master'] = null;
        return view('adminview.adminlogin');
    }

    public function logincheck()
    {
        $username = request('username');
        $password = request('password');
        $user = LoginModel::where(['username' => $username, 'password' => $password])->first();
        if ($user != null) {
            $_SESSION['admin_master'] = $user;
            return 'success';
        } else {
            /*return redirect('/adminlogin')->withInput()->withErrors(array('message' => 'UserName or password Invalid'));*/
            return 'fail';
        }
    }
}
