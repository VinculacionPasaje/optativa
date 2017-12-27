<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function __construct(){
      $this->middleware('auth',['only'=>'admin']);
  }

  public function admin(){
       return view('administration.index');
   }

}
