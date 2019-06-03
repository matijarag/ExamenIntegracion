<?php

use Illuminate\Database\Seeder;
use App\estado_cita;

class EstadoCitaSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estado_cita::create([
            'id_est_cit'=>1,
            'descripcion_est_cit'=>'matriculado'
        ]);
        
        estado_cita::create([
            'id_est_cit'=>2,
            'descripcion_est_cit'=>'incompleta'
        ]);
        
        estado_cita::create([
            'id_est_cit'=>3,
            'descripcion_est_cit'=>'Ausente'
        ]);
    }
}
