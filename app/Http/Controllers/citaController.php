<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\cita;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\horarios_disponible;
use App\tipo_usuario;

class citaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Excel::download(new UsersExport, 'ReporteCita.xlsx');
        $MesActual = Carbon::now()->month;
        $horario = horarios_disponible::horarioDist3();
        $horarioDis= horarios_disponible::horariosUsu(Auth::user()->id_usu);
        $var = '';
        $user = user::where('id_tipo_usuario',2)->get();
        $usuarios = user::where('activo',0)->get();
        $tipo_usuario = tipo_usuario::all();
        //return view('home',compact('MesActual','horario','var','user','horarioDis','tipo_usuario','usuarios')); 
        return $reporte;
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
        if($request['boton'] == 1){
            
            cita::create([
                'id_hordis'=>$request['id_hora'],
                'id_esci'=>1
            ]);
        }
        if($request['boton'] == 2){
            cita::create([
                'id_hordis'=>$request['id_hora'],
                'observaciones'=>$request['observacion'],
                'id_esci'=>2
            ]);
            $usuario = user::usuarioRut($request['rut'])->first();
            $user = user::find($usuario->id_usu)->fill([
                    'activo'=> 1
                ]);
                
            $user->save();
        }
        if($request['boton'] == 3){
            
            cita::create([
                'id_hordis'=>$request['id_hora'],
                'id_esci'=>3
            ]);
            
            
        $usuario = user::usuarioRut($request['rut'])->first();
            $contador =$usuario->contador + 1;
        $user = user::find($usuario->id_usu)->fill([
                    'contador'=> $contador
                ]);
                
            $user->save();
        }
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
    public function show($id)
    {
        //
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
