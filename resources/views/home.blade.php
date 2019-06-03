@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Examen Integracion
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                          @if(Auth::user()->id_tipo_usuario == 2)
                          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Citas</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Usuario</a>
                                
                                </li>
                            </ul>
                              <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <th>hora inicio</th>
                                                    <th>alumno</th>
                                                    <th>observaciones</th>
                                                    <th>opciones</th>
                                                </thead>
                                                @foreach($horarioDis as $fecha)
                                                <tbody>
                                                    <td>{{$fecha->fecha_hor_dis}}</td>
                                                    <td>{{$fecha->rut_usuario}}</td>
                                                    <form action="{{ route('cita.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{$fecha->id_hor_dis}}" name="id_hora">
                                                        <input type="hidden" value="{{$fecha->rut_usuario}}" name="rut">
                                                        <td><input type="text" class="form-control" name="observacion" placeholder="ingrese observacion" /></td>
                                                        <td><button type="submit" value="1" name="boton" class="btn btn-success">Correcta</button>
                                                            <button type="submit" value="2" name="boton" class="btn btn-primary">Incompleta</button> 
                                                            <button type="submit" value="3" name="boton" class="btn btn-danger">Ausente</button>    
                                                        </td>
                                                    </form>
                                                </tbody>

                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <th>nombre alumno</th>
                                                            <th>rut alumno</th>
                                                            <th>opciones</th>
                                                        </thead>
                                                        @foreach($usuarios as $usuario)
                                                        @if($usuario->contador == 1)
                                                        <tbody>
                                                            <td>{{$usuario->name}}</td>
                                                            <td>{{$usuario->rut}}</td>
                                                            <td>
                                                                <form action="{{ route('habilitar.store')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$usuario->id_usu}}" name="id_usuario">
                                                                    <button type="submit" class="btn btn-primary">Habilitar</button>
                                                                </form>
                                                            </td>
                                                        </tbody>
                                                        @endif
                                                        @endforeach
                                                    </table>
                                                </div>
                                    </div>
                                    
                                </div>
                            @endif
                            @if(Auth::user()->id_tipo_usuario == 1)
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Crear Modulos</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Crear Usuario</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Modificar horarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{ route('cita.index')}}">
                                            <input type="submit" class="btn btn-success" value="Generar reporte">
                                        </form>
                                    </li>
                                  </ul>
                                  
                                <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="container">
                                            <form class="form-horizontal" method="POST" action="{{ route('modulos.store') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_turno">hora inicio turno</label>
                                                    <div class="col-md-8">
                                                        <input type="month" class="form-control form-control-1 input-sm from" name="mes" min="2018-{{ $MesActual }}" max="2018-{{ $MesActual + 1 }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="id_usu">Usuario turno</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="id_usu" id="id_usu">
                                                            @foreach($user as $users)
                                                                <option value="{{$users->id_usu}}">{{$users->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>    
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_turno">hora inicio turno</label>
                                                    <div  class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_inicio_turno" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_termino_turno">hora termino turno</label>
                                                    <div class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_termino_turno" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_inicio_almuerzo">hora inicio almuerzo</label>
                                                    <div class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_inicio_almuerzo" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 text-md-right col-form-label" for="hora_termino_almuerzo">hora termino almuerzo</label>
                                                    <div class="input-group clockpicker col-md-8">
                                                        <input type="time" name="hora_termino_almuerzo" class="form-control" value="00:00">
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                    </div>
                                                </div> 
                                                <button type="submit" class="btn btn-primary">crear</button>
                                            </form>
                                        </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="container">
                                                    <form method="POST" action="{{ route('admin.store') }}">
                                                            @csrf

                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                                    @if ($errors->has('email'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo usuario') }}</label>
                                                                <div class="col-md-6">
                                                                    <select class="form-control" id="tipo" name="tipo">
                                                                            <option selected disabled>Selecciona un tipo de usuario</option>
                                                                        @foreach ($tipo_usuario as $tipo)
                                                                        @if($tipo->descripcion_tip_usu != 'alumno')
                                                                            <option value="{{ $tipo->id_tip_usu}}">{{ $tipo->descripcion_tip_usu}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                                    @if ($errors->has('password'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmacion contraseña') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Registrar') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="contatiner">
                                                <form action="{{route('HorasDisponibles.store')}}" method="POST">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-md-3 text-md-right col-form-label" for="id_usu">Usuario turno</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="id_usu" id="id_usu">
                                                                @foreach($user as $users)
                                                                    <option value="{{$users->id_usu}}">{{$users->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>    
                                                    </div> 
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Modificar') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            @endif
                            @if(Auth::user()->id_tipo_usuario == 3)
                            @if(Auth::user()->activo == 1)
                                    <div class="container">
                                        @if(Auth::user()->contador != 0)
                                        <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                <ul>
                                                <li> Esta es su ultima oportunidad para tomar hora, si falta a su cita
                                                no podra volver a agendar una hora</li>
                                                </ul>
                                                </div>
                                        @endif
                                        @if(Auth::user()->contador == 0) 
                                        <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                <ul>
                                                <li>Importante: Si usted se ausenta de la hora agendada, debera esperar que una operadora
                                                lo habilite para volver a tomar hora, si se ausenta una segunda vez, por normativa de la empresa bajo los terminos y condiciones, no podra volver a
                                            agendar una hora</li>
                                                </ul>
                                                </div>
                                        @endif
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h6>Paso 1</h6>
                                                </div>
                                                <div class="col-sm">
                                                    <h6>Paso 2</h6>
                                                </div>
                                                <div class="col-sm">
                                                    <h6>Paso 3</h6>
                                                </div>
                                            </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
                                        </div>
                                    </div>
                                <form method="POST" action="{{ route('fecha.store') }}">
                                    @csrf
                                        <select class="form-control" id="fecha" name="fecha">
                                                <option selected disabled>Selecciona una fecha</option>
                                            @foreach ($horario as $horarios)
                                                @if($horarios->disponibilidad != 0)
                                                    @if($var != $horarios->fecha_hor_dis)
                                                        <option value="{{ $horarios->fecha_hor_dis}}">{{ $horarios->fecha_hor_dis }}</option>
                                                    @endif
                                                    
                                                    @php 
                                                    $var = $horarios->fecha_hor_dis;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">crear</button>
                                </form>
                            @endif
                            @if(Auth::user()->activo == 0 && Auth::user()->contador == 1)
                                    <div class="container">
                                        <h1>Usted se ausento a una cita agendada, por lo cual aun no puede tomar hora<br>
                                            en breve un/a operador/a se contactara con usted para habilitarlo para <br>
                                            tomar una hora nuevamente
                                        </h1>
                                    </div>
                            @endif
                            @if(Auth::user()->activo == 0 && Auth::user()->contador == 2)
                                    <div class="container">
                                        <h1>Usted se ausento 2 veces a una hora agendada, por lo cual por normativa<br>
                                            de la empresa, a usted se le ha bloqueado la posibilidad de tomar horas
                                        </h1>
                                    </div>
                            @endif
                            @if(Auth::user()->activo == 0 && Auth::user()->contador == 0)
                            <div class="container">
                                <h1>Usted ya ha registrado su hora, favor de validar atencion, ya que si no lo hace solo podra volver a reagendar 1 vez la hora solicitada
                                </h1>
                            </div>

                            @endif
                          @endif
                          @if(Auth::user()->id_tipo_usuario == 4)
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active <!-- fade-->" id="menu1">
                                <div class="container col-md-12">
                                    <Form class="form-horizontal" method="POST" action="{{ route('usu_norm.store') }}">
                                        @csrf
                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="rut">Rut</label>
                                                <div class="col-md-8">
                                                    <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" type="text" name="rut" id="rut" onblur="validar()" placeholder="ingrese rut">
                                                    @if ($errors->has('nombre'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="nombre">Nombre</label>
                                                <div class="col-md-8">
                                                    <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" type="text" name="nombre" placeholder="ingrese nombre">
                                                    @if ($errors->has('nombre'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nombre') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="email">Email</label>
                                                <div class="col-md-8">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="ingrese email">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 text-md-right col-form-label" for="telefono">Telefono</label>
                                                <div class="col-md-8">
                                                    <input onblur="phonee()" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" type="text" id="telefono" name="telefono" placeholder="ingrese telefono">
                                                    @if ($errors->has('telefono'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('telefono') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </Form>
                                </div>
                                </div>
                            </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
