<?php

use Illuminate\Database\Seeder;
use App\tipo_usuario;

class TipoUsuarioSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_usuario::create([
            'id_tip_usu'=>1,
            'descripcion_tip_usu'=>'administrador'
        ]);
        tipo_usuario::create([
            'id_tip_usu'=>2,
            'descripcion_tip_usu'=>'operador'
        ]);
        tipo_usuario::create([
            'id_tip_usu'=>3,
            'descripcion_tip_usu'=>'alumno'
        ]);
        tipo_usuario::create([
            'id_tip_usu'=>4,
            'descripcion_tip_usu'=>'jefe de carrera'
        ]);
    }
}
