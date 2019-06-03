@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                            <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6>Paso 1</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h6>Paso 2</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h6>Paso 3</h6>
                                        </div>
                                    </div>
                                <div class="progress  col-sm-12">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                                </div>
                            </div>
                    </div>
    @csrf
    <div class="table-responsive" style="height:500px">
        <table class="table">
        <thead>
            <th>hora inicio</th>
            <th>hora termino</th>
            <th>operador</th>
            <th>opciones</th>
        </thead>
            @foreach ($horario as $horarios)
                @if($horarios->disponibilidad != 0)
                    <tbody>
                        <td>{{ $horarios->hora_inicio}}</td>
                        <td>{{$horarios ->hora_termino}}</td>
                        <td>{{$horarios->name}}</td>
                        <td> 
<form method="POST" action="{{ route('fecha2.store')}}">
@csrf
    <input type="hidden" value="{{ $horarios->id_hor_dis}}" name="fecha" id="fecha"/>
        <button type="submit" class="btn btn-primary">crear</button>

</form>

                        </td>
                    </tbody>
                @endif
            @endforeach
        </table>
                </div>
                </div>
            </div>
        </div>
</div>

@endsection