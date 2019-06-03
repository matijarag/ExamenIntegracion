<?php

use Illuminate\Database\Seeder;
use App\estado_reserva;

class EstadoHoraSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estado_reserva::create([
            'id_est_res'=>1,
            'descripcion_est_res'=>'disponible'
        ]);
        
        estado_reserva::create([
            'id_est_res'=>2,
            'descripcion_est_res'=>'no disponible'
        ]);
        
        estado_reserva::create([
            'id_est_res'=>3,
            'descripcion_est_res'=>'desactivado'
        ]);
    }
}
