<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DB;

class horarios_disponible extends Model
{
    protected $table = 'horarios_disponible';

    protected $primaryKey = 'id_hor_dis';

    protected $fillable = ['fecha_hor_dis','rut_usuario','disponibilidad','id_estres','id_mod'];
    
    public static function horariosDia($id)
    {
        return db::table('horarios_disponible')
        ->selectRaw('Distinct modulo.hora_inicio,modulo.hora_termino,horarios_disponible.*,users.*')
        ->where('fecha_hor_dis','=',$id)
        ->join('modulo','horarios_disponible.id_mod','=','modulo.id_mod')
        ->join('users','modulo.id_usu','=','users.id_usu')
        ->orderBy('modulo.hora_inicio')
        ->get();
    }
    public static function horarioDist()
    {
        return db::table('horarios_disponible')
        ->selectRaw('Distinct SUBSTRING(fecha_hor_dis,1,10) as fecha_hor_dis')
        ->get();

    }
    public static function horarioDist3()
    {
        return db::table('horarios_disponible')
        ->selectRaw('Distinct *')
        ->whereRaw('fecha_hor_dis >= curdate()')
        ->orderBy('fecha_hor_dis')
        ->get();

    }
    public static function horarioDist2($id)
    {
        return db::table('horarios_disponible')
        ->selectRaw('Distinct SUBSTRING(fecha_hor_dis,1,10) as fecha_hor_dis')
        ->join('modulo','horarios_disponible.id_mod','=','modulo.id_mod')
        ->where('id_estres','=',1)
        ->where('modulo.id_usu','=',$id)
        ->get();

    }
    public static function ModuloDist($id,$id2)
    {
        return db::table('horarios_disponible')
        ->select('horarios_disponible.*','modulo.*')
        ->join('modulo','horarios_disponible.id_mod','=','modulo.id_mod')
        ->where('id_estres','=',1)
        ->where('fecha_hor_dis','=',$id)
        ->where('modulo.id_usu','=',$id2)
        ->get();

    }
    public static function horariosUsu($id)
    {
        $diaHoy = Carbon::now()->format('Y-m-d');
        return db::table('horarios_disponible')
        ->selectRaw('SUBSTRING(horarios_disponible.fecha_hor_dis,1,10) as fecha_hor_dis, modulo.*,id_hor_dis,rut_usuario, users.*')
        ->where('disponibilidad','=',0)
        ->where('modulo.id_usu','=',$id)
        ->where('rut_usuario','!=',null)
        ->whereRaw('SUBSTRING(horarios_disponible.fecha_hor_dis,1,10) = CURDATE()')
        ->join('modulo','horarios_disponible.id_mod','=','modulo.id_mod')
        ->join('users','modulo.id_usu','=','users.id_usu')
        ->orderBy('horarios_disponible.id_hor_dis')
        ->get();
    }
    public static function horariosUpdate($id,$id2)
    {
        return db::table('horarios_disponible')
        ->where('fecha_hor_dis','=',$id)
        ->where('modulo.id_usu','=',$id2)
        ->join('modulo','horarios_disponible.id_mod','=','modulo.id_mod')
        ->update(['id_estres'=>3]);
    }
    public static function seleccionarModulo($id,$id2,$id3)
    {
        return db::table('horarios_disponible')
        ->where('fecha_hor_dis','=',$id)
        ->where('horarios_disponible.id_mod','=',$id2)
        ->get();
    }
}
