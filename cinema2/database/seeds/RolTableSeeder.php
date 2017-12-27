<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      Rol::create([
          'ID'=>2,
          'ROLE'=>'Registrado',
          'STATE'=>1,


      ]);

  }

}
