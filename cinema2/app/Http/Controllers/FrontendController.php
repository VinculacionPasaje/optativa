<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use PDO;


class FrontendController extends Controller
{
 

  public function admin(){
    
       return view('administration.index');
   }

    public function index(){
      $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      $movies_slider= DB::select("SELECT movies_slider(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 

     

      //dd($categorias);
     
       //dd($categorias[0]->id);
       return view('welcome', compact('categorias', 'movies_slider'));
   }



}
