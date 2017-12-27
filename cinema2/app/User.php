<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;

  protected $table='users';
   protected $primaryKey = 'id';
   public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','last_name', 'email', 'password', 'path', 'state', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id','id');
    }

    public function setPathAttribute($path){

       if(!empty($path)){
           if ($path =="eliminar"){
               if ( ! empty($this->attributes['path'])) {
                   \Storage::delete($this->attributes['path']);
               }
               $this->attributes['path']=null;
           }
           else {
               /* Para Actualizar Imagen */
               if ( ! empty($this->attributes['path'])) {
                   \Storage::delete($this->attributes['path']);
               }
               $this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
               $name = Carbon::now()->second.$path->getClientOriginalName();
               \Storage::disk('local')->put($name, \File::get($path));
           }
       }

   }


}
