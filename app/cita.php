<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class cita extends Model
{
    protected $table = 'cita';

    protected $primaryKey = 'id_cit';

    protected $fillable = ['id_hordis','observaciones','id_esci'];

public static function reporteriaCita(){
    return db::table('cita')
    ->selectRaw('horarios_disponible.fecha_hor_dis as fechaCita,modulo.hora_inicio as horaCita
    ,users.name as nombreOperador,(select name from users where rut = horarios_disponible.rut_usuario),
    cita.observaciones as observaciones,estado_cita.descripcion_est_cit')
    ->join('horarios_disponible','cita.id_hordis','=','horarios_disponible.id_hor_dis')
    ->join('estado_cita','cita.id_esci','=','estado_cita.id_est_cit')
    ->join('modulo','horarios_disponible.id_mod','=','modulo.id_mod')
    ->join('users','modulo.id_usu','=','users.id_usu')
    ->get();
}

}
