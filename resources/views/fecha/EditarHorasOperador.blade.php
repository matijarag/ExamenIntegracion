@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">   
                    <div class="container">
                        <div class="table-responsive" style="height:500px;">
                            <table class="table">
                                <thead>
                                    <th>Fecha</th>
                                    <th>Seleccionar</th>
                                    <th>Opcion</th>
                                </thead>
                                <form action="{{route('eliminarHoras.store')}}" method="POST" id="1">
                                    @csrf
                                    @foreach($hordis as $horas)
                                    <tbody>
                                        <td>{{$horas->fecha_hor_dis}}</td>
                                        <td><input type="checkbox" form="1" name="horaDel[]" value="{{$horas->fecha_hor_dis}}" style="horizontal-align: center;"/></td>
                                        <td>
                                            <form action="{{route('SeleccionarModulo.store')}}" method="POST" id="2">
                                                @csrf
                                                <input type="hidden" value="{{$horas->fecha_hor_dis}}" form="2" name="fecha" id="fecha"/>
                                                <input type="hidden" value="{{$id_usu}}" name="id_usu" form="2" id="id_usu"/>
                                                <button type="submit" class="btn btn-success" form="2">Editar</button>
                                            </form>
                                        </td>
                                    </tbody>
                                    @endforeach
                                <input type="hidden" value="{{$id_usu}}" name="id_usu" form="1" id="id_usu"/>
                                <button type="submit" form="1" class="btn btn-danger">Eliminar todos</button>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection