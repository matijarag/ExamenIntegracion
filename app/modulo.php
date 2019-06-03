<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class modulo extends Model
{
    protected $table = 'modulo';

    protected $primaryKey = 'id_mod';

    protected $fillable = ['hora_inicio','hora_termino','id_usu'];

    public static function modulos($id)
    {
        return db::table('modulo')
        ->select('*')
        ->where('id_usu','=',$id)
        ->get();
    }
}
