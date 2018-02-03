<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table='subscription';
   protected $primaryKey = 'id';
   public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','state','date_start', 'date_end',  'user_id', 'payment'
    ];

    


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
