<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;
use App\horarios_disponible;
use App\modulo;
use App\User;
use App\tipo_usuario;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tomar numero de dias que tiene el mes seleccionado para crear los horarios disponibles
        //creacion de los modulos para crear los horarios
        $horaInicioTurno = new Carbon($request['hora_inicio_turno']);
        $horaFinTurno= new Carbon($request['hora_termino_turno']);
        $horaInicioAlmuerzo = new Carbon($request['hora_inicio_almuerzo']);
        $horaTerminoAlmuerzo = new Carbon($request['hora_termino_almuerzo']);
        while($horaInicioTurno < $horaFinTurno){
            $insertInicio = $horaInicioTurno->format('G:i');
            $insertTurno = $horaInicioTurno->addMinutes(30)->format('G:i');
            if($horaInicioTurno <= $horaInicioAlmuerzo || $horaInicioTurno > $horaTerminoAlmuerzo){
                modulo::create([
                    'hora_inicio'=>$insertInicio,
                    'hora_termino'=>$insertTurno,
                    'id_usu'=>$request['id_usu']
                ]);
            }
        }
        //consulta tabla modulos
        $modulo = modulo::modulos($request['id_usu']);
        //tomar numero de dias que tiene el mes seleccionado para crear los horarios disponibles
        $fechaEmision = new Carbon($request['mes']);
        $fechaEmision = $fechaEmision->startOfMonth()->subMonth();
        $fechaInicioFor = $fechaEmision->day;
        $fechaExpiracion = new Carbon($request['mes']);
        $fechaExpiracion = $fechaExpiracion->endOfMonth()->subMonth();
        $fechaTerminoFor = $fechaExpiracion->day;
        $diasDiferencia = date('t',strtotime($request['id_usu']));

        $dt = $fechaEmision->startOfMonth()->addMonth();
        $fechaParaLaQuery = $dt;
        /*foreach ($user as $users)
        {
            if($users->id_tipousuario = 2)
            {*/
            if($fechaParaLaQuery->format('m') != '12'){
                
                for ($i = $fechaInicioFor; $i <= $fechaTerminoFor; $i++) {
                    
                    foreach ($modulo as $modulitos) 
                    {
                        $modid = $modulitos->id_mod; 
                        horarios_disponible::create([
                            'fecha_hor_dis'=>$fechaParaLaQuery->format('Y-m-d'),
                            'rut_usuario'=>'',
                            'disponibilidad'=>1,
                            'id_estres'=>1,
                            'id_mod'=>$modid
                        ]);
                        
                    }
                    
                    $fechaParaLaQuery = $dt->addDay();
                }
            }else{
                
                $anio = new Carbon($request['mes']);
                $anio = $anio->format('Y');
                $array = array( $anio.'-12-01'
                ,$anio.'-12-02'
                ,$anio.'-12-03'
                ,$anio.'-12-04'
                ,$anio.'-12-05'
                ,$anio.'-12-06'
                ,$anio.'-12-07'
                ,$anio.'-12-08'
                ,$anio.'-12-09'
                ,$anio.'-12-10'
                ,$anio.'-12-11'
                ,$anio.'-12-12'
                ,$anio.'-12-13'
                ,$anio.'-12-14'
                ,$anio.'-12-15'
                ,$anio.'-12-16'
                ,$anio.'-12-17'
                ,$anio.'-12-18'
                ,$anio.'-12-19'
                ,$anio.'-12-20'
                ,$anio.'-12-21'
                ,$anio.'-12-22'
                ,$anio.'-12-23'
                ,$anio.'-12-24'
                ,$anio.'-12-25'
                ,$anio.'-12-26'
                ,$anio.'-12-27'
                ,$anio.'-12-28'
                ,$anio.'-12-29'
                ,$anio.'-12-30'
                ,$anio.'-12-31');
                foreach($array as $fechaa){
                    foreach ($modulo as $modulitos) 
                {
                    $modid = $modulitos->id_mod; 
                    horarios_disponible::create([
                        'fecha_hor_dis'=>$fechaa,
                        'rut_usuario'=>'',
                        'disponibilidad'=>1,
                        'id_estres'=>1,
                        'id_mod'=>$modid
                    ]);
                }
                }
            }
           /* }
}*/
        $MesActual = Carbon::now()->month;
        $horario = horarios_disponible::horarioDist3();
        $horarioDis= horarios_disponible::horariosUsu(Auth::user()->id_usu);
        $var = '';
        $user = user::where('id_tipo_usuario',2)->get();
        $usuarios = user::where('activo',0)->get();
        $tipo_usuario = tipo_usuario::all();
        return view('home',compact('MesActual','horario','var','user','horarioDis','tipo_usuario','usuarios')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
