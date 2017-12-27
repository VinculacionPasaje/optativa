<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
protected $table ='ROLES';
 protected $primaryKey='ID';
 public $timestamps = false;
 protected $fillable=[
    'ID',
     'ROLE',
     'STATE',
 ];
}
