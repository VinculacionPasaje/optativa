<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
