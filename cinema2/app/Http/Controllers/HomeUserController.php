<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDO;
use \Datetime;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mi_perfil()
    {
        return view('administration.index_user');
    }

    public function pagos()
    {
        $id = Auth::user()->id;
        $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
        $pagos= DB::select("SELECT get_pagos($id) AS mfrc FROM dual"); 
       
        return view('administration.pagos.index', compact('subscription', 'pagos'));
    }
}
