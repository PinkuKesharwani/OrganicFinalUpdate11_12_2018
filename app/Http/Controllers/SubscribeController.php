<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
session_start();

class SubscribeController extends Controller
{
 public function view($id)
 {
     $tee = decrypt($id);
     if ($tee == 1) {
         return view('adminview.subscribelist');
     }
 }
}
