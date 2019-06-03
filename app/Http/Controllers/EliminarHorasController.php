<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\horarios_disponible;
use App\user;
use App\tipo_usuario;
use Illuminate\Support\Facades\Auth;

class EliminarHorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        foreach($request['horaDel'] as $hora)
        {
            $hola = horarios_disponible::horariosUpdate($hora,$request['id_usu']);
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
