<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use Session;
use DB;

class UserController extends Controller
{
        /**
      * guarda un usuario en la BD
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function register(UserRequest $request)
      {

              //obtenemos el campo file definido en el formulario
             $file = $request->file('path');

             //obtenemos el nombre del archivo
             $nombre = $file->getClientOriginalName();

             //indicamos que queremos guardar un nuevo archivo en el disco local
             \Storage::disk('local')->put($nombre,  \File::get($file));




            $name = $request['name'];

            $last_name = $request['last_name'];
            $email = $request['email'];
            $path= $request['path']->getClientOriginalName();
            $password = bcrypt($request['password']);
            $rol_id=2; //significa que es un rol de usuario registrado

            DB::insert('call insert_user(?,?,?,?,?,?)',[$name, $last_name, $email,$password, $path, $rol_id]);

            return Redirect::to('login')->with('mensaje-registro', 'Usuario Registrado Correctamente, ahora proceda a logearse');


      }
}
