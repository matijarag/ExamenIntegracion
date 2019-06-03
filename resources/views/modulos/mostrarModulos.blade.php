@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height:500px;">
                            <table class="table" >
                                <thead>
                                    <th>hora inicio</th>
                                    <th>hora termino</th>
                                    <th>Seleccionar</th>
                                </thead>
                                <form action="{{route('EliminarModulo.store')}}" method="POST" id="1">
                                        @csrf
                                @foreach($modulos as $modulo)
                                    <tbody>
                                        <td>{{$modulo->hora_inicio}}</td>
                                        <td>{{$modulo->hora_termino}}</td>
                                        <td><input type="checkbox" form="1" name="horaDel[]" value="{{$modulo->id_hor_dis}}"/></td>
                                        <input type="hidden" value="{{$modulo->id_mod}}" name="id_mod" >
                                    </tbody>
                                @endforeach   
                                <input type="hidden" value="{{$fecha}}" name="fecha">
                                <input type="hidden" value="{{$id_usu}}" name="id_usu"/>
                                <button type="submit" form="1" class="btn btn-danger">Eliminar todos</button>
                            </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection