<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Validation\Rule;
use Session;
use DB;
use PDO;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::where('state',1)->orderBy('id')->paginate(6);
         


        return View('administration.usuarios.index',compact('usuarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        
        return View('administration.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
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
            $rol_id=$request['roles']; //significa que es un rol de usuario registrado


            //PARA EJECUTAR STORED PROCEDURED INSERT con CALL EN PLSQL
            DB::insert('call insert_user(?,?,?,?,?,?)',[$name, $last_name, $email,$password, $path, $rol_id]);

        return Redirect::to('administracion/usuarios/create')->with('mensaje-registro', 'Usuario Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        

       
        return view('administration.usuarios.edit',compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     *  "Fill" significa literalmente "llenar". Cuando se utiliza el método fill() en un modelo, establece los atributos del modelo a los que le pasemos como argumento en un array. Un ejemplo y quedará claro:
    *   $user = new User();

    *   $user->fill([
    *   'username' => 'IsraelOrtuno',
    *   'email' => 'laraveles@mail.com'
    *   ]);
    *   Esto sería el equivalente a hacer:
    *   $user = new User();

    *   $user->username = 'IsraelOrtuno';
    *   $user->email = 'laraveles@mail.com';
    *   Puede usarse tanto en una instancia nueva de un modelo, como con una existente, simplemente establece atributos de forma masiva.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {

        $data = $request; 
        $password = $data['password'];
        $usuario = User::find($id);
        $this->validate($request, [
                        
                        'name'   => [ 'required', 'max:255' ],
                        'last_name' => [ 'required', 'max:255' ],                      
                        'email'     => [ 'required', Rule::unique('users')->ignore($usuario->id), ],
                        
                    ]);
        
       
            
            if($password==null){ // que no me sobreescriba el password  con un valor null

                 $usuario->fill([

                    'name' => $request['name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'rol_id' => $request['roles']
                   
                ]);

            }else{ // caso contrario que me actualize la nueva contraseña
            $usuario->fill([ 

                    'name' => $request['name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'PASSWORD' => bcrypt($request['password']),
                    'rol_id' => $request['roles']
                ]);
                
            }
     
        if($usuario->save()){
            return Redirect::to('administracion/usuarios')->with('mensaje-registro', 'Usuario Actualizado Correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $usuario = User::find($id);
        $usuario->state = 0;
        $usuario->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $usuario->id,
                'message' => $message
            ]);
        }
    }
}
