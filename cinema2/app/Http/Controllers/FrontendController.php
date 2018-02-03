<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use PDO;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
 

  public function admin(){
    
       return view('administration.index');
   }

    public function index(){
      $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      $movies= DB::select("SELECT get_allmovies(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      $series= DB::select("SELECT get_allseries(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      $movies_slider= DB::select("SELECT movies_slider(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      $movies_recien_anadidos= DB::select("SELECT movies_recien_anadidos(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      $series_recien_anadidos= DB::select("SELECT series_recien_anadidos(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
      
      $movies_recien_anadidos2= DB::select("SELECT movies_recien_anadidos2(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 

      if(Auth::check()){
        $id = Auth::user()->id;
        $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
      }else{
          $subscription=0;
      }
      

     

      //dd($categorias);
     
       //dd($categorias[0]->id);
       return view('welcome', compact('subscription','series','series_recien_anadidos','categorias', 'movies_slider', 'movies_recien_anadidos', 'movies', 'movies_recien_anadidos2'));
   }

    public function peliculas($id){
         $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $idiomas= DB::select("SELECT get_all_lenguajes(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1  
        $pelicula = DB::select("SELECT get_pelicula($id) AS mfrc FROM dual"); 
        $id_categorias= $pelicula[0]->categories_id;
        $id_movie= $pelicula[0]->id;
        $peliculas_similares = DB::select("SELECT get_peliculas($id_categorias) AS mfrc FROM dual"); 
        $servers_movies = DB::select("SELECT get_servers_movies($id_movie) AS mfrc FROM dual"); 
        
        $categoria_pelicula = DB::select("SELECT get_categoria($id) AS mfrc FROM dual"); 

        if(Auth::check()){
        $id = Auth::user()->id;
        $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
      }else{
          $subscription=0;
      }

 
        return view('frontend.pelicula',compact('subscription','pelicula', 'categoria_pelicula', 'categorias', 'peliculas_similares', 'servers_movies', 'idiomas'));
     
    }


      public function chapters($id){
        $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $chapter = DB::select("SELECT get_chapter($id) AS mfrc FROM dual"); 
         $idiomas= DB::select("SELECT get_all_lenguajes(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1  
        $servers_chapters= DB::select("SELECT get_server_chapters($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1  
        
        
        
 
        return view('frontend.chapters',compact( 'categorias', 'servers_chapters', 'idiomas', 'chapter'));
     
    }

      public function category($id){

          $fecha_actual=date("d/m/Y");

          $fecha_actual2=date("d-m-Y");

          
            $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha_actual2 ) ) ;
            $nuevafecha = date ( 'd/m/Y' , $nuevafecha );
           

            
        
       $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
       $todas_series= DB::select("SELECT categorias_all_series($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
       $series_guest= DB::select("SELECT categorias_series_guest($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1

       $series_register= DB::select("SELECT categorias_series_register($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1

       $todas_peliculas= DB::select("SELECT categorias_all_movies($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $movies_guest= DB::select("SELECT categorias_movies_guest($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $movies_register= DB::select("SELECT categorias_movies_register($id) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         

          $categoria_peliculas_series = DB::select("SELECT get_categoria2($id) AS mfrc FROM dual"); 
      
        
        if(Auth::check()){
        $id = Auth::user()->id;
        $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
      }else{
          $subscription=0;
      }
       
        return view('frontend.categorias',compact('subscription','categoria_peliculas_series','movies_register','movies_guest','todas_peliculas','todas_series', 'series_guest','series_register', 'categorias'));
        }
     
    




     public function series($id){
        $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
        $idiomas= DB::select("SELECT get_all_lenguajes(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1  


        $serie = DB::select("SELECT get_serie($id) AS mfrc FROM dual"); 
       
        $id_categorias= $serie[0]->category_id;

        $series_similares = DB::select("SELECT get_series($id_categorias) AS mfrc FROM dual"); 
        $categoria_serie = DB::select("SELECT get_categoria($id) AS mfrc FROM dual"); 


        $id_serie= $serie[0]->id;
        

        $seasons = DB::select("SELECT get_seasons($id_serie) AS mfrc FROM dual"); 
        
        $chapters= DB::select("SELECT get_allchapters(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 

        
          if(Auth::check()){
        $id = Auth::user()->id;
        $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
      }else{
          $subscription=0;
      }

 
        return view('frontend.series',compact('subscription','chapters','seasons','id_serie','serie', 'id_categorias', 'categorias', 'series_similares', 'categoria_serie', 'idiomas'));
     
    }

     public function todas_series(){
        $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
         $todas_series= DB::select("SELECT get_allseries(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $series_guest= DB::select("SELECT series_guest(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $series_register= DB::select("SELECT series_register(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
        

         
          if(Auth::check()){
        $id = Auth::user()->id;
        $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
      }else{
          $subscription=0;
      }

 
        return view('frontend.todasseries',compact('subscription','todas_series', 'series_guest', 'series_register', 'categorias'));
     
    }

       public function todas_peliculas(){
        $categorias= DB::select("SELECT get_allcategorias(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1 
         $todas_peliculas= DB::select("SELECT get_allmovies(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $movies_guest= DB::select("SELECT movies_guest(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
         $movies_register= DB::select("SELECT movies_register(1) AS mfrc FROM dual"); //el 1 significa que buscara todas las categorias con estado 1
        
    
          if(Auth::check()){
                $id = Auth::user()->id;
                $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
            }else{
                $subscription=0;
            }
 
        return view('frontend.todaspeliculas',compact('subscription','todas_peliculas', 'movies_guest', 'movies_register', 'categorias'));
     
    }



}
